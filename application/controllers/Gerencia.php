<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerencia extends CI_Controller {
 
	public function __construct(){
		parent::__construct();
		//carega o modelo Clinica
	
	  $this->load->helper('form');
    $this->load->model('Funcionario');
    $this->load->model('Agenda');
    $this->load->model('Servicos');
    $this->load->model('Paciente');
    $this->load->library('form_validation');
    $this->load->library('pagination');
    //verifica a sessao;
if(!$this->session->userdata('user') and !$this->session->userdata('perfil')){
redirect('Login/');
}
  }


  
  
  public function anamnese() {
      $this->load->view('header');
      $this->load->view('menu/admin');
     $this->load->view('paciente/anamnese');
      $this->load->view('rodape');
}

   public function agenda() {
    $dados['dent']=$this->Funcionario->busca_dentista();
    $dados['ser']=$this->Servicos->busca();
    $this->load->view('header');
    $this->load->view('menu/admin');
    $this->load->view('agenda/cadastro',$dados);
     $this->load->view('rodape');
}
  
public function valida_agenda()
{
$this->form_validation->set_rules('paciente','Paciente','required');
$this->form_validation->set_rules('dentista','Dentista','required');
$this->form_validation->set_rules('servico','Serviço','required');
$this->form_validation->set_rules('horario','Horario','required');
$this->form_validation->set_rules('ate','áte','required');
$this->form_validation->set_rules('data','Data','required');
}

public function cadastro_agenda()
{// coloca como regra ja paciente verifica
$this->valida_agenda();
if($this->form_validation->run() === FALSE){
  $this->agenda();
}else{
$pa=$this->Paciente->verifica($this->input->post('paciente'));
if(!empty($pa)){
$this->Agenda->set_dados($pa->codigo);
$this->Agenda->cadastro();
$this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
redirect('Gerencia/agenda');
} else{
$this->session->set_flashdata('mensagem', 'Paciente não cadastrado!');
$this->agenda();
}
}
}





public function funcionario() {
	
	 //$dato['cont']=$this->Cargo->busca();
            $this->load->view('header');
            $this->load->view('menu/admin');
            $this->load->view('funcionario/cadastro');
            $this->load->view('rodape');
}


public function paciente() {
      $this->load->view('header');
      $this->load->view('menu/admin');
     $this->load->view('paciente/cadastro');
      $this->load->view('rodape');
}

private function valida_anamnese(){
  $this->form_validation->set_rules('doenca','Doença','required');
  $this->form_validation->set_rules('alergia','Alergia','required');
  $this->form_validation->set_rules('medicam','Medicamento','required');
  $this->form_validation->set_rules('fumante','Fumante','required');
  $this->form_validation->set_rules('g','Gestande','required');
  $this->form_validation->set_rules('p','Pressão alta','required');
  }

private  function valida_funcionario(){
    $this->form_validation->set_rules('nome','nome','trim|required|min_length[5]|max_length[50]');
    $this->form_validation->set_rules('cpf','CPF','is_unique[funcionario.cpf]|required',array('is_unique' => 'CPF já está cadastrado'));
    $this->form_validation->set_rules('nascimento','Nascimento','required');
    $this->form_validation->set_rules('celula','celula','min_length[8]|max_length[14]|required|is_unique[funcionario.celular]',array('is_unique' => 'Celular já está cadastrado'));
    $this->form_validation->set_rules('sexo','sexo','required');
    $this->form_validation->set_rules('cep','Cep','required');
    $this->form_validation->set_rules('estado','Estado','trim|required');
    $this->form_validation->set_rules('cidade','Cidade','trim|required');
    $this->form_validation->set_rules('bairro','Bairro','trim|required');
    $this->form_validation->set_rules('end','Endereço','required');
    $this->form_validation->set_rules('comple','Complemento','trim|required');
    $this->form_validation->set_rules('perfil','Perfil','trim|required');
    $this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[funcionario.email]',array('is_unique' => 'E-mail já está cadastrado'));
    $this->form_validation->set_rules('cro','Cro','is_unique[funcionario.cro]',array('is_unique' => ' o cro ja esta cadastrado'));
    //$this->form_validation->set_rules('senha','senha','required');
    //$this->form_validation->set_rules('senha','senha');
    //$this->form_validation->set_rules('confirma','confirma senha','matches[senha]');
 
    //$this->form_validation->set_message('is_unique', 'cpf ja esta cadastrado');
   }

  private function valida_paciente(){
    $this->form_validation->set_rules('nome','nome','trim|required|min_length[5]|max_length[50]');
    $this->form_validation->set_rules('cpf','CPF','is_unique[paciente.cpf]|required',array('is_unique' => 'O CPF já está cadastrado!'));
    $this->form_validation->set_rules('nascimento','Nascimento','required');
    $this->form_validation->set_rules('celula','celula','min_length[8]|required|is_unique[paciente.celular]',array('is_unique' => 'Celular já está cadastrado!'));
    $this->form_validation->set_rules('sexo','sexo','required');
    $this->form_validation->set_rules('cep','Cep','required');
    $this->form_validation->set_rules('estado','Estado','trim|required');
    $this->form_validation->set_rules('cidade','Cidade','trim|required');
    $this->form_validation->set_rules('bairro','Bairro','trim|required');
    $this->form_validation->set_rules('end','Endereço','required');
    $this->form_validation->set_rules('comple','Complemento','trim|required');
    $this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[paciente.email]',array('is_unique' => 'E-mail já está cadastrado!'));
   }



public function cadastro_funcionario(){
$this->valida_funcionario();
if ($this->form_validation->run() === FALSE) {
          $this->load->view('header');
        	$this->load->view('menu/admin');
          $this->load->view('funcionario/cadastro');
           $this->load->view('rodape');
        } else{
        	  $this->Funcionario->set_dados();
            $this->Funcionario->cadastro();
            $this->Funcionario->verifica_senha();
$this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
           redirect('Gerencia/funcionario');
            }
}



 public function cadastro_paciente(){
    $this->valida_paciente();
    if($this->form_validation->run()==FALSE){
        $this->paciente();
    }else{
      $this->load->model('Paciente');
      $this->Paciente->set_dados();
      $this->Paciente->cadastro();
      redirect('Gerencia/anamnese');
    }
}


public function cadastro_anamnese() {
    $this->valida_anamnese();
    if($this->form_validation->run()==FALSE){
        $this->anamnese();
    }else{
         $this->load->model('Paciente');
         $this->load->model('Anamnese');
         $dados= $this->Paciente->codigo();
         $this->Anamnese->set_Paciente($dados->codigo);
         $this->Anamnese->set_dados();
         $this->Anamnese->cadastra();
         $this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
         redirect('Gerencia/paciente');
    }
    
}



public function consulta_funcionario($nu=false)
{ if($nu===false){$nu=0;}
  $dados['fun']=$this->Funcionario->busca_fu(false,5,$nu);
  $dados['pagi']=$this->paginacao('Gerencia/consulta_funcionario',$this->Funcionario->total_registro());
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('funcionario/consulta',$dados);
   $this->load->view('rodape');
}

// mostra todos os dados do funcionario 
public function editar($cod)
{
  $dados['fun']=$this->Funcionario->busca_fu($cod);
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('funcionario/cadastro',$dados);
   $this->load->view('rodape');
}

public function atualiza_funcionario()
{
    $this->form_validation->set_rules('nome','nome','trim|required|min_length[5]|max_length[50]');
    $this->form_validation->set_rules('cpf','CPF','required');
    $this->form_validation->set_rules('nascimento','Nascimento','required');
    $this->form_validation->set_rules('celula','celula','min_length[8]|max_length[14]|required');
    $this->form_validation->set_rules('sexo','sexo','required');
    $this->form_validation->set_rules('cep','Cep','required');
    $this->form_validation->set_rules('estado','Estado','trim|required');
    $this->form_validation->set_rules('cidade','Cidade','trim|required');
    $this->form_validation->set_rules('bairro','Bairro','trim|required');
    $this->form_validation->set_rules('end','Endereço','required');
    $this->form_validation->set_rules('comple','Complemento','trim|required');
    $this->form_validation->set_rules('perfil','Perfil','trim|required');
    $this->form_validation->set_rules('email','email','trim|required|valid_email');
    if ($this->form_validation->run() === FALSE) {
          $this->load->view('header');
          $this->load->view('menu/admin');
          $this->load->view('funcionario/cadastro');
        } else{
        $this->Funcionario->set_codigo($this->input->post('codigo'));
        $this->Funcionario->set_dados();
        $this->Funcionario->atualiza();
        redirect('Gerencia/consulta_funcionario');
        }
}


public function busca_funcionario()
{
  $dados['fun']=$this->Funcionario->busca();
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('funcionario/consulta',$dados);
  $this->load->view('rodape');
}


public function paginacao($contro,$total_re)
{
$config['base_url'] = base_url($contro);
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



// mostra a agenda 
public function consulta_agenda($num=false)
{
if($num===false){$num=0;}
 $dados['age']=$this->Agenda->busca(false,5,$num);
 $dados['dent']=$this->Funcionario->busca_dentista();
 $dados['ser']=$this->Servicos->busca();
 $dados['pagi']=$this->paginacao("Gerencia/consulta_agenda",$this->Agenda->total_registro());
 $this->load->view('header');
 $this->load->view('menu/admin');
 $this->load->view('agenda/consulta_agenda',$dados);
  $this->load->view('rodape');
}

public function excluir_agenda($cod)
{
 $this->Agenda->excluir($cod);
 redirect('Gerencia/consulta_agenda');
}



public function atualiza_agenda()
{
$this->Agenda->set_dados($this->input->post('cod_paciente'));
$this->Agenda->atualiza();
redirect('Gerencia/consulta_agenda');
} 

public function busca_agenda()
{
$dados['age']=$this->Agenda->busca($this->input->post('paciente'));
$dados['dent']=$this->Funcionario->busca_dentista();
$dados['ser']=$this->Servicos->busca();
$this->load->view('header');
$this->load->view('menu/admin');
$this->load->view('agenda/consulta_agenda',$dados);
 $this->load->view('rodape');
}


public function consulta_paciente($num=false)
{if($num===false){$num=0;}
  $dados['pa']=$this->Paciente->busca(5,$num);
  $dados['pagi']=$this->paginacao("Gerencia/consulta_paciente",$this->Paciente->total_registro());
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('paciente/consulta_paciente',$dados);
   $this->load->view('rodape');
}

public function editar_paciente($cod)
{
  $dados['pa']=$this->Paciente->busca_ob($cod);
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('paciente/cadastro',$dados);
   $this->load->view('rodape');

}

public function atualiza_paciente()
{
  $this->Paciente->set_dados();
  $this->Paciente->atualiza();
  redirect('Gerencia/consulta_paciente');
}

public function excluir_paciente($cod)
{
  $this->Paciente->excluir($cod);
  redirect('Gerencia/consulta_paciente');
}

public function busca_paciente()
{
  $dados['pa']=$this->Paciente->busca_nome();
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('paciente/consulta_paciente',$dados);
  $this->load->view('rodape');
}

// busca ficha de anamnesse
public function busca_anamnese()
{
$this->load->model('Anamnese');
$dados=$this->Anamnese->busca($this->input->post('codigo'));
echo json_encode($dados);
}

public function atualiza_anamnesse()
{
$this->load->model('Anamnese');
$this->Anamnese->atualiza();
$this->session->set_flashdata('mensagem', 'Atualizado com sucesso!');
redirect('Gerencia/consulta_paciente');
}



// função autocomplete 
public function auto()
{
$dados=$this->Paciente->verifica_p($this->input->post('paciente'));
foreach ($dados as $value) {
 $da[]= $value->nome;
}
echo json_encode($da);
}




}
?>