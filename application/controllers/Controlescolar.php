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
    }


    /**
        * Create from display on this method.
        *
        * @return Response
    */
    public function index()
    {
        $data['alumnos'] = $this->Alumnos->get_alumnos();

        $this->load->helper('form');
		$this->load->view('header');
		$this->load->view('controlescolar/index', $data);
		$this->load->view('footer');
    }

    public function materias()
    {
        // $data['alumnos'] = $this->Alumnos->get_alumnos();

        $this->load->helper('form');
		$this->load->view('header');
		$this->load->view('controlescolar/materias_view');
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
}

?>