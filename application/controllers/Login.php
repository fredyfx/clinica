<?php
defined('BASEPATH')  OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
	    parent::__construct();
		$this->load->helper('form');
    $this->load->model('Funcionario');
		}

public function index()
{
 $this->load->view('home.php');
}


public function verifica()
{
  $a=$this->Funcionario->valida_usuario();
  if($a){
     // a sessão foi criada se o usuario possui login
       $this->session->set_userdata(array(
            'logged' => true,
            'user'  => $a->nome,
            'cod'=>$a->codigo,
            'perfil' => $a->perfil));
            redirect('Clinica/');
 }
else{
	$this->session->set_flashdata('mensagem', 'E-mail ou senha inválida!');
	//$this->index();
	redirect("Login/login");
}
}

// executa quando o usuario aperta pra sair
public function Sair()
{ 
$this->session->unset_userdata('logged'); 
$this->session->unset_userdata('user');
$this->session->unset_userdata('cod'); 
$this->session->unset_userdata('perfil');
$this->session->sess_destroy();
redirect('Login');
}



public function painel()
{
//verifica a sessao;
if(!$this->session->userdata('user') and !$this->session->userdata('perfil')){
redirect('Login/');
}
  
$this->load->view('header');
$this->load->view('menu/admin');	
$this->load->view('painel');
$this->load->view('rodape');

}


public function login()
{
$this->load->view('login');

}

// essa função redefinir a senha do usuario do sistema
public function redefinir_senha()
{
$this->load->helper(array('form', 'url'));
$this->load->library('form_validation');
$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
$this->form_validation->set_rules('senha1', 'senha', 'required');

$this->form_validation->set_rules('repita', '"Repita"', 'required|matches[senha1]');

if ($this->form_validation->run() == FALSE)
{
$this->load->view('header');
$this->load->view('login');
}
else
{
  $this->load->model('Funcionario');
  $va= $this->Funcionario->redefinir_senha();
  if($va){
$this->session->set_flashdata('mensagem', 'Senha atualizada com sucesso');
redirect('Login/login');
  }else{
$this->session->set_flashdata('mensagem', 'E-mail não cadastrado');
redirect('Login/login');
  }

}



}


}
