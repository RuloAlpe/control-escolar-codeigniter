<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlescolar extends CI_Controller {

    /**
        * Get All Data from this method.
        *
        * @return Response
    */
    public function __construct() {
        parent::__construct(); 

        $this->load->model('Alumnos');
        $this->load->model('Materias');
        $this->load->model('Asignaciones');
    }


    /**
        * Create from display on this method.
        *
        * @return Response
    */
    public function index(){
        $data['alumnos'] = $this->Alumnos->get_alumnos();

        $this->load->helper('form');
		$this->load->view('header');
		$this->load->view('controlescolar/index', $data);
		$this->load->view('footer');
    }

    public function materias(){
        $data['materias'] = $this->Materias->get_materias();

        $this->load->helper('form');
		$this->load->view('header');
		$this->load->view('controlescolar/materias_view', $data);
		$this->load->view('footer');
    }

    public function alumno_materias(){
        $data['alumnos'] = $this->Alumnos->get_alumnos();
        $data['materias'] = $this->Materias->get_materias();
        $data['asignaciones'] = $this->Asignaciones->get_alumnos_materias();

        $this->load->helper('form');
		$this->load->view('header');
		$this->load->view('controlescolar/alumno_materias_view', $data);
		$this->load->view('footer');
    }

    public function registroalumno(){

        if(isset($_POST['matricula']) && !empty($_POST['matricula']) && isset($_POST['nombre']) && !empty($_POST['nombre'])){
            
            if($this->Alumnos->crear_alumno($_POST['matricula'], $_POST['nombre'])){
                $alumnos = $this->Alumnos->get_alumnos();

                $template = "";
                foreach ($alumnos as $item){    
                    $template .= "<tr>".
                        "<td>".$item->matricula."</td>".
                        "<td>".$item->nombre."</td>".
                        "<td></td>".
                    "</tr>";
                }
                    
                echo json_encode([
                    'status' => 'success',
                    'template' => $template
                ]);
            }
        }else{
            echo json_encode([
                'status' => 'error'
            ]);
        }
    }
    
    public function registromateria(){

        if(isset($_POST['clave']) && !empty($_POST['clave']) && isset($_POST['nombre']) && !empty($_POST['nombre'])){
            
            if($this->Materias->crear_materia($_POST['clave'], $_POST['nombre'])){
                $materias = $this->Materias->get_materias();

                $template = "";
                foreach ($materias as $item){    
                    $template .= "<tr>".
                        "<td>".$item->clave_materia."</td>".
                        "<td>".$item->nombre."</td>".
                        "<td></td>".
                    "</tr>";
                }
                    
                echo json_encode([
                    'status' => 'success',
                    'template' => $template
                ]);
            }
        }else{
            echo json_encode([
                'status' => 'error'
            ]);
        }
    }
    
    public function registroasignacion(){

        if(isset($_POST['alumnos']) && !empty($_POST['alumnos']) && isset($_POST['materias']) && !empty($_POST['materias'])){
            
            if($this->Asignaciones->crear_asignacion($_POST['alumnos'], $_POST['materias'])){
                $alumnos = $this->Asignaciones->get_alumnos_materias();

                $template = "";
                foreach ($alumnos as $item){    
                    $template .= "<tr>".
                        "<td>".$item->MATRICULAA."</td>".
                        "<td>".$item->NOMBREA."</td>".
                        "<td>".$item->CLAVEM."</td>".
                        "<td>".$item->NOMBREM."</td>".
                        "<td><button type='button' class='btn btn-default js-eliminar-asignacion' data-mat='".$item->MATRICULAA."' data-clave='".$item->CLAVEM."'>".
                        "<span class='glyphicon glyphicon-remove'></span>Eliminar".
                        "</button></td>".
                    "</tr>";
                }
                    
                echo json_encode([
                    'status' => 'success',
                    'template' => $template
                ]);
            }
        }else{
            echo json_encode([
                'status' => 'error'
            ]);
        }
    }

    public function eliminarasignacion(){

        if(isset($_REQUEST['mat']) && !empty($_REQUEST['mat']) && isset($_REQUEST['clave']) && !empty($_REQUEST['clave'])){
            if($this->Asignaciones->eliminar_asignacion($_REQUEST['mat'], $_REQUEST['clave'])){
                $alumnos = $this->Asignaciones->get_alumnos_materias();

                $template = "";
                foreach ($alumnos as $item){    
                    $template .= "<tr>".
                        "<td>".$item->MATRICULAA."</td>".
                        "<td>".$item->NOMBREA."</td>".
                        "<td>".$item->CLAVEM."</td>".
                        "<td>".$item->NOMBREM."</td>".
                        "<td><button type='button' class='btn btn-default js-eliminar-asignacion' data-mat='".$item->MATRICULAA."' data-clave='".$item->CLAVEM."'>".
                        "<span class='glyphicon glyphicon-remove'></span>Eliminar".
                        "</button></td>".
                    "</tr>";
                }
                    
                echo json_encode([
                    'status' => 'success',
                    'template' => $template
                ]);
            }
        }
    }
}

?>