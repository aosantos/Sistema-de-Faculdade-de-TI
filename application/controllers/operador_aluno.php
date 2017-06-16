<?php

class operador_aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');        
        $this->load->model('alunox');
        $this->load->model('cursosx');
        $this->load->model('diretorx');
        
    }

    public function index() {
        $data['aluno']                  =  $this->alunox->list_alunosParaOperador();
        $data['cursos_detalhes']        =  $this->alunox->cursos_detalhes();
        $data['nome_curso']             =  $this->cursosx->nomecurso();
        $data['nome_departamento']      =  $this->diretorx->nomedepartamento();
        
        $this->load->view('operador/aluno',$data);
    }
   
}

?>