<?php

class operador_aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
    }

    public function index() {
        $this->load->model('alunox');
        $this->load->model('cursosx');
        $data['aluno']           = $this->alunox->list_alunosParaOperador();
        $data['cursos_detalhes'] = $this->alunox->cursos_detalhes();
        
        $nome_curso       = $this->cursosx->nomecurso();
        $option = "<option value=''></option>";
        foreach ($nome_curso->result() as $linha) {
             $option .= "<option value='$linha->idcursos'>$linha->nome_curso</option>";
        }
        $data['nome_curso'] = $option;
        
        
        $this->load->view('operador/aluno',$data);
    }
   
}

?>