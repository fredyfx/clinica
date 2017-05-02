<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Model {

  protected $codigo;
  protected $nome;
  protected $celular;
  protected $tel_resindencial;
  protected $email;
  protected $cpf;
  protected $sexo;
  protected $dt_nascimento;
  protected $cep;
  protected $estado;
  protected $cidade;
  protected $bairro;
  protected $endereco;
  protected $complemento;
  protected $status;
  protected $data_ma;
 

   function __construct()
        {
               // Call the CI_Model constructor
                parent::__construct();
                
        }
    
/*
protected function dados(){
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
    }

*/

/*
 protected function cadastro_p(){
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
 $this->db->insert('pessoa');
}
*/
//
/* essa função pega a matricula que foi cadastrada 
protected function matricula(){
$this->db->select_max('matricula');
$query = $this->db->get('pessoa'); 
return $query->row();
}
*/
}

