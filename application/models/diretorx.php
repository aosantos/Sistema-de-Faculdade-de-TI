<?php
class Diretorx extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function list_diretor() {
        $this->db->select();
        $this->db->from('diretor');
        $this->db->join('departamento', 'diretor.departamento_iddepartamento = departamento.iddepartamento');
        $this->db->order_by("iddiretor", "DESC");
        return $this->db->get()->result_array();
    }
    function list_departamento() {
        $this->db->select();
        $this->db->from('departamento');
        $this->db->order_by("iddepartamento", "DESC");
        return $this->db->get()->result_array();
    }

    function removeDepartamento($departamento) {
        $this->db->where('iddepartamento', $departamento);
        $this->db->delete('departamento');
    }

    function removeDiretor($diretor) {
        $this->db->where('iddiretor', $diretor);
        $this->db->delete('diretor');
    }

    function nomedepartamento() {
        $this->db->select();
        $this->db->from('departamento');
        $this->db->order_by("nome_departamento", "Asc");
        return $this->db->get()->result_array();
        
    }
    function contar_diretor(){
      return $this->db->count_all_results('diretor');

    }
    function contar_departamento(){
        return $this->db->count_all_results('departamento');
    }
    
}
?>
