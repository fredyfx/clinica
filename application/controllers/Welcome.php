<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

public function __construct(){
	parent::__construct();
	$this->load->helper('form');
	$this->load->model('Cargo');
 

}


	public function index()
    {    
	    
		
		$this->load->view('header');
		$this->load->view('menu/admin');
		$this->load->view('clinica');
		//$this->load->view('rodape');
	}

public function fun(){
	 $dato['cont']=$this->Cargo->busca();
            $this->load->view('header');
            $this->load->view('menu/admin');
            $this->load->view('funcionario/cadastro',$dato);
}

	
}
