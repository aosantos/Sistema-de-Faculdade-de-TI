<?php

class Professorx extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_professor() {
        $this->db->select('professor.bairro,professor.rua,professor.bairro,professor.numero,professor.cep,
         professor.estado,professor.cidade,professor.nome_professor,professor.login_professor,professor.senha_professor,
         ,departamento.nome_departamento,idprofessor,diretor_iddiretor,telefone_professor,email_professor');
        $this->db->from('professor');
        $this->db->join('diretor', 'diretor.iddiretor = professor.diretor_iddiretor');
        $this->db->join('departamento', 'departamento.iddepartamento = diretor.departamento_iddepartamento');
        $this->db->order_by("idprofessor", "DESC");
        return $this->db->get()->result_array();
    }
     function diretor() {
        $this->db->select();
        $this->db->from('diretor');
        $this->db->join('departamento','departamento.iddepartamento = diretor.departamento_iddepartamento ');
        $this->db->order_by("nome_diretor", "Asc");
        $consulta = $this->db->get();
        return $consulta;
    }
     function removeProfessor($professor) {
        $this->db->where('idprofessor', $professor);
        $this->db->delete('professor');
    }
     

}

?>