<?php

class Disciplinas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
        $this->load->model('diretorx');
        $this->load->model('cursosx');
        $this->load->model('professorx');
        $this->load->model('alunox');
        $this->load->model('operadorx');
        $this->load->model('disciplinasx');
        
}

    public function index(){
        
        $data['disciplinas']          =  $this->disciplinasx->list_disciplinas();
        $data['diretor']              =  $this->diretorx->list_diretor();
        $data['nome_departamento']    =  $this->diretorx->nomedepartamento();
        $data['contar_diretor']       =  $this->diretorx->contar_diretor();
        $data['contar_departamento']  =  $this->diretorx->contar_departamento();
        $data['contar_cursos']        =  $this->cursosx->contar_cursos();
        $data['contar_professor']     =  $this->professorx->contar_professor();
        $data['contar_aluno']         =  $this->alunox->contar_aluno();
        $data['contar_operador']      =  $this->operadorx->contar_operador();
        
        
        $this->load->view('disciplinas/index',$data);
    }
}
    ?>
