<?php

class PersonaCurso extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PersonaCurso_model', 'PersonaCurso');
        $this->load->library("unit_test");
    }

    public function index()
    {
        $data["fecha_actual"] = date("Y-m-d");
        $data['curso'] = $this->PersonaCurso->get_all_curso();
        $data['turno'] = $this->PersonaCurso->get_all_turno();
        $data['aula'] = $this->PersonaCurso->get_all_aula();
        plantilla('PersonaCurso/nuevo', $data);


        // Recibimos los parametros del formulario
        /* $Codigo_producto = $this->input->post('estudiante_id');
           $this->load->library("unit_test");
           $nombre = " TEST CASE";
           $datos['verificacion_tipo_datos_enviados_I'] = $this->unit->run($this->verificacion_tipo_datos_enviados(), 'is_string', $Codigo_producto, 'Nota  test case');
           $datos['titulo'] = 'Library Unit Test';
           $datos['contenido'] = 'pruebas';
           echo $this->unit->run($datos);*/
        //fin
    }

    public function prueba_unit()
    {
        $cantidad_horas = $this->input->post('rol_persona');
        echo "PRUEBAS UNITARIAS";
        $test = $this->verificador($cantidad_horas);
        $expected_result = 0;
        $test_name = "Prueba test function";
        echo $this->unit->run($test, $expected_result, $test_name);
    }


    private function verificador($a)
    {
        return $a;
    }


    public function verificacion_tipo_datos_enviados()
    {
        return "nombre";
    }

    public function nuevo()
    {
        $data['curso'] = $this->PersonaCurso->get_all_curso();
        $data['turno'] = $this->PersonaCurso->get_all_turno();
        $data['aula'] = $this->PersonaCurso->get_all_aula();
        plantilla('PersonaCurso/nuevo', $data);
    }

    public function registrar()
    {
        if ($this->input->is_ajax_request()) {
            echo $this->PersonaCurso->registrar();
        } else {
            show_404();
        }
    }

    public function agregar()
    {
        if ($this->input->is_ajax_request()) {
            // Recibimos los parametros del formulario
            $contador = $this->input->post('contador');
            $id_producto = $this->input->post('estudiante_id');
            $descripcion = $this->input->post('nombre_estudiante');
            $cantidad = $this->input->post('carnet_estudiante');
            //  $id_docente = $this->input->post('idCliente');
            // Creamos las filas del detalle
            $fila = '<tr>';
            $fila .= '<td><input type="text" value="' . $id_producto . '" id="id_producto" name="id_producto[]" hidden/><input type="text" value="' . $descripcion . '" id="descripcion" name="descripcion[]" hidden/>' . $descripcion . '</td>';
            $fila .= '<td><input type="text" value="' . $cantidad . '" id="cantidad' . $contador . '" name="cantidad[]" hidden/>' . $cantidad . '</td>';
            $fila .= '<td class="text-center"><a class="eliminar"><i class="fa fa-trash-o" /></a></td></tr>';

            $datos = array(
                0 => $fila,
                1 => $contador
            );

            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    /*OBTENER ESTUDIANTES*/
    public function get_estudiantes()
    {
        $dato = $this->input->post_get('name_startsWith');
        $tipo = $this->input->post_get('type');
        if ($tipo === 'codigo') {
            $this->db->like('ci', $dato);
            $this->db->where('id >0');
            $this->db->distinct();
            $res = $this->db->get('PersonaEstudiante ');
            if ($res->num_rows() > 0) {
                foreach ($res->result_array() as $row) {
                    //   $data[$row['id'] . '|' . $row['nombre']] = $row['nombre'] . '/' . $row['id'];
                    $data[$row['nombre'] . '|' . $row['ci'] . '|' . $row['id']] = $row['id'] . '/' . $row['id'] . $row['ci'];
                }
                echo json_encode($data); //format the array into json data
            } else {
                $data["No existe este ci"] = "No existe este ci";
                echo json_encode($data);
            }
        } else {
            $this->db->like('lower(nombre)', strtolower($dato));
            $this->db->where('id >0');
            $res = $this->db->get('PersonaEstudiante ');
            if ($res->num_rows() > 0) {
                foreach ($res->result_array() as $row) {
                    $data[$row['nombre'] . '|' . $row['ci'] . '|' . $row['id']] = $row['id'] . '/' . $row['id'] . $row['ci'];
                }
                echo json_encode($data); //format the array into json data
            } else {
                $data["No existe este nombre del estudiante"] = "No existe este nombre del estudiante";
                echo json_encode($data);
            }
        }

    }

    //obtener  la busqueda de solo personas-docente
    public function get_docente()
    {
        $dato = $this->input->post_get('name_startsWith');
        $tipo = $this->input->post_get('type');
        if ($tipo === 'ci') {
            $this->db->like('ci', $dato);
            $this->db->where('id >0');
            $this->db->where('rol_id=2');
            $this->db->distinct();
            $res = $this->db->get('persona');
            if ($res->num_rows() > 0) {
                foreach ($res->result_array() as $row) {
                    $data[$row['ci'] . '|' . $row['nombre']] = $row['nombre'] . '/' . $row['id'];
                }
                echo json_encode($data); //format the array into json data
            } else {
                $data["No existe este CI"] = "No existe este CI";
                echo json_encode($data);
            }
        } else {
            $this->db->like('lower(nombre)', strtolower($dato));
            $this->db->where('id >0');
            $this->db->where('rol_id=2');
            $res = $this->db->get('persona');
            if ($res->num_rows() > 0) {
                foreach ($res->result_array() as $row) {
                    $data[$row['nombre'] . '|' . $row['ci']] = $row['ci'] . '/' . $row['id'];
                }
                echo json_encode($data); //format the array into json data
            } else {
                $data["No existe este nombre del docente"] = "No existe este nombre del docente";
                echo json_encode($data);
            }
        }

    }


}