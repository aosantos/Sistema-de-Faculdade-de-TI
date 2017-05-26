<?php

class Operador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loginx', 'login');
        $this->load->helper('html');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->load->model('operadorx');
        $data['operador'] = $this->operadorx->list_operador();
        $this->load->view('operador/index', $data);
    }

    public function add_operador() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_operador', 'Nome do Operador', 'required');
        $this->form_validation->set_rules('setor_operador', 'Setor do Operador', 'required');
        $this->form_validation->set_rules('login_operador', 'login do Operador', 'required');
        $this->form_validation->set_rules('senha_operador', 'Senha do Operador', 'required');
        $this->form_validation->set_rules('telefone_operador', 'Telefone do Operador', 'required');
        $this->form_validation->set_rules('email_operador', 'Email do Operador', 'required');

        $iddiretor = $this->session->userdata('iddiretor');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nome = $this->input->post('nome_operador');
            $setor = $this->input->post('setor_operador');
            $login = $this->input->post('login_operador');
            $senha = $this->input->post('senha_operador');
            $telefone = $this->input->post('telefone_operador');
            $email = $this->input->post('email_operador');
            $data = [
                'diretor_iddiretor' => $iddiretor,
                'nome_operador'     => $nome,
                'setor_operador'    => $setor,
                'login_operador'    => $login,
                'senha_operador'    => $senha,
                'telefone_operador' => $telefone,
                'email_operador'    => $email
            ];

            $this->db->insert('operador', $data);
            redirect('operador');
            exit;
        }
    }
    public function editar_operador() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_operador', 'Nome do Operador', 'required');
        $this->form_validation->set_rules('setor_operador', 'Setor do Operador', 'required');
        $this->form_validation->set_rules('login_operador', 'login do Operador', 'required');
        $this->form_validation->set_rules('senha_operador', 'Senha do Operador', 'required');
        $this->form_validation->set_rules('telefone_operador', 'Telefone do Operador', 'required');
        $this->form_validation->set_rules('email_operador', 'Email do Operador', 'required');
        
        $iddiretor = $this->session->userdata('iddiretor');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id    = $this->input->post('idoperador');
            $nome  = $this->input->post('nome_operador');
            $setor = $this->input->post('setor_operador');
            $login = $this->input->post('login_operador');
            $senha = $this->input->post('senha_operador');
            $telefone = $this->input->post('telefone_operador');
            $email = $this->input->post('email_operador');
            $data = [
                'diretor_iddiretor' => $iddiretor,
                'nome_operador'     => $nome,
                'setor_operador'    => $setor,
                'login_operador'    => $login,
                'senha_operador'    => $senha,
                'telefone_operador' => $telefone,
                'email_operador'    => $email
            ];
            $this->db->where('idoperador',$id);
            $this->db->update('operador', $data);
            redirect('operador');
            exit;
        }
    }
     public function removeOperador($id) {
        if ($_POST) {
            $operador = $_POST['id'];
            $this->load->model('operadorx');
            $this->operadorx->removeOperador($operador);
        }
    }
 public function add_aluno() {
        /*$this->load->library('form_validation');
        //$this->form_validation->set_rules('departamento_iddepartamento', 'Nome do Departamento', 'required');
        $this->form_validation->set_rules('nome_aluno', 'Nome do Aluno', 'required');
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('rg', 'Senha', 'required');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required');
        $this->form_validation->set_rules('estado_civil', 'Estado Civil', 'required');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('numero', 'Número', 'required');
        $this->form_validation->set_rules('email_aluno', 'Email', 'required');
        $this->form_validation->set_rules('telefone_aluno', 'Telefone', 'required');
        $this->form_validation->set_rules('semestre', 'Semestre', 'required');
        */

        //if ($this->form_validation->run() == FALSE) {
          //  $this->index();
        //} else {
            $id                 = $this->input->post('idaluno');
            $idoperador         = $this->session->userdata('idoperador');
            $curso              = $this->input->post('curso');
            $nome               = $this->input->post('nome_aluno');
            $cpf                = $this->input->post('cpf');
            $rg                 = $this->input->post('rg');
            $sexo               = $this->input->post('sexo');
            $estadocivil        = $this->input->post('estado_civil');
            $cep                = $this->input->post('cep');
            $rua                = $this->input->post('rua');            
            $bairro             = $this->input->post('bairro');
            $cidade             = $this->input->post('cidade');
            $estado             = $this->input->post('estado');
            $numero             = $this->input->post('numero');
            $email              = $this->input->post('email_aluno');
            $telefone           = $this->input->post('telefone_aluno');
            $semestre           = $this->input->post('semestre');
            
            $data = [
                'operador_idoperador'   => $idoperador,
                'nome_aluno'            => $nome,
                'cpf'                   => $cpf,
                'rg'                    => $rg,
                'sexo'                  => $sexo,
                'estado_civil'          => $estadocivil,
                'cep'                   => $cep,
                'rua'                   => $rua,
                'bairro'                => $bairro,
                'cidade'                => $cidade,
                'estado'                => $estado,
                'numero'                => $numero,
                'email_aluno'           => $email,
                'telefone_aluno'        => $telefone,
            ];
            $cursos_detalhes = [
                'cursos_idcursos'                => $curso,
                'aluno_idaluno'                  => $id,
                'semestre'                       => $semestre,                
                'professor_idprofessor'          => 0,
                
            ];
            $this->db->insert('aluno', $data);
            $this->db->insert('cursos_detalhes', $cursos_detalhes);
            
            redirect('operador_aluno');
            exit;
        }
    //}
    
 public function editar_aluno() {
        /*$this->load->library('form_validation');
        $this->form_validation->set_rules('departamento_iddepartamento', 'Nome do Departamento', 'required');
        $this->form_validation->set_rules('nome_aluno', 'Nome do Aluno', 'required');
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('rg', 'Senha', 'required');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required');
        $this->form_validation->set_rules('estado_civil', 'Estado Civil', 'required');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('numero', 'Número', 'required');
        $this->form_validation->set_rules('email_aluno', 'Email', 'required');
        $this->form_validation->set_rules('telefone_aluno', 'Telefone', 'required');*/

        //if ($this->form_validation->run() == FALSE) {
          //  $this->index();
        //} else {
            $id                  = $this->input->post('idaluno');
            $idoperador         = $this->session->userdata('idoperador');
            //$departamento     = $this->input->post('departamento_iddepartamento');
            $nome               = $this->input->post('nome_aluno');
            $cpf                = $this->input->post('cpf');
            $rg                 = $this->input->post('rg');
            $sexo               = $this->input->post('sexo');
            $estadocivil        = $this->input->post('estado_civil');
            $cep                = $this->input->post('cep');
            $rua                = $this->input->post('rua');            
            $bairro             = $this->input->post('bairro');
            $cidade             = $this->input->post('cidade');
            $estado             = $this->input->post('estado');
            $numero             = $this->input->post('numero');
            $email              = $this->input->post('email_aluno');
            $telefone           = $this->input->post('telefone_aluno');
            $curso              = $this->input->post('curso');
            $semestre           = $this->input->post('semestre');
            
            $data = [//'departamento_iddepartamento' => $departamento,
                'idaluno'               => $id,
                'operador_idoperador'   => $idoperador,
                'nome_aluno'            => $nome,
                'cpf'                   => $cpf,
                'rg'                    => $rg,
                'sexo'                  => $sexo,
                'estado_civil'          => $estadocivil,
                'cep'                   => $cep,
                'rua'                   => $rua,
                'bairro'                => $bairro,
                'cidade'                => $cidade,
                'estado'                => $estado,
                'numero'                => $numero,
                'email_aluno'           => $email,
                'telefone_aluno'        => $telefone,
            ];
            $cursos_detalhes = [
                'cursos_idcursos'                => $curso,
                'aluno_idaluno'                  => $id,
                'semestre'                       => $semestre,                
                'professor_idprofessor'          => 0,
                
            ];
            
            $this->db->where('idaluno',$id);
            $this->db->update('aluno', $data);
            
            $this->db->where('aluno_idaluno',$id);
            $this->db->update('cursos_detalhes', $cursos_detalhes);
            
            echo $this->db->last_query();
            die();
            
            redirect('operador_aluno');
            
            exit;
        }
    //}

}

?>