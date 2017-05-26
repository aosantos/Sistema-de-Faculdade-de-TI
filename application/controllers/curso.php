<?php

class Curso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
    }

    public function index() {
        $this->load->model('cursosx');
        $data['cursos'] = $this->cursosx->list_cursos();
        $this->load->view('cursos/index', $data);
    }

    public function add_cursos() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_curso', 'Nome do Curso', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nome = $this->input->post('nome_curso');
            $data = array(
                'nome_curso' => $nome
            );

            $this->db->insert('cursos', $data);
            redirect('curso');
            exit;
        }
    }

    public function editar_curso() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_curso', 'Nome do Curso', 'required');
        $this->load->model('cursosx');
        $id = $this->input->post('idcursos');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id = $this->input->post('idcursos');
            $nome = $this->input->post('nome_curso');

            $data = ['nome_curso' => $nome];
            $this->db->where('idcursos', $id);
            $this->db->update('cursos', $data);

            redirect("curso");
        }
    }

    public function removeCurso($id) {
        if ($_POST) {
            $cursos = $_POST['id'];
            $this->load->model('cursosx');
            $this->cursosx->removeCurso($cursos);
        }
    }

}

?>