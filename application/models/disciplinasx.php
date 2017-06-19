<?php
class Disciplinasx extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function list_disciplinas() {
        $this->db->select();
        $this->db->from('disciplinas_nome');
        $this->db->join('cursos', 'disciplinas_nome.idcursos = cursos.idcursos','INNER');
        $this->db->order_by("semestre", "ASC");
        return $this->db->get()->result_array();
    }
     function contar_disciplinas(){
        return $this->db->count_all_results('disciplinas_nome');
    }
      function removeDisciplinas($disciplinas) {
        $this->db->where('iddisciplinas_nome', $disciplinas);
        $this->db->delete('disciplinas_nome');
    }
}
?>