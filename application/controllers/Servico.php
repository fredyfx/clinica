<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//carega o modelo Clinica
		//$this->load->helper('form');
		$this->load->helper('form');
		$this->load->model('Servicos');
    $this->load->model('Clinica_dados');
		$this->load->library('form_validation');
    $this->load->library('pagination');
    //verifica a sessao;
if(!$this->session->userdata('user') and !$this->session->userdata('perfil')){
redirect('Login/');
}
        }



public function index()
    {    
        $this->load->view('servico/header');
        $this->load->view('menu/admin');
        $this->load->view('servico/servicos');
        $this->load->view('rodape');
    }




    public function valida(){
    $this->form_validation->set_rules('nome','nome do serviço','trim|is_unique[servicos.descricao]|required|min_length[5]|max_length[60]');
    $this->form_validation->set_rules('espe','especialidade','required');
    $this->form_validation->set_rules('valor','valor','required');
    $this->form_validation->set_rules('status','status','required|alpha');
    // definindo mensagem
    $this->form_validation->set_message('is_unique', 'Já possui serviço cadastrado');
 }



// essa função cadastra os dados 

    public function cadastra(){
        $this->valida();
      if ($this->form_validation->run() === FALSE) {
         $this->load->view('servico/header');
         $this->load->view('menu/admin');
         $this->load->view('servico/servicos');
         $this->load->view('rodape');

    }else{
     
      $cod=$this->Clinica_dados->get_codigo();
      $this->Servicos->set_dados($cod);
      $this->Servicos->cadastro();
      $this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
      redirect("Servico/");
    }

    
  }

// função que faz a paginação
public function paginacao($contro,$total_re)
{
$config['base_url'] = base_url($contro.'/consulta/');
$config['total_rows'] = $total_re;
$config['per_page'] = 5;
$config['uri_segment'] = 3;
$config['full_tag_open']='<nav><ul class="pagination">';
$config['full_tag_close']='</ul></nav>';
$config['next_link']='&raquo;';
$config['next_tag_open']='<li>';
$config['next_tag_close']='</li>';
$config['prev_link']='&laquo;';
$config['prev_tag_open']='<li>';
$config['prev_tag_close']='</li>';
$config['cur_tag_open']='<li class="active"><a href="#">';
$config['cur_tag_close']='</a></li>';
$config['num_tag_open']='<li>';
$config['num_tag_close']='</li>';
$this->pagination->initialize($config);
return $this->pagination->create_links();
}




// carrega a tela de consulta 
public function consulta($num=false)
{ if ($num ===false) {$num=0;}
$data['info']=$this->Servicos->busca(5,$num);
$data['pagi']=$this->paginacao('Servico',$this->Servicos->total_registro());
$this->load->view('header');
$this->load->view('menu/admin');
$this->load->view('servico/consulta',$data);
 $this->load->view('rodape');
}

//busca serviços especifico
public function busca_des()
{
  $data['info']=$this->Servicos->busca_des();
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('servico/consulta',$data);
   $this->load->view('rodape');
}

  
  
  

// excluir os serviços 
public function excluir($cod){
  $this->Servicos->excluir($cod);
  redirect('Servico/consulta');
 }

	
public function atualiza()
{
    $this->form_validation->set_rules('nome','nome do serviço','trim|required|min_length[5]|max_length[60]');
    $this->form_validation->set_rules('espe','especialidade','required');
    $this->form_validation->set_rules('valor','valor','required');
    $this->form_validation->set_rules('status','status','required|alpha');
    // definindo mensagem
 if ($this->form_validation->run() === FALSE) {
  $this->consulta();
 
 }else{
  $cod=$this->Clinica_dados->get_codigo();
  $this->Servicos->set_codigo();
  $this->Servicos->set_dados($cod);
  $this->Servicos->update();
  redirect('Servico/consulta');
 }
}


}
