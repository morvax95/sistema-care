<?php


class PersonaCurso_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

    }

    // Metodo para registrar un nuevo ingreso en persona Curso
    public function registrar()
    {
        $response = array(
            'success' => FALSE,
            'messages' => array()
        );
        /* VALIDACION DEL LOS CAMPOS DEL FORMULARIO */
        $this->form_validation->set_rules('turno_id', 'turno de la solicitud', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if ($this->form_validation->run() === true) {
       $obj_pago['curso_id'] = $this->input->post('curso_id');
        $obj_pago['forma_pago'] = $this->input->post('forma_pago');
        $obj_pago['banco'] = "";
        $obj_pago['nro_cuenta'] ="";
        $obj_pago['fecha_pago'] =date('Y-m-d H:i:s');
        $obj_pago['fecha_registro'] =date('Y-m-d H:i:s');
        $obj_pago['monto'] = $this->input->post('total_as');
        $obj_pago['saldo'] = 0;
        $obj_pago['estado'] = "Debe";//get_state('ACTIVO');
       
        $this->db->insert('pago', $obj_pago);


            $curso_id = $this->input->post('curso_id');
            $turno_id = $this->input->post('turno_id');
            $aula_id = $this->input->post('aula_id');
            $docente_id = $this->input->post('idCliente');
            $nota = $this->input->post('nota');
            $fechaInicio = $this->input->post('fecha_inicio');
            $fechaFin = $this->input->post('fecha_fin');
            $subtotal = $this->input->post('sub_total');
            $descuento = $this->input->post('descuento');
            $total = $this->input->post('total_as');
            $cantidad_hora = $this->input->post('cantidad_hora');

            // Registramos el detalle de los estudiantes ingresado a un curso
            $data['estudiante_id'] = $this->input->post('id_producto[]');
            $data['contador'] = $this->input->post('contador');


            $this->registrar_persona_curso($data, $curso_id, $turno_id, $aula_id, $nota, $docente_id, $fechaInicio, $fechaFin, $subtotal, $descuento, $total, $cantidad_hora);
            // Fin de la transaccion
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $response['success'] = false;
            } else {
                $this->db->trans_commit();
                $response['success'] = TRUE;
            }
        } else {
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }

        return json_encode($response);
    }

    //registrar los detalles de un ingreso de un curso
    public
    function registrar_persona_curso($data, $curso_id, $turno_id, $aula_id, $nota, $docente_id, $fechaInicio, $fechaFin, $subtotal, $descuento, $total, $cantidad_hora)
    {
        $this->db->trans_start();

        for ($index = 0; $index < $data['contador']; $index++) {
            $data_curso['Cursoid'] = $curso_id;
            $data_curso['turno_id'] = $turno_id;
            $data_curso['aula_id'] = $aula_id;
            $data_curso['DocenteId'] = $docente_id;
            $data_curso['nota'] = $nota;
            $data_curso['Personaid'] = $data['estudiante_id'][$index];
            $data_curso['estado'] = 1;
            $data_curso['fechaRegistro'] = date('Y-m-d H:i:s');
            $data_curso['fechaInicio'] = $fechaInicio;
            $data_curso['fechaFin'] = $fechaFin;
            $data_curso['Subtotal'] = $subtotal;
            $data_curso['Descuento'] = $descuento;
            $data_curso['Total'] = $total;
            $data_curso['CantidadHora'] = $cantidad_hora;
            $data_curso['usuario_id'] = get_user_id_in_session();
            $this->db->insert('PersonaCurso', $data_curso);

        }

    }


    public function get_all_curso()
    {
        return $this->db->get('curso')->result();
    }

    public function get_all_turno()
    {
        return $this->db->get('turno')->result();
    }

    public function get_all_aula()
    {
        return $this->db->get('aula')->result();
    }




}