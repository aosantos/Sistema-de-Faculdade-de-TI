<?php

class Professor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->load->model('professorx');
        $data['professor']      = $this->professorx->list_professor();
        
        $nome_departamento      = $this->professorx->diretor();
        $nome_departamento2     = $this->professorx->diretor();
        $option = "<option value=''></option>";
        foreach ($nome_departamento->result() as $linha) {
            $option .= "<option value='$linha->iddiretor'>($linha->nome_diretor)  $linha->nome_departamento</option>";
        }
        $data['nome_departamento'] = $option;
        
        $option2 = "<option value=''></option>";
        foreach ($nome_departamento2->result() as $linha) {
            $option2 .= "<option value='$linha->iddiretor'>($linha->nome_diretor)  $linha->nome_departamento</option>";
        }
        $data['nome_departamento2'] = $option2;
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

}

?>