<?php

class Aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
        $this->load->model('diretorx');
        $this->load->model('cursosx');
        $this->load->model('professorx');
        $this->load->model('alunox');
        $this->load->model('operadorx');

    }

    public function index() {
<<<<<<< HEAD
        $data['alunos']               = $this->alunox->list_alunosParaDiretor();
        $data['cursos_detalhes']      = $this->alunox->cursos_detalhes();
        $data['contar_diretor']       =  $this->diretorx->contar_diretor();
        $data['contar_departamento']  =  $this->diretorx->contar_departamento();
        $data['contar_cursos']        =  $this->cursosx->contar_cursos();
        $data['contar_professor']     =  $this->professorx->contar_professor();
        $data['contar_aluno']         =  $this->alunox->contar_aluno();
        $data['contar_operador']      =  $this->operadorx->contar_operador();
=======
        $this->load->model('alunox');
        $this->load->model('cursosx');
        
        $data['alunos']          = $this->alunox->list_alunosParaDiretor();
        
        $data['cursos_detalhes'] = $this->alunox->cursos_detalhes();
        
>>>>>>> origin/master
        
        $this->load->view('aluno/index',$data);
    }
    public function desativar_aluno(){
            $id     = $this->input->post('id');

            $data   = [
                         'ativo'           => 0
                      ];

            $this->db->where('idaluno', $id);
            $this->db->update('aluno', $data);
<<<<<<< HEAD
=======
           
>>>>>>> origin/master
            
    }
    public function ativar_aluno(){
            $id     = $this->input->post('id');

            $data   = [
                         'ativo'           => 1
                      ];

            $this->db->where('idaluno', $id);
            $this->db->update('aluno', $data);
<<<<<<< HEAD

=======
            
            
>>>>>>> origin/master
    }


}

?>
