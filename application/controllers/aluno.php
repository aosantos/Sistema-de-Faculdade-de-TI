<?php

class Aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
    }

    public function index() {
        $this->load->model('alunox');
        $this->load->model('cursosx');
        
        $data['alunos']          = $this->alunox->list_alunosParaDiretor();
        //print_r($data);
        //die();
        $data['cursos_detalhes'] = $this->alunox->cursos_detalhes();
        
        
        $this->load->view('aluno/index',$data);
    }
    public function desativar_aluno(){
            $id     = $this->input->post('id');
            
            $data   = [
                         'ativo'           => 0
                      ];
            
            $this->db->where('idaluno', $id);
            $this->db->update('aluno', $data);
            echo $this->db->last_query();
            die();
            
    }
    public function ativar_aluno(){
            $id     = $this->input->post('id');
            
            $data   = [
                         'ativo'           => 1
                      ];
            
            $this->db->where('idaluno', $id);
            $this->db->update('aluno', $data);
            echo $this->db->last_query();
            die();
            
    }
   
   
}

?>