<?php
class Alunox extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function list_alunosParaOperador() {
        $idoperador = $this->session->userdata('idoperador');
        $this->db->select();
        $this->db->from('aluno');
        $this->db->where('operador_idoperador',$idoperador);
        
        $this->db->order_by("idaluno", "DESC");
        return $this->db->get()->result_array();
    }
    function list_alunosParaProfessor() {
        $this->db->select();
        $this->db->from('aluno');
        $this->db->order_by("idaluno", "DESC");
        return $this->db->get()->result_array();
    }
    function list_alunosParaDiretor() {
        $this->db->select();
        $this->db->from('aluno');
        $this->db->join('cursos_detalhes', 'aluno.idaluno = cursos_detalhes.aluno_idaluno');
        $this->db->join('cursos', 'cursos.idcursos = cursos_detalhes.cursos_idcursos');
        
        $this->db->order_by("idaluno", "DESC");
        
        return $this->db->get()->result_array();
    }
    function cursos_detalhes() {
        $this->db->select();
        $this->db->from('cursos_detalhes');
        
        return $this->db->get()->result_array();
    }
    function aluno_ultimoid(){
        
        $this->db->select();
        $this->db->from('aluno');
        $this->db->order_by('idaluno','desc');
        $this->db->limit(1);
        
        return $this->db->get()->result_array();
    }
    
     
}
?>