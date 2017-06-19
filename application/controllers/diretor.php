<?php

class Diretor extends CI_Controller {
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
        
        $data['diretor']              =  $this->diretorx->list_diretor();
        $data['nome_departamento']    =  $this->diretorx->nomedepartamento();
        $data['contar_diretor']       =  $this->diretorx->contar_diretor();
        $data['contar_departamento']  =  $this->diretorx->contar_departamento();
        $data['contar_cursos']        =  $this->cursosx->contar_cursos();
        $data['contar_professor']     =  $this->professorx->contar_professor();
        $data['contar_aluno']         =  $this->alunox->contar_aluno();
        $data['contar_operador']      =  $this->operadorx->contar_operador();
        $data['contar_disciplinas']   =  $this->disciplinasx->contar_disciplinas();
        
        $this->load->view('diretor/index',$data);
    }
    public function home(){
        
        $data['contar_diretor']       =  $this->diretorx->contar_diretor();
        $data['contar_departamento']  =  $this->diretorx->contar_departamento();
        $data['contar_cursos']        =  $this->cursosx->contar_cursos();
        $data['contar_professor']     =  $this->professorx->contar_professor();
        $data['contar_aluno']         =  $this->alunox->contar_aluno();
        $data['contar_operador']      =  $this->operadorx->contar_operador();
        $this->load->view('usuario/diretor',$data);
    }
    public function departamento(){
        $data['departamento']         = $this->diretorx->list_departamento();
        $data['contar_diretor']       =  $this->diretorx->contar_diretor();
        $data['contar_departamento']  =  $this->diretorx->contar_departamento();
        $data['contar_cursos']        =  $this->cursosx->contar_cursos();
        $data['contar_professor']     =  $this->professorx->contar_professor();
        $data['contar_aluno']         =  $this->alunox->contar_aluno();
        $data['contar_operador']      =  $this->operadorx->contar_operador();
        
        $this->load->view('departamento/index',$data);
    }

    public function add_departamento(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_departamento', 'Nome do Departamento', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->departamento();
        } else {
            $nome = $this->input->post('nome_departamento');
            $data = array(
                'nome_departamento' => $nome
            );

            $this->db->insert('departamento', $data);
            redirect('departamento');
            exit;
        }
    }

    public function editar_departamento() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_departamento', 'Nome do Departamento', 'required');
        $id = $this->input->post('iddepartamento');
        if ($this->form_validation->run() == FALSE) {
            $this->departamento();
        } else {
            $id     = $this->input->post('iddepartamento');
            $nome   = $this->input->post('nome_departamento');

            $data   = ['nome_departamento' => $nome];
            $this->db->where('iddepartamento', $id);
            $this->db->update('departamento', $data);

            redirect("departamento");
        }
    }

    public function removeDepartamento($id) {
        if ($_POST) {
            $departamento   = $_POST['id'];
            $this->load->model('diretorx');
            $this->diretorx->removeDepartamento($departamento);
        }
    }
    public function removeDiretor($id) {
        if ($_POST) {
            $diretor   = $_POST['id'];
            $this->load->model('diretorx');
            $this->diretorx->removeDiretor($diretor);
        }
    }
    public function add_diretor(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('departamento_iddepartamento', 'Nome do Departamento', 'required');
        $this->form_validation->set_rules('nome_diretor', 'Nome do Diretor', 'required');
        $this->form_validation->set_rules('login_diretor', 'Login', 'required');
        $this->form_validation->set_rules('senha_diretor', 'Senha', 'required');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('rua', 'Rua', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('numero', 'Número', 'required');
        $this->form_validation->set_rules('email_diretor', 'Email', 'required');
        $this->form_validation->set_rules('telefone_diretor', 'Telefone', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $departamento   = $this->input->post('departamento_iddepartamento');
            $diretor        = $this->input->post('nome_diretor');
            $login          = $this->input->post('login_diretor');
            $senha          = $this->input->post('senha_diretor');
            $cep            = $this->input->post('cep');
            $rua            = $this->input->post('rua');
            $bairro         = $this->input->post('bairro');
            $numero         = $this->input->post('numero');
            $email          = $this->input->post('email_diretor');
            $telefone       = $this->input->post('telefone_diretor');
            $estado         = $this->input->post('estado');
            $cidade         = $this->input->post('cidade');

            $data = ['departamento_iddepartamento' => $departamento,
                    'nome_diretor'          => $diretor,
                    'login_diretor'         => $login,
                    'senha_diretor'         => $senha,
                    'cep'                   => $cep,
                    'rua'                   => $rua,
                    'bairro'                => $bairro,
                    'numero'                => $numero,
                    'email_diretor'         => $email,
                    'telefone_diretor'      => $telefone,
                    'estado'                => $estado,
                    'cidade'                => $cidade,
                    ];
            $this->db->insert('diretor', $data);
            redirect('diretor');
            exit;
        }
    }
    public function editar_diretor(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('departamento_iddepartamento', 'Nome do Departamento', 'required');
        $this->form_validation->set_rules('nome_diretor', 'Nome do Diretor', 'required');
        $this->form_validation->set_rules('login_diretor', 'Login', 'required');
        $this->form_validation->set_rules('senha_diretor', 'Senha', 'required');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('rua', 'Rua', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('numero', 'Número', 'required');
        $this->form_validation->set_rules('email_diretor', 'Email', 'required');
        $this->form_validation->set_rules('telefone_diretor', 'Telefone', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id             = $this->input->post('iddiretor');
            $departamento   = $this->input->post('departamento_iddepartamento');
            $diretor        = $this->input->post('nome_diretor');
            $login          = $this->input->post('login_diretor');
            $senha          = $this->input->post('senha_diretor');
            $cep            = $this->input->post('cep');
            $rua            = $this->input->post('rua');
            $bairro         = $this->input->post('bairro');
            $numero         = $this->input->post('numero');
            $email          = $this->input->post('email_diretor');
            $telefone       = $this->input->post('telefone_diretor');
            $estado         = $this->input->post('estado');
            $cidade         = $this->input->post('cidade');

            $data = ['departamento_iddepartamento' => $departamento,
                    'nome_diretor'          => $diretor,
                    'login_diretor'         => $login,
                    'senha_diretor'         => $senha,
                    'cep'                   => $cep,
                    'rua'                   => $rua,
                    'bairro'                => $bairro,
                    'numero'                => $numero,
                    'email_diretor'         => $email,
                    'telefone_diretor'      => $telefone,
                    'estado'                => $estado,
                    'cidade'                => $cidade,
                    ];
            $this->db->where('iddiretor', $id);
            $this->db->update('diretor', $data);
            redirect('diretor');
            exit;
    }
    }
}
    ?>
