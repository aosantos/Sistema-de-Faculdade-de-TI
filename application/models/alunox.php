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
        $this->db->limit('1');
        
        $this->db->order_by("idaluno", "DESC");
        return $this->db->get()->result_array();
    }
    function cursos_detalhes() {
        $this->db->select();
        $this->db->from('cursos_detalhes');
        
        return $this->db->get()->result_array();
    }
    
     
}
?>