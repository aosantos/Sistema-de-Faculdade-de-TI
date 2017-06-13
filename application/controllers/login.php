<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('loginx', 'login');
        $this->load->model('diretorx');
        $this->load->model('cursosx');
        $this->load->model('professorx');
        $this->load->model('alunox');
        $this->load->model('operadorx');
        $this->load->model("perfilx");
        $this->load->model('loginx');
        }

    public function index() {
        $this->load->view('login/perfil');
    }

    public function logar_diretor() {
        $login_diretor = $this->input->post("login_diretor"); // pega via post o login 
        $senha = $this->input->post("senha_diretor"); // pega via post a senha
        $usuario = $this->loginx->buscaPorLoginSenha($login_diretor, $senha); // acessa a função buscaPorLoginSenha do modelo

        if ($usuario) {

            $this->session->set_userdata($usuario);
            $idSessao = $this->session->userdata('session_id');
            $this->session->set_userdata(array('id_sessao' => $idSessao));
            $fotoUsuario = $this->perfilx->getPerfil($usuario['iddiretor']);
            $this->session->set_userdata(array('fotoUsuario' => $fotoUsuario[0]['imagem']));
            
            $usuario['contar_diretor']       =  $this->diretorx->contar_diretor();
            $usuario['contar_departamento']  =  $this->diretorx->contar_departamento();
            $usuario['contar_cursos']        =  $this->cursosx->contar_cursos();
            $usuario['contar_professor']     =  $this->professorx->contar_professor();
            $usuario['contar_aluno']         =  $this->alunox->contar_aluno();
            $usuario['contar_operador']      =  $this->operadorx->contar_operador();

            $this->load->view('usuario/diretor', $usuario);
        } else {
            $errologin = $this->session->set_flashdata('errologin', "Login ou Senha Inválidos!");
            redirect('/', base_url($errologin));
        }
    }

    public function logar_operador() {
        $login_operador         = $this->input->post("login_operador");
        $senha                  = $this->input->post("senha_operador");
        $usuario                = $this->loginx->LoginOperador($login_operador, $senha);
        if ($usuario) {
            $this->session->set_userdata($usuario);
            $idSessao           = $this->session->userdata('session_id');
            $this->session->set_userdata(array('id_sessao' => $idSessao));
            $fotoUsuario        = $this->perfilx->getPerfilOperador($usuario['idoperador']);
            $this->session->set_userdata(array('fotoUsuario' => $fotoUsuario[0]['imagem']));
            $usuario['aluno']   = $this->alunox->list_alunosParaOperador();
            
            $this->load->model('alunox');
            $this->load->model('cursosx');
            $data['aluno']      = $this->alunox->list_alunosParaOperador();
            $data['cursos_detalhes'] = $this->alunox->cursos_detalhes();

            $nome_curso         = $this->cursosx->nomecurso();
            $option = "<option value=''></option>";
            foreach ($nome_curso->result() as $linha) {
                $option .= "<option value='$linha->idcursos'>$linha->nome_curso</option>";
            }
            $data['nome_curso'] = $option;


            $this->load->view('operador/aluno', $data);
        } else {
            $errologin = $this->session->set_flashdata('errologin', "Login ou Senha Inválidos!");
            redirect('/', base_url($errologin));
        }
    }

    public function logar_professor() {
        $login_professor    = $this->input->post("login_professor");
        $senha              = $this->input->post("senha_professor");
        $usuario            = $this->loginx->LoginProfessor($login_professor, $senha);
        
        if ($usuario) {
            $this->session->set_userdata($usuario);
            $idSessao                   = $this->session->userdata('session_id');
            $this->session->set_userdata(array('id_sessao' => $idSessao));
            $fotoUsuario                = $this->perfilx->getPerfilProfessor($usuario['idprofessor']);
            $this->session->set_userdata(array('fotoUsuario' => $fotoUsuario[0]['imagem']));
            $usuario['meudiretor']      =  $this->professorx->list_professor();
        
        
            $this->load->view('professor/lista',$usuario);
        } else {
            $errologin      = $this->session->set_flashdata('errologin', "Login ou Senha Inválidos!");
            redirect('/', base_url($errologin));
        }
    }

    public function logout() {

        $sess_array = array(
            'login' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        session_destroy();
        redirect(base_url());
    }

}

?>