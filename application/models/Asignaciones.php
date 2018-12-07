<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asignaciones extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function get_alumnos_materias(){
        $query = $this->db->query("SELECT alumnos.nombre as NOMBREA, alumnos.matricula as MATRICULAA, materias.clave_materia as CLAVEM,materias.nombre as NOMBREM FROM alumnos 
            INNER JOIN asignaciones ON alumnos.matricula = asignaciones.matricula 
            INNER JOIN materias ON asignaciones.clave_materia = materias.clave_materia
            ORDER BY alumnos.fecha"
        );

        return $query->result();
    }

    public function crear_asignacion($matricula, $clave){
        
        return $query = $this->db->query("insert into asignaciones value('".$matricula."','".$clave."')");
    }

    public function eliminar_asignacion($mat, $clave){
        return $query = $this->db->query("delete from asignaciones where matricula = '".$mat."' and clave_materia = ".$clave);

    }
}
?>