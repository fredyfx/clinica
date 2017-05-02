<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anamnese extends CI_Model {
    private $codigo;
    private $paciente;
    private $doença;
    private $alergia;
    private $medicamento;
    private $fumante;
    private $gestande;
    private $pressao;

   public function __construct()
        {
               // Call the CI_Model constructor
                parent::__construct();
                
        }
    
        function set_Codigo($codigo) {
            $this->codigo = $codigo;
        }

        function set_Paciente($paciente) {
            $this->paciente = $paciente;
        }

        
        
   
        public function set_dados() {
            $this->doença= $this->input->post('doenca');
            $this->alergia=$this->input->post('alergia');
            $this->medicamento=$this->input->post('medicam');
            $this->fumante=$this->input->post('fumante');
            $this->gestande=$this->input->post('g');
            $this->pressao= $this->input->post('p');
            $this->verifica_campos();
            }
        
        // verifica os campos se usuario coloco sim
            private function verifica_campos() {
                if(!empty($this->input->post('nome'))){
                    $this->doença=$this->input->post('nome');
                   }
                   if(!empty($this->input->post('alergia_nome'))){
                       $this->alergia=$this->input->post('alergia_nome');
                   }
                   
                   if (!empty($this->input->post('nome_medica'))){
                       $this->medicamento=$this->input->post('nome_medica');
                   }
            }

            
            
public function cadastra() {
 $this->db->set('doenca',  $this->doença);
 $this->db->set('alergia',$this->alergia); 
 $this->db->set('fumante',$this->fumante); 
 $this->db->set('gestante',$this->gestande); 
 $this->db->set('medicamento',$this->medicamento); 
 $this->db->set('pressao',$this->pressao);
 $this->db->set('paciente_codigo',$this->paciente);
 $this->db->insert('anamnese');
}

// busca a ficha de anamnese do paciente 
public function busca($cod)
{
 $this->db->select('a.*,p.nome');
 $this->db->from('anamnese a');
 $this->db->join('paciente p','a.paciente_codigo= p.codigo');
 $this->db->where('a.paciente_codigo',$cod);
return $this->db->get()->row();
 }


// atualiza dados 
 public function atualiza()
 {
 $this->db->set('doenca',$this->input->post('doenca'));
 $this->db->set('alergia',$this->input->post('alergia')); 
 $this->db->set('fumante',$this->input->post('fumante')); 
 $this->db->set('gestante',$this->input->post('gestande')); 
 $this->db->set('medicamento',$this->input->post('medicamento')); 
 $this->db->set('pressao',$this->input->post('pressao'));
 $this->db->where('paciente_codigo',$this->input->post('codigo'));
 $this->db->update('anamnese');
 }




}
