<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo extends CI_Model{

private $codigo;
private $descricao;
private $salario;
 

   public function __construct()
        {
               // Call the CI_Model constructor
                parent::__construct();
                
        }



public function set_codigo($cod){
	$this->codigo=$cod;
}

public function set_dados(){
	$this->descricao=$this->input->post('nome');
	$this->salario=$this->input->post('salario');
}


 public function cadastro(){
 $this->db->set('descricao',$this->descricao);
 $this->db->set('salario',$this->salario); 
 $this->db->insert('cargo');
}


public function busca(){
$query = $this->db->get('cargo');
return $query->result();
}




    }
