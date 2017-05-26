<?php

class Aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
    }

    public function index() {
        $this->load->model('alunox');
        $data['aluno']         = $this->alunox->list_alunosParaOperador();
        
        $this->load->view('aluno/index',$data);
    }
   
}

?>