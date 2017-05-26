<?php
class Operadorx extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function list_operador() {
        $this->db->select();
        $this->db->from('operador');
        $this->db->order_by("idoperador", "DESC");
        return $this->db->get()->result_array();
    }
   
     function removeOperador($operador) {
        $this->db->where('idoperador', $operador);
        $this->db->delete('operador');
    }
}
?>