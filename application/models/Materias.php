<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materias extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_materias(){
        $query = $this->db->query("select * from materias");

        return $query->result();
    }

    public function crear_materia($clave, $nombre){
        
        return $query = $this->db->query("insert into materias value('".$clave."','".$nombre."')");
    }
}
?>