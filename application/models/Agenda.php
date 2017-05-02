<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Model{

private $codigo;
private $data;
private $horario;
private $ate;
private $servico;
private $paciente;
private $dentista;
private $status;
private $obs;
 

   public function __construct()
        {
               // Call the CI_Model constructor
                parent::__construct();
                
        }



public function set_codigo($cod){
	$this->codigo=$cod;
}

public function set_dados($pac){
  $this->paciente=$pac;
	$this->dentista=$this->input->post('dentista');
	$this->servico=$this->input->post('servico');
	$this->horario=$this->input->post('horario');
	$this->ate=$this->input->post('ate');
	$this->obs=$this->input->post('obs');
  $this->status=$this->input->post('status');
  $this->data= date('Y-m-d',strtotime($this->input->post('data')));
}


 public function cadastro(){
 $this->db->set('data',$this->data);
 $this->db->set('horario',$this->horario); 
 $this->db->set('ate',$this->ate);
 $this->db->set('observacao',$this->obs);
 $this->db->set('status',$this->status);
 $this->db->set('paciente_codigo',$this->paciente);
 $this->db->set('funcionario_codigo',$this->dentista);
 $this->db->set('servicos_codigo',$this->servico);
 $this->db->insert('agendamento');
}


public function busca($nome=false,$limit=5,$valo=0){
  if($nome==false){
$this->db->select('a.*,f.nome as funcionario,p.nome,s.descricao');
$this->db->from('agendamento a');
$this->db->join('paciente p','p.codigo=a.paciente_codigo');
$this->db->join('funcionario f','f.codigo=a.funcionario_codigo');
$this->db->join('servicos s','s.codigo=a.servicos_codigo');
$this->db->where('a.status!=','excluido');
$this->db->limit($limit,$valo);
return $this->db->get()->result();
}else{
$this->db->select('a.*,f.nome as funcionario,p.nome,s.descricao');
$this->db->from('agendamento a');
$this->db->join('paciente p','p.codigo=a.paciente_codigo');
$this->db->join('funcionario f','f.codigo=a.funcionario_codigo');
$this->db->join('servicos s','s.codigo=a.servicos_codigo');
$this->db->where('a.status!=','excluido');
$this->db->where('p.nome',$nome);
return $this->db->get()->result();
}
}

public function verifica_horario()
{
$data=date('Y-m-d',strtotime($this->input->post('data')));
$this->db->where('paciente_codigo',$this->paciente);
$this->db->where('funcionario_codigo',$this->input->post('dentista'));
$this->db->where('data',$data);
$this->db->where('horario >=',$this->input->post('horario'));
$this->db->where('ate <=',$this->input->post('ate'));
$dados=$this->db->get('agendamento')->row();

if(!empty($dados)){
$bo=false;
}else{
	$bo=true;
}
 return $bo;
}

    
public function excluir($cod)
{
 $this->db->set('status','excluido');
 $this->db->where('codigo',$cod);
 $this->db->update('agendamento');
}



public function atualiza()
{
 $this->db->set('data',$this->data);
 $this->db->set('horario',$this->horario); 
 $this->db->set('ate',$this->ate);
 $this->db->set('observacao',$this->obs);
 $this->db->set('status',$this->status);
 $this->db->set('paciente_codigo',$this->paciente);
 $this->db->set('funcionario_codigo',$this->dentista);
 $this->db->set('servicos_codigo',$this->servico);
 $this->db->where('codigo',$this->input->post('codigo'));
 $this->db->update('agendamento');
 
}

public function total_registro()
{
$this->db->where('status!=','excluido');
return $this->db->count_all_results('agendamento');
}

    }
