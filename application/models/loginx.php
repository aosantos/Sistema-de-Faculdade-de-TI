<?php
class Loginx extends CI_Model {

    function validate() 
    {

        $this->db->where('login_diretor', $this->input->post('login_diretor')); 
        $this->db->where('senha_diretor', md5($this->input->post('senha_diretor')));
       
        $query = $this->db->get('diretor');
        
        if ($query->num_rows == 1) { 
            return true; // RETORNA VERDADEIRO
        }

    }
     public function buscaPorLoginSenha($login, $senha){
        $this->db->where("login_diretor", $login);
        $this->db->where("senha_diretor", $senha);
        $usuario = $this->db->get("diretor")->row_array();
        return $usuario;
    }
    public function LoginOperador($login, $senha){
        $this->db->where("login_operador", $login);
        $this->db->where("senha_operador", $senha);
        $usuario = $this->db->get("operador")->row_array();
        return $usuario;
    }
    public function departamento_diretor(){
        $id = $this->session->userdata('iddiretor');
        $this->db->select('iddiretor,departamento_iddepartamento,nome_diretor,login_diretor,imagem');
        $this->db->from('diretor');
        $this->db->join(' departamento','departamento.iddepartamento = diretor.departamento_iddepartamento','inner');
        $this->db->where("iddiretor",$id);
        $this->db->order_by("iddiretor");
        //echo $this->db->last_query();
         return $this->db->get()->result_array();
       
    }

    function logged() 
    {

        $logged = $this->session->userdata('logado');

        if (!isset($logged) || $logged != true) {
            redirect('/');
        }

    }
    
}

?>