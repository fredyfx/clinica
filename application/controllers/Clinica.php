<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinica extends CI_Controller {

	public function __construct(){
    
    parent::__construct();
		//carega o modelo Clinica
		//$this->load->helper('form');
    $this->load->model('Conta');
		$this->load->helper('form');
    $this->load->model('Recebimento');
		$this->load->model('Clinica_dados');
    $this->load->model('Servicos');
    $this->load->model('Funcionario');
    $this->load->library('form_validation');
    $this->load->model('Paciente');
    $this->load->library('pagination');

//verifica a sessao;
if(!$this->session->userdata('user') and !$this->session->userdata('perfil')){
redirect('Login/');
}

}


private function valida(){
	  $this->form_validation->set_rules('nome','nome da clinica','trim|required|min_length[5]|max_length[60]');
    $this->form_validation->set_rules('tele','telefone','required');
    $this->form_validation->set_rules('cnpj','cnpj','required');
    $this->form_validation->set_rules('cep','cep','alpha_dash|min_length[8]|max_length[9]|required');
    $this->form_validation->set_rules('estado','estado','trim|required');
    $this->form_validation->set_rules('cidade','cidade','trim|required');
    $this->form_validation->set_rules('bairro','bairro','trim|required');
    $this->form_validation->set_rules('end','endereço','required');
    $this->form_validation->set_rules('complemento','complemento','trim|alpha_numeric_spaces');
    //$this->form_validation->set_message('alfa', 'o campo razão_social so aceita letras');} 
}




public function cadastra_recebimento()
{
  //esssa função coloca como uma regra agora aa
$query=$this->Paciente->verifica($this->input->post('nome'));

 $this->form_validation->set_rules('nome','Paciente','required|min_length[5]|max_length[60]');
 $this->form_validation->set_rules('valor','valor','required');
 $this->form_validation->set_rules('servico','Serviços','required');
 $this->form_validation->set_rules('vencimento','data de vencimento','required');
 $this->form_validation->set_rules('tipo','tipo de pagamento','required');

 if ($this->form_validation->run() === FALSE) {
      $this->recebimento();
 }else if(!empty($query)){
$this->Recebimento->set_dados($query->codigo);
$this->Recebimento->cadastro();
$this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
redirect('Clinica/recebimento');
 }else{
  $this->session->set_flashdata('mensagem', 'Paciente não está cadastrado! ');
  $this->recebimento();
 }
}





public function cadastra(){
         $this->verifica();
         $this->valida();
      if ($this->form_validation->run() === FALSE) {
        	$this->load->view('header');
        	$this->load->view('menu/admin');
          $this->load->view('clinica/clinica');
          $this->load->view('rodape');
        } else{
          $this->Clinica_dados->set_dados();
	        $this->Clinica_dados->cadastro();
          $this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
	        redirect('/Clinica');
          }

      }

	


public function index()
    {   
        $data['cont']=$this->Clinica_dados->busca();
        $this->load->view('header');
        $this->load->view('menu/admin');
        $this->load->view('clinica/clinica',$data);
        $this->load->view('rodape');
    }
	


public function atualiza(){
  $this->valida();
  if($this->form_validation->run() === FALSE){
        $this->load->view('header');
        $this->load->view('menu/admin');
        $this->load->view('clinica/clinica');
        $this->load->view('rodape');
  }else{
  $this->Clinica_dados->set_codigo();
  $this->Clinica_dados->set_dados();
  $this->Clinica_dados->update();
  $this->session->set_flashdata('mensagem', 'Atualizado com sucesso!');
  redirect('Clinica');
    }
}







//verifica se ha clinica ja cadastrada
public function verifica(){
  $cont= $this->Clinica_dados->busca();
  if (!empty($cont)) {
 $this->session->set_flashdata('mensagem', ' Clínica já cadastrada!');
  redirect('/Clinica');

     }
   }


// carrega a tela de cadastro de conta 
public function conta(){

        $this->load->view('header');
        $this->load->view('menu/admin');
        $this->load->view('conta/conta');
        $this->load->view('rodape');
}

// carrega a tela de cadastro de recebimento 
public function recebimento(){
        $data['dados']=$this->Servicos->busca_ser();
        $this->load->view('header');
        $this->load->view('menu/admin');
        $this->load->view('conta/recebimento',$data);
        $this->load->view('rodape');
        }



public function valida_conta(){
   $this->form_validation->set_rules('descricao','Nome','required');
   $this->form_validation->set_rules('valor','Valor','required');
   $this->form_validation->set_rules('vencimento','Vencimento','required');
   $this->form_validation->set_rules('categoria','categoria','required');
   $this->form_validation->set_rules('tipo','tipo de pagamento','required');
 }



public function cadastra_conta(){
  $this->valida_conta();
  if ($this->form_validation->run() === FALSE) {
          $this->load->view('header');
          $this->load->view('menu/admin');
          $this->load->view('conta/conta');
          $this->load->view('rodape');
        }else{
      $cod=$this->Clinica_dados->get_codigo();
      $this->Conta->set_dados($cod);
      $this->Conta->cadastro();
      $this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
      redirect("Clinica/conta/");
} 
}

// excluir conta
public function excluir_conta($conta)
{
 $this->Conta->excluir($conta);
 redirect('Clinica/consulta_conta');
}

// atualiza dados da conta 
public function atualiza_conta()
{
   $this->valida_conta();
    if ($this->form_validation->run() === FALSE) {
         $this->consulta_conta();
        }else{
      $this->Conta->set_codigo();  
      $this->Conta->set_dados();
      $this->Conta->atualiza();
     redirect("Clinica/consulta_conta");
}
}

// busca conta especifica
public function busca_conta(){
  $data['conta']=$this->Conta->busca_des();
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('conta/consulta_conta',$data);
  $this->load->view('rodape');
}

// realiza a paginação
public function paginacao($controle_metodo,$total_re)
{
$config['base_url'] = base_url($controle_metodo);
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


public function consulta_conta($num=false){
if($num===false){$num=0;}
$data['conta']=$this->Conta->busca_conta(5,$num);
$data['pagi']=$this->paginacao('Clinica/consulta_conta',$this->Conta->total_registro());
$this->load->view('header');
$this->load->view('menu/admin');
$this->load->view('conta/consulta_conta',$data);
$this->load->view('rodape');
}


// busca todos os recebimentos
public function consulta_recebimento($num=false)
{if($num===false){$num=0;}
  $data['rece']=$this->Recebimento->busca(5,$num);
  $data['ser']=$this->Servicos->busca_ser();
  $data['pagi']=$this->paginacao('Clinica/consulta_recebimento',$this->Recebimento->total_registro());
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('conta/consulta_recebimento',$data);
  $this->load->view('rodape');
}

//realiza o pagamento da conta do cliente 
public function pagar_conta($cod)
{
$this->Recebimento->pagar($cod);
redirect('Clinica/consulta_recebimento');
}

//realiza o pagamento da conta do cliente 
public function pagar_recebimento($cod)
{
$this->Conta->pagar($cod);
redirect('Clinica/consulta_conta');
}


// atualiza dados de recebimento
public function atualiza_recebimento()
{
 $query=$this->Paciente->verifica($this->input->post('nome'));
 $this->form_validation->set_rules('nome','Paciente','required|min_length[5]|max_length[60]');
 $this->form_validation->set_rules('valor','valor','required');
 $this->form_validation->set_rules('servico','Serviços','required');
 $this->form_validation->set_rules('vencimento','data de vencimento','required');
 $this->form_validation->set_rules('tipo','tipo de pagamento','required');
if ($this->form_validation->run() === FALSE) {
      $this->consulta_recebimento();
}else{
$this->Recebimento->set_codigo();
$this->Recebimento->set_dados($query->codigo);
$this->Recebimento->atualiza();
redirect('clinica/consulta_recebimento');
}
}

public function busca_recebimento()
{
  $data['rece']=$this->Recebimento->busca_rece();
  $data['ser']=$this->Servicos->busca_ser();
  $this->load->view('header');
  $this->load->view('menu/admin');
  $this->load->view('conta/consulta_recebimento',$data);
  $this->load->view('rodape');
}


public function faturamento()
{
 $data['rece']=$this->Recebimento->valortotal();
 $data['contas']= $this->Conta->valor_total();
 $data['des']=$this->Conta->des_relatorio();
 $data['des_re']=$this->Recebimento->des_relatorio();
 $this->load->library('PDF');
 $pdf=$this->PDF->objeto(); 
 $html=$this->load->view('relatorio/Faturamento',$data,true);
 $pdf->writeHTML($html,0);
 $pdf->output();
//$pdf->output("Relatorio.pdf","D");
exit();
}

// essa função busca o valor de servico
public function valor_servico()
{
 $dados=$this->Servicos->busca_valor();
 echo json_encode($dados);
}

}