<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Pessoa.php';

class Paciente extends Pessoa {

 
 private $obs;
 private $responsavel;
 private $cpf_responsavel;
 
 



   public function __construct()
        {
         // Call the CI_Model constructor
                parent::__construct();
         }


public function set_codigo($cod)
{
 $this->codigo=$cod;
}



 public function set_dados()
{
 
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
$this->obs= $this->input->post('obser');
$this->responsavel=$this->input->post('responsavel');
$this->cpf_responsavel=$this->input->post('cpf_responsavel');
}


public function cadastro()
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
 $this->db->set('obs',$this->obs);
 $this->db->set('nome_responsavel',$this->responsavel); 
 $this->db->set('cpf_responsavel',$this->cpf_responsavel); 
 $this->db->insert('paciente'); 
}


// pegar o maior codigo
public function codigo(){
$this->db->select_max('codigo');
$query = $this->db->get('paciente'); 
return $query->row();
}

// arruma verica paciente 
public function verifica($nome)
{
   $this->db->select('codigo');
   $this->db->from('paciente');
   $this->db->where('nome',$nome);
   return $query=$this->db->get()->row();
}

// arruma o ajaz coloca tudo em um so 
public function verifica_p($nome)
{
   $this->db->select('nome');
   $this->db->from('paciente');
   $this->db->like('nome',$nome);
return $this->db->get()->result();
  }



public function busca($limi=5,$valo=0)
{
$this->db->where('status!=','excluido');
$this->db->limit($limi,$valo);
return $this->db->get('paciente')->result();
}

public function busca_ob($cod)
{
  $this->db->where('status!=','excluido');
  $this->db->where('codigo',$cod);
 $query=$this->db->get('paciente');
 return $query->row();
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
 $this->db->set('obs',$this->obs);
 $this->db->set('nome_responsavel',$this->responsavel); 
 $this->db->set('cpf_responsavel',$this->cpf_responsavel); 
 $this->db->where('codigo',$this->input->post('codigo'));
 $this->db->update('paciente');
}


public function excluir($cod)
{
$this->db->set('status','excluido');
$this->db->where('codigo',$cod);
$this->db->update('paciente');
}

public function busca_nome()
{
  $this->db->where('nome',$this->input->post('paciente'));
  $this->db->where('status!=','excluido');
  return $this->db->get('paciente')->result();
}


public function total_registro()
{
$this->db->where('status!=','excluido');
 return $this->db->count_all_results('paciente');
}

}


?>