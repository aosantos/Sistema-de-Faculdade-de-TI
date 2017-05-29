<?php

class Perfilx extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getPerfil($id) {

        $this->db->select('imagem');
        $this->db->from('diretor');
        $this->db->where('iddiretor', $id);
        $this->db->limit(1);

        return $this->db->get()->result_array();
    }

    function getPerfilOperador($id) {

        $this->db->select('imagem');
        $this->db->from('operador');
        $this->db->where('idoperador', $id);
        $this->db->limit(1);

        return $this->db->get()->result_array();
    }
     function getPerfilProfessor($id) {

        $this->db->select('imagem');
        $this->db->from('professor');
        $this->db->where('idprofessor', $id);
        $this->db->limit(1);

        return $this->db->get()->result_array();
    }


}

?>