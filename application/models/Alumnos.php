<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumnos extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_alumnos(){
        $query = $this->db->query("select * from alumnos");

        return $query->result();
    }

    public function crear_alumno($matricula, $nombre){
        
        return $query = $this->db->query("insert into alumnos value('".$matricula."','".$nombre."')");
    }
}
?>