<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Model{

 private $codigo;
 private $descricao;
 private $valor;
 private $especialidade;
 private $status;
 private $clinica;

   public function __construct()
        {
               // Call the CI_Model constructor
                parent::__construct();
                
        }


        public function set_codigo(){
         $this->codigo= $this->input->post('codigo');  
        }


 public function set_dados($codigo){
   $this->descricao=$this->input->post('nome');
   $this->especialidade= $this->input->post('espe');
   $this->valor=str_replace("R$", "", $this->input->post('valor'));
   $this->status= $this->input->post('status');
   $this->clinica=$codigo;
      }


public function cadastro(){
 $this->db->set('descricao',$this->descricao);
 $this->db->set('especialidade',$this->especialidade); 
 $this->db->set('valor', $this->valor);
 $this->db->set('status', $this->status);
 $this->db->set('clinica_dados_codigo', $this->clinica);
 $this->db->insert('servicos');
}


	
  public function busca($limit=10,$nu=0){
   $dados= array('ativo','inativo');
   $this->db->where_in('status',$dados);
   $this->db->limit($limit,$nu);
   $query= $this->db->get('servicos');
   return $query->result(); 
     }

 // busca a descricao especifica
public function busca_des(){
$this->db->where('descricao',$this->input->post('descricao'));
 return $this->db->get('servicos')->result(); 
}
  // busca apenas serviços ativos 
public function busca_ser()
{
$this->db->select('codigo,descricao');
$this->db->where('status!=','inativo');
return $this->db->get('servicos')->result();
}


// conserta
public function update(){
 $this->db->set('descricao',$this->descricao);
 $this->db->set('especialidade',$this->especialidade);
 $this->db->set('valor',$this->valor);
 $this->db->set('status',$this->status);
 $this->db->where('codigo',$this->codigo);
 $this->db->update('servicos');
}
	

	public function excluir($cod){
   $this->db->set('status',"excluido"); 
   $this->db->where('codigo',$cod);
   $this->db->update('servicos');
  }

  // total de registro
  public function total_registro()
  {    
   $dados= array('ativo','inativo');
   $this->db->where_in('status',$dados);
   return $this->db->count_all_results('servicos'); 
 
}

// essa função pega o valor do serviço
public function busca_valor()
{
 $this->db->select('valor');
 $this->db->where('codigo',$this->input->post('codigo'));
 return $this->db->get('servicos')->row();
}


}
