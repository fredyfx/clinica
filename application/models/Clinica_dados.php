<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinica_dados extends CI_Model{

 private $codigo;
 private $nome;
 private $cnpj;
 private $telefone;
 private $cep;
 private $estado;
 private $cidade;
 private $bairro;
 private $endereco;
 private $complemento;
 private $logotipo;

   public function __construct()
        {
               // Call the CI_Model constructor
                parent::__construct();
                
        }

public function set_codigo(){
         $this->codigo= $this->input->post('codigo');  
        }

 public function set_dados(){
   $this->nome=$this->input->post('nome');
   $this->cnpj=  $this->input->post('cnpj');
   $this->telefone= str_replace("-", "",$this->input->post('tele'));
   $this->cep= str_replace("-", "",  $this->input->post('cep'));
   $this->estado= $this->input->post('estado');
   $this->cidade= $this->input->post('cidade');
   $this->bairro=   $this->input->post('bairro');
   $this->endereco= $this->input->post('end');
   $this->complemento=  $this->input->post('complemento');
   $this->logotipo= $this->input->post('logotipo');
}


public function cadastro(){
 
 $this->db->set('nome',$this->nome);
 $this->db->set('cnpj',$this->cnpj);
 $this->db->set('telefone',$this->telefone);
 $this->db->set('cep',$this->cep);
 $this->db->set('estado',$this->estado);
 $this->db->set('cidade',$this->cidade);
 $this->db->set('bairro', $this->bairro);
 $this->db->set('endereco',$this->endereco);
 $this->db->set('complemento',$this->complemento); 
 $this->db->set('logotipo', $this->logotipo);
 $this->db->insert('clinica_dados');
}


	
  public function busca(){
  $query= $this->db->get('clinica_dados');
  return $query->row(); 
     }
  





public function update(){
 $this->db->set('nome',$this->nome);
 $this->db->set('cnpj',$this->cnpj);
 $this->db->set('telefone',$this->telefone);
 $this->db->set('cep',$this->cep);
 $this->db->set('estado',$this->estado);
 $this->db->set('cidade',$this->cidade);
 $this->db->set('bairro', $this->bairro);
 $this->db->set('endereco',$this->endereco);
 $this->db->set('complemento',$this->complemento); 
 $this->db->set('logotipo', $this->logotipo);
 $this->db->where('codigo',$this->codigo);
 $this->db->update('clinica_dados');
}
	
  // retorna o codigo
public function  get_codigo()
{
  $this->db->select('codigo');
  $query=$this->db->get('clinica_dados');
  $query=$query->row();
  return $query->codigo;
}


	
}
