<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Pessoa.php';

class Funcionario extends Pessoa {

 private $perfil;
 private $cro;
 private $especializacao;
 private $senha; 



   public function __construct()
        {
         // Call the CI_Model constructor
                parent::__construct();
         }



public function set_codigo($cod){
$this->codigo=$cod;
}

public function set_dados(){
$this->data_ma=date("Y/m/d");
$this->nome=$this->input->post('nome');
$this->celular=$this->input->post('celula');
$this->tel_resindencial=$this->input->post('tele'); 
$this->cpf=$this->input->post('cpf');
$this->sexo=$this->input->post('sexo');
$data=explode('/', $this->input->post('nascimento'));
$this->dt_nascimento= $data[2].'-'.$data[1].'-'.$data[0];
$this->cep=str_replace("-", "",  $this->input->post('cep'));
$this->estado=$this->input->post('estado');
$this->cidade=$this->input->post('cidade');
$this->bairro=$this->input->post('bairro');
$this->endereco=$this->input->post('end');
$this->complemento=$this->input->post('comple');
$this->email=$this->input->post('email');
$this->senha=$this->input->post('senha');
$this->perfil=$this->input->post('perfil');
$this->cro=$this->input->post('cro');
$this->especializacao=$this->input->post('espe');
$this->status=$this->input->post('status');

}

// verifica se a senha esta vazia 
public function verifica_senha(){
  if(!empty($this->senha)){
 $query=$this->codigo();
 $this->codigo=$query->codigo;
 $this->cadastro_login();
}
}

// pegar o maior codigo
public function codigo(){
$this->db->select_max('codigo');
$query = $this->db->get('funcionario'); 
return $query->row();
}


public function cadastro(){
 $this->db->set('nome',$this->nome);
 $this->db->set('cpf',$this->cpf);
 $this->db->set('celular',$this->celular); 
 $this->db->set('te_resindencial',$this->tel_resindencial);
 $this->db->set('sexo',$this->sexo);
 $this->db->set('dt_nascimento',$this->dt_nascimento);
 $this->db->set('email',$this->email);
 $this->db->set('cep',$this->cep);
 $this->db->set('estado',$this->estado);
 $this->db->set('cidade',$this->cidade);
 $this->db->set('bairro',$this->bairro);
 $this->db->set('endereco',$this->endereco);
 $this->db->set('complemento',$this->complemento);
 $this->db->set('data_ma',$this->data_ma);
 $this->db->set('perfil',$this->perfil); 
 $this->db->set('cro',$this->cro); 
 $this->db->set('especializacao',$this->especializacao);
 $this->db->set('status',$this->status);
 $this->db->insert('funcionario');
}
  
  //cadastra o login
public function cadastro_login(){
 $this->db->set('usuario',$this->email);
 $this->db->set('senha', password_hash($this->senha,PASSWORD_DEFAULT)); 
 $this->db->set('funcionario_codigo',$this->codigo); 
 $this->db->insert('login');
}
  
  //busca apenas dentista 
   public function busca_dentista()
   {
    $de= array('Dentista','Dentista administrador');
   $this->db->select('codigo ,nome, especializacao');
   $this->db->from('funcionario');
   $this->db->where_in('perfil',$de);
   return $query=$this->db->get()->result();
}


//pega todos os funcionarios
public function busca_fu($cod=false,$limi=6,$va=0)
{  if ($cod==false) {
  $this->db->select('codigo,especializacao,perfil,nome,celular,email,status');
  $this->db->from('funcionario');
  $this->db->limit($limi,$va);
  return $this->db->get()->result();
}else{
  $this->db->select('*');
  $this->db->from('funcionario');
  $this->db->where('codigo',$cod);
  return $this->db->get()->row();
}
  
}


public function busca()
{
  $this->db->select('codigo,especializacao,perfil,nome,celular,email,status');
  $this->db->from('funcionario');
  $this->db->where('nome',$this->input->post('nome'));
  return $this->db->get()->result();
}


  public function atualiza()
  {
 $this->db->set('nome',$this->nome);
 $this->db->set('cpf',$this->cpf);
 $this->db->set('celular',$this->celular); 
 $this->db->set('te_resindencial',$this->tel_resindencial);
 $this->db->set('sexo',$this->sexo);
 $this->db->set('dt_nascimento',$this->dt_nascimento);
 $this->db->set('email',$this->email);
 $this->db->set('cep',$this->cep);
 $this->db->set('estado',$this->estado);
 $this->db->set('cidade',$this->cidade);
 $this->db->set('bairro',$this->bairro);
 $this->db->set('endereco',$this->endereco);
 $this->db->set('complemento',$this->complemento);
 $this->db->set('data_ma',$this->data_ma);
 $this->db->set('perfil',$this->perfil); 
 $this->db->set('cro',$this->cro); 
 $this->db->set('especializacao',$this->especializacao);
 $this->db->set('status',$this->status);
 $this->db->where('codigo',$this->codigo);
 $this->db->update('funcionario');
}

 // total de registro
  public function total_registro()
  {    
  return $this->db->count_all_results('funcionario'); 
 }

public function valida_usuario()
{
  $this->db->select('f.codigo,f.nome,f.perfil,l.senha');
  $this->db->from('funcionario f');
  $this->db->join('login l','l.funcionario_codigo=f.codigo');
  $this->db->where('l.usuario',$this->input->post('usuario'));
  $query= $this->db->get();
  if($query->num_rows() == 1){
  $query= $query->row();
    if(password_verify($this->input->post('senha'),$query->senha)){return $query;}
}
else{
return array();
 }

}
 
// redefinir a senha do funcionario
public function redefinir_senha()
{
$this->db->set('senha', password_hash($this->input->post('senha1'),PASSWORD_DEFAULT)); 
$this->db->where('usuario',$this->input->post('email'));
$query=$this->db->update('login');
if($query){return true;}else{
  return false;
}

 
}



}