<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('login/perfil');
    }

    public function logar_diretor() {
        $this->load->model("loginx"); // chama o modelo login
        $this->load->model("perfilx"); // chama o modelo perfilx

        $login_diretor = $this->input->post("login_diretor"); // pega via post o login 
        $senha = $this->input->post("senha_diretor"); // pega via post a senha
        $usuario = $this->loginx->buscaPorLoginSenha($login_diretor, $senha); // acessa a função buscaPorLoginSenha do modelo

        if ($usuario) {

            $this->session->set_userdata($usuario);
            $idSessao = $this->session->userdata('session_id');
            $this->session->set_userdata(array('id_sessao' => $idSessao));
            $fotoUsuario = $this->perfilx->getPerfil($usuario['iddiretor']);
            $this->session->set_userdata(array('fotoUsuario' => $fotoUsuario[0]['imagem']));

            $this->load->view('usuario/diretor', $usuario);
        } else {
            $errologin = $this->session->set_flashdata('errologin', "Login ou Senha Inválidos!");
            redirect('/', base_url($errologin));
        }
    }

    public function logar_operador() {
        $this->load->model("loginx");
        $this->load->model("perfilx");
        $this->load->model("alunox");
        $this->load->model("cursosx");

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
        $this->load->model("loginx");
        $this->load->model("perfilx");
        //$this->load->model("alunox");
        //$this->load->model("cursosx");

        $login_professor    = $this->input->post("login_professor");
        $senha              = $this->input->post("senha_professor");
        $usuario            = $this->loginx->LoginProfessor($login_professor, $senha);
        
        if ($usuario) {
            $this->session->set_userdata($usuario);
            $idSessao       = $this->session->userdata('session_id');
            $this->session->set_userdata(array('id_sessao' => $idSessao));
            $fotoUsuario    = $this->perfilx->getPerfilProfessor($usuario['idprofessor']);
            $this->session->set_userdata(array('fotoUsuario' => $fotoUsuario[0]['imagem']));
            //$usuario['aluno'] = $this->alunox->list_alunosParaOperador();
            
            //$this->load->model('alunox');
            //$this->load->model('cursosx');
            //$data['aluno'] = $this->alunox->list_alunosParaProfessor();
            
            //$data['cursos_detalhes'] = $this->alunox->cursos_detalhes();

            /*$nome_curso = $this->cursosx->nomecurso();
            $option = "<option value=''></option>";
            foreach ($nome_curso->result() as $linha) {
                $option .= "<option value='$linha->idcursos'>$linha->nome_curso</option>";
            }
            $data['nome_curso'] = $option;*/


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