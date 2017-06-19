<?php

class Professor extends CI_Controller {

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
        $this->load->library('form_validation');
        $data['professor']      = $this->professorx->list_professor();
        
        $nome_departamento2     = $this->professorx->diretor();
        
        $data['nome_departamento']    =  $this->professorx->diretor();
        $option2 = "<option value=''></option>";
        $data['contar_diretor']       =  $this->diretorx->contar_diretor();
        $data['contar_departamento']  =  $this->diretorx->contar_departamento();
        $data['contar_cursos']        =  $this->cursosx->contar_cursos();
        $data['contar_professor']     =  $this->professorx->contar_professor();
        $data['contar_aluno']         =  $this->alunox->contar_aluno();
        $data['contar_operador']      =  $this->operadorx->contar_operador();
        
        $this->load->view('professor/index', $data);
    }

    public function add_professor() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('diretor_iddiretor', 'Cadastro de Professor em Departamento de diretores cadastrados', 'required');
        $this->form_validation->set_rules('nome_professor', 'Nome do Professor', 'required');
        $this->form_validation->set_rules('login_professor', 'Login', 'required');
        $this->form_validation->set_rules('senha_professor', 'Senha', 'required');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('rua', 'Rua', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('numero', 'Número', 'required');
        $this->form_validation->set_rules('email_professor', 'Email', 'required');
        $this->form_validation->set_rules('telefone_professor', 'Telefone', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $diretor        = $this->input->post('diretor_iddiretor');
            $professor      = $this->input->post('nome_professor');
            $login          = $this->input->post('login_professor');
            $senha          = $this->input->post('senha_professor');
            $cep            = $this->input->post('cep');
            $rua            = $this->input->post('rua');
            $bairro         = $this->input->post('bairro');
            $numero         = $this->input->post('numero');
            $email          = $this->input->post('email_professor');
            $telefone       = $this->input->post('telefone_professor');
            $estado         = $this->input->post('estado');
            $cidade         = $this->input->post('cidade');

            $data = ['diretor_iddiretor'    => $diretor,
                'nome_professor'            => $professor,
                'login_professor'           => $login,
                'senha_professor'           => $senha,
                'cep'                       => $cep,
                'rua'                       => $rua,
                'bairro'                    => $bairro,
                'numero'                    => $numero,
                'email_professor'           => $email,
                'telefone_professor'        => $telefone,
                'estado'                    => $estado,
                'cidade'                    => $cidade,
            ];
            $this->db->insert('professor', $data);
            redirect('professor');
            exit;
        }
    }
     public function editar_professor(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('diretor_iddiretor', 'Cadastro de Professor em Departamento de diretores cadastrados', 'required');
        $this->form_validation->set_rules('nome_professor', 'Nome do Professor', 'required');
        $this->form_validation->set_rules('login_professor', 'Login', 'required');
        $this->form_validation->set_rules('senha_professor', 'Senha', 'required');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('rua', 'Rua', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('numero', 'Número', 'required');
        $this->form_validation->set_rules('email_professor', 'Email', 'required');
        $this->form_validation->set_rules('telefone_professor', 'Telefone', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id             = $this->input->post('idprofessor');
            $departamento   = $this->input->post('diretor_iddiretor');
            $diretor        = $this->input->post('nome_professor');
            $login          = $this->input->post('login_professor');
            $senha          = $this->input->post('senha_professor');            
            $cep            = $this->input->post('cep');
            $rua            = $this->input->post('rua');
            $bairro         = $this->input->post('bairro');
            $numero         = $this->input->post('numero');
            $email          = $this->input->post('email_professor');
            $telefone       = $this->input->post('telefone_professor');
            $estado         = $this->input->post('estado');
            $cidade         = $this->input->post('cidade');
            
            $data = ['diretor_iddiretor'      => $departamento,
                    'nome_professor'          => $diretor,
                    'login_professor'         => $login,
                    'senha_professor'         => $senha,
                    'cep'                     => $cep,
                    'rua'                     => $rua,
                    'bairro'                  => $bairro,
                    'numero'                  => $numero,
                    'email_professor'         => $email,
                    'telefone_professor'      => $telefone,
                    'estado'                  => $estado,
                    'cidade'                  => $cidade,
                    ];
             $this->db->where('idprofessor', $id);
             $this->db->update('professor', $data);
             
            redirect('professor');
            exit;
        }
    }
    public function removeProfessor($id) {
        if ($_POST) {
            $professor   = $_POST['id'];
            $this->load->model('professorx');            
            $this->professorx->removeProfessor($professor);
        }
    }
    public function meudiretor(){
        $data['meudiretor']    =  $this->professorx->meudiretor();
        $this->load->view('professor/meudiretor',$data);
    }
    public function meusalunos(){
        $data['meusalunos']    =  $this->professorx->meusalunos();
        
        
        $this->load->view('professor/meusalunos',$data);
    }
}

?>