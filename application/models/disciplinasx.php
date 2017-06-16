<?php
class Disciplinasx extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function list_disciplinas() {
        $this->db->select();
        $this->db->from('disciplinas_nome');
        $this->db->join('cursos', 'disciplinas_nome.idcursos = cursos.idcursos','INNER');
        $this->db->order_by("iddisciplinas_nome", "DESC");
        return $this->db->get()->result_array();
    }
     
}
?>