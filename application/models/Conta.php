<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Model{

 private $codigo;
 private $descricao;
 private $valor;
 private $tipo_pagamento;
 private $vencimento;
 private $categoria;
 private $data_pagamento;
 private $clinica;


   public function __construct()
        {
               // Call the CI_Model constructor
                parent::__construct();
                
        }



public function set_codigo() {
  $this->codigo= $this->input->post('codigo'); 
}


public function set_dados($codigo=false) {
	$this->descricao= $this->input->post('descricao');
  $this->valor=str_replace("R$", "",$this->input->post('valor'));
  $this->valor=str_replace(".", "",$this->valor);
  $this->valor=str_replace(",", ".",$this->valor);
  $ve=explode('/', $this->input->post('vencimento'));
  $this->vencimento= $ve[2]."-".$ve[1]."-".$ve[0];
  $this->tipo_pagamento= $this->input->post('tipo');
  $this->categoria= $this->input->post('categoria');
  $d=explode("/",$this->input->post('data'));
  $this->data_pagamento=$d[2]."-".$d[1]."-".$d[0];
  $this->clinica=$codigo;
}



public function cadastro(){
 $this->db->set('descricao',$this->descricao);
 $this->db->set('valor',$this->valor);
 $this->db->set('vencimento',$this->vencimento);
 $this->db->set('categoria',$this->categoria);
 $this->db->set('tipo_pagamento',$this->tipo_pagamento);
 $this->db->set('data_pagamento',$this->data_pagamento);
 $this->db->set('clinica_dados_codigo',$this->clinica);
 $this->db->insert('contas_a_pagar');
}

public function busca_conta($limit=10,$nu=0)
{
$this->db->select('codigo,descricao, valor,vencimento,categoria,tipo_pagamento,data_pagamento');
$this->db->where('status!=', 'excluido');
$this->db->or_where('status is null'); 
$this->db->limit($limit,$nu);
return  $this->db->get('contas_a_pagar')->result();
}

// excluir conta 
public function excluir($conta)
{
$this->db->set('status','excluido');
$this->db->where('codigo', $conta);
$this->db->update('contas_a_pagar');
}


// atualiza os dados 
public function atualiza()
{
 $this->db->set('descricao',$this->descricao);
 $this->db->set('valor',$this->valor);
 $this->db->set('vencimento',$this->vencimento);
 $this->db->set('categoria',$this->categoria);
 $this->db->set('tipo_pagamento',$this->tipo_pagamento);
 $this->db->set('data_pagamento',$this->data_pagamento);
 $this->db->where('codigo',$this->codigo);
 $this->db->update('contas_a_pagar');
}

// busca a descrição especifica
public function busca_des(){
$this->db->select('codigo,descricao,valor,vencimento,categoria,tipo_pagamento,data_pagamento');
$this->db->where('descricao',$this->input->post('descricao'));
$this->db->where('status is null');
return $this->db->get('contas_a_pagar')->result();
}



 // total de registro
  public function total_registro()
  {    
   $this->db->where('status is null');
   return $this->db->count_all_results('contas_a_pagar'); 
}



public function valor_total()
{
$data= date('Y-m-d');
$this->db->select("Month(data_pagamento) as mes,Year(data_pagamento)as ano");
$this->db->select_sum('valor');
$this->db->from('contas_a_pagar');
$this->db->where('Month(data_pagamento)', "Month('$data')",false);
$this->db->where("Year(data_pagamento)", "Year('$data')",false); 
$this->db->group_by('Month(data_pagamento)','Year(data_pagamento)'); 
return $this->db->get()->row();

}


public function des_relatorio()
{
   $data= date('Y-m-d');
   $this->db->select('descricao,valor,tipo_pagamento,data_pagamento');
   $this->db->from('contas_a_pagar');
   $this->db->where('Month(data_pagamento)', "Month('$data')",false);
   $this->db->where("Year(data_pagamento)", "Year('$data')",false); 
   return $this->db->get()->result();
}



//realiza o pagamento da conta do cliente 
public function pagar($cod)
{
$data=date('Y-m-d');
$this->db->set('data_pagamento',$data);
$this->db->where('codigo',$cod);
$this->db->update('contas_a_pagar');
}




}



