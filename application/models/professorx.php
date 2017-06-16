<?php

class Professorx extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_professor() {
        $this->db->select('professor.bairro,professor.rua,professor.bairro,professor.numero,professor.cep,
         professor.estado,professor.cidade,professor.nome_professor,professor.login_professor,professor.senha_professor,
         ,departamento.nome_departamento,idprofessor,diretor_iddiretor,telefone_professor,email_professor,
         diretor.nome_diretor,diretor.telefone_diretor,diretor.email_diretor');
        $this->db->from('professor');
        $this->db->join('diretor', 'diretor.iddiretor = professor.diretor_iddiretor');
        $this->db->join('departamento', 'departamento.iddepartamento = diretor.departamento_iddepartamento');
        $this->db->order_by("idprofessor", "DESC");
        return $this->db->get()->result_array();
    }
   
    function meudiretor(){
        $idprofessor = $this->session->userdata('idprofessor');
        $this->db->select();
        $this->db->from('professor');
        $this->db->join('diretor', 'diretor.iddiretor = professor.diretor_iddiretor');
        $this->db->join('departamento', 'departamento.iddepartamento = diretor.departamento_iddepartamento');
        $this->db->where('idprofessor',$idprofessor);
        $this->db->order_by("idprofessor", "DESC");
        return $this->db->get()->result_array();
    }
     function diretor() {
        $this->db->select();
        $this->db->from('diretor');
        $this->db->join('departamento','departamento.iddepartamento = diretor.departamento_iddepartamento ');
        $this->db->order_by("nome_diretor", "Asc");
        return $this->db->get()->result_array();
        
    }
     function removeProfessor($professor) {
        $this->db->where('idprofessor', $professor);
        $this->db->delete('professor');
    }
      function contar_professor(){
        return $this->db->count_all_results('professor');
    }
     
    function meusalunos(){
        
        $idprofessor = $this->session->userdata('idprofessor');
        $this->db->select();
        $this->db->from('disciplinas');
        $this->db->join('professor', 'professor.idprofessor = disciplinas.idprofessor','INNER');
        $this->db->join('cursos_detalhes', 'disciplinas.cursos_detalhes_idcursos_detalhes = cursos_detalhes.idcursos_detalhes','INNER');
        $this->db->join('cursos', 'cursos_detalhes.cursos_idcursos = cursos.idcursos','INNER');
        $this->db->join('aluno', 'cursos_detalhes.aluno_idaluno= aluno.idaluno','INNER');
        $this->db->join('departamento', 'departamento.iddepartamento= cursos_detalhes.iddepartamento','INNER');
        $this->db->where('ativo',1);
        $this->db->where('disciplinas`.`idprofessor',$idprofessor);
        
        $this->db->order_by("iddisciplinas", "DESC");
        
        return $this->db->get()->result_array();
        
    }
   
}

?>