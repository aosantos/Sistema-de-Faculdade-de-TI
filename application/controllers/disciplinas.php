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
        $data['nomecurso']            =  $this->cursosx->nomecurso();
        $data['contar_diretor']       =  $this->diretorx->contar_diretor();
        $data['contar_departamento']  =  $this->diretorx->contar_departamento();
        $data['contar_cursos']        =  $this->cursosx->contar_cursos();
        $data['contar_professor']     =  $this->professorx->contar_professor();
        $data['contar_aluno']         =  $this->alunox->contar_aluno();
        $data['contar_operador']      =  $this->operadorx->contar_operador();
        
        $this->load->view('disciplinas/index',$data);
    }
    
    public function add_disciplinas(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_disciplinas', 'Nome da Disciplina', 'required');
        $this->form_validation->set_rules('nome_curso', 'Nome do Cursos', 'required');
        $this->form_validation->set_rules('semestre', 'Semestre', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $disciplina =  $this->input->post('nome_disciplinas');
            $cursos     =  $this->input->post('nome_curso');
            $semestre   =  $this->input->post('semestre');
            
            $data = array(
                'nome_disciplinas' => $disciplina,
                'idcursos' => $cursos,
                'semestre' => $semestre,
                
            );
            $this->db->insert('disciplinas_nome', $data);
            redirect('disciplinas');
            exit;
        }
    }
    public function editar_disciplinas() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_disciplinas', 'Nome da Disciplina', 'required');
        $this->form_validation->set_rules('nome_curso', 'Nome do Cursos', 'required');
        $this->form_validation->set_rules('semestre', 'Semestre', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id         =  $this->input->post('iddisciplinas_nome');
            $disciplina =  $this->input->post('nome_disciplinas');
            $cursos     =  $this->input->post('nome_curso');
            $semestre   =  $this->input->post('semestre');
            
            $data = array(
                'iddisciplinas_nome' => $id,
                'nome_disciplinas' => $disciplina,
                'idcursos' => $cursos,
                'semestre' => $semestre,
                
            );            
            $this->db->where('iddisciplinas_nome', $id);
            $this->db->update('disciplinas_nome', $data);
            
            redirect("disciplinas");
        }
    }
     public function removeDisciplinas($id) {
        if ($_POST) {
            $disciplinas = $_POST['id'];            
            $this->disciplinasx->removeDisciplinas($disciplinas);
        }
    }

}
    ?>
