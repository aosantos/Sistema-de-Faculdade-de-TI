<?php
class Cursosx extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function list_cursos() {
        $this->db->select();
        $this->db->from('cursos');
        $this->db->order_by("idcursos", "DESC");
        return $this->db->get()->result_array();
    }
     function nomecurso() {
        $this->db->select();
        $this->db->from('cursos');
        $this->db->order_by("nome_curso", "Asc");
        $consulta = $this->db->get();
        return $consulta;
    }
     function removeCurso($cursos) {
        $this->db->where('idcursos', $cursos);
        $this->db->delete('cursos');
    }
}
?>