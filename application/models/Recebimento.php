<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recebimento extends CI_Model{

private $codigo;
private $valor;
private $data;
private $tipo_pagamento;
private $vencimento;
private $paciente;
private $servico;
 

   public function __construct()
        {
               // Call the CI_Model constructor
                parent::__construct();
                
        }



public function set_codigo($cod){
$this->codigo=$this->input->post('codigo');
}

public function set_dados($cod){
	$this->paciente=$cod;
	$this->servico=$this->input->post('servico');
  $ve=explode('/', $this->input->post('vencimento'));
	$this->vencimento=$ve[2]."-".$ve[1]."-".$ve[0];
  $this->tipo_pagamento=$this->input->post('tipo');
  $d=explode("/",$this->input->post('data'));
  $this->data=$d[2]."-".$d[1]."-".$d[0];
  $this->valor=str_replace("R$", "",$this->input->post('valor'));
}


 public function cadastro(){
 $this->db->set('valor',$this->valor);
 $this->db->set('data_pagamento',$this->data); 
 $this->db->set('tipo_pagamento',$this->tipo_pagamento); 
 $this->db->set('vencimento',$this->vencimento); 
 $this->db->set('paciente_codigo',$this->paciente); 
 $this->db->set('servicos_codigo',$this->servico); 
 $this->db->insert('recebimento');
}


public function busca($li=10,$va=0){
$this->db->select('recebimento.*,paciente.nome,servicos.descricao');
$this->db->from('recebimento');
$this->db->join('paciente','paciente.codigo= recebimento.paciente_codigo');
$this->db->join('servicos','servicos.codigo=recebimento.servicos_codigo');
$this->db->limit($li,$va);
$query = $this->db->get();
return $query->result();
}

//realiza o pagamento da conta do cliente 
public function pagar($cod)
{
$data=date('Y-m-d');
$this->db->set('data_pagamento',$data);
$this->db->where('codigo',$cod);
$this->db->update('recebimento');
}


// atualiza dos dados 
public function atualiza()
{
 $this->db->set('valor',$this->valor);
 $this->db->set('data_pagamento',$this->data); 
 $this->db->set('tipo_pagamento',$this->tipo_pagamento); 
 $this->db->set('vencimento',$this->vencimento); 
 $this->db->set('paciente_codigo',$this->paciente); 
 $this->db->set('servicos_codigo',$this->servico); 
 $this->db->where('codigo',$this->codigo);
 $this->db->update('recebimento');
}

public function busca_rece()
{
$this->db->select('recebimento.*,paciente.nome,servicos.descricao');
$this->db->from('recebimento');
$this->db->join('paciente','paciente.codigo= recebimento.paciente_codigo');
$this->db->join('servicos','servicos.codigo=recebimento.servicos_codigo');
$this->db->where('paciente.nome',$this->input->post('nome'));
$query = $this->db->get();
return $query->result();
}


public function total_registro()
{
return $this->db->count_all_results('recebimento');
}

// retorna o valor total de recebimento por mes 
public function valortotal()
{
$data= date('Y-m-d');
$this->db->select("Month(data_pagamento) as mes,Year(data_pagamento)as ano");
$this->db->select_sum('valor');
$this->db->from('recebimento');
$this->db->where('Month(data_pagamento)', "Month('$data')",false);
$this->db->where("Year(data_pagamento)", "Year('$data')",false); 
$this->db->group_by('Month(data_pagamento)','Year(data_pagamento)'); 
return $this->db->get()->row();
} 

public function des_relatorio()
{
   $data= date('Y-m-d');
   $this->db->select('r.valor,r.data_pagamento,p.nome,s.descricao');
   $this->db->from('recebimento r');
   $this->db->join('paciente p','p.codigo=r.paciente_codigo');
   $this->db->join('servicos s','s.codigo=r.servicos_codigo');
   $this->db->where('Month(r.data_pagamento)', "Month('$data')",false);
   $this->db->where("Year(r.data_pagamento)", "Year('$data')",false); 
   return $this->db->get()->result();
}
 


 }
   
