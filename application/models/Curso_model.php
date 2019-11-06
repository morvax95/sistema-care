<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Curso_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function get_curso_by_id($id)
    {
        return $this->db->get_where('curso', array('id' => $id))->row();
    }

    // Obtener datos de todos los cursos
    public function listar_curso($params = array())
    {
        if (!empty($this->input->post('draw'))) {

            $this->db->start_cache();
            $this->db->select('date(c.fechainicio) as fechai,date(c.fechaFin) as fechaf,c.nombre,c.descripcion,c.estado,c.id')
                ->from('curso c')
                ->where('c.id > 0');
            $this->db->stop_cache();

            // Obtener la cantidad de registros NO filtrados.
            // Query builder se mantiene ya que se tiene almacenada la estructura de la consulta en memoria
            $records_total = count($this->db->get()->result_array());

            // Concatenar parametros enviados (solo si existen)
            if (array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit']);
                $this->db->offset($params['start']);
            }

            if (array_key_exists('column', $params) && array_key_exists('order', $params)) {
                $this->db->order_by("c.{$params['column']}", $params['order']);
            } else {
                $this->db->order_by('c.id', 'ASC');
            }

            if (array_key_exists('search', $params) && !empty($params['search'])) {
                $this->db->like('c.descripcion', $params['search']);
                $this->db->or_like('lower(c.nombre)', $params['search']);
            }

            // Obtencion de resultados finales
            $draw = $this->input->post('draw');
            $data = $this->db->get()->result_array();

            $json_data = array(
                'draw' => intval($draw),
                'recordsTotal' => $records_total,
                'recordsFiltered' => $records_total,
                'data' => $data,
            );
            return $json_data;
        } else {
            return $this->db->get_where('curso', array('estado' => get_state('ACTIVO')))->result();
        }
    }


    public function registrar_curso()
    {
        $response = array(
            'success' => FALSE,
            'messages' => array()
        );

        /* VALIDACION DEL LOS CAMPOS DEL FORMULARIO */
        $this->form_validation->set_rules('nombre_curso', 'nombre', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if ($this->form_validation->run() === true) {
            /** OBTENERMOS VALORES DE LOS INPUT **/
            $obj_persona['nombre'] = mb_strtoupper($this->input->post('nombre_curso'), "UTF-8");
            $obj_persona['descripcion'] = mb_strtoupper($this->input->post('descripcion_curso'), "UTF-8");
            $obj_persona['fechaInicio'] = mb_strtoupper($this->input->post('fecha_inicio'), "UTF-8");
            $obj_persona['fechaFin'] = $this->input->post('fecha_fin');
            $obj_persona['estado'] = get_state('ACTIVO');
            $obj_persona['fechaRegistro'] = date('Y-m-d H:i:s');
            /*  $obj_persona['usuario_id'] = get_user_id_in_session();
              $user_data = $this->session->userdata('usuario_sesion');//obtenemos el id del usuario
              $obj_persona['sucursal_id'] = $user_data['id_sucursal'];*/

            // Inicio de transacción
            $this->db->trans_begin();
            $this->db->insert('curso', $obj_persona);
            $last_customer_id = $this->db->insert_id();
            $last_customer_id = $this->db->insert_id();
            /*-------------------------------------------------------------------------*/
            // Registramos las profesiones seleccionadas
            $id_usuario = $this->db->insert_id();
            $lista_nivel = $this->input->post('seleccion_Nivel');

            foreach ($lista_nivel as $row) {
                $response['success'] = $this->db->insert('CursoContenido', array('CursoId' => $id_usuario, 'ContenidoId' => $row));
            }
            /*-------------------------------------------------------------------------*/


            // Obtener resultado de transacción
            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                $response['success'] = TRUE;
                $response['customer'] = $this->get_curso_by_id($last_customer_id);
            } else {
                $this->db->trans_rollback();
                $response['success'] = FALSE;
            }

        } else {
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }
        return json_encode($response);
    }


    public function modificar_curso()
    {
        $response = array(
            'success' => FALSE,
            'messages' => array()
        );
        $id_cliente = $this->input->post('id_cliente');
        /* VALIDACION DEL LOS CAMPOS DEL FORMULARIO */
        $this->form_validation->set_rules('nombre_curso', 'nombre', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if ($this->form_validation->run() === true) {
            /** OBTENERMOS VALORES DE LOS INPUT **/

            $obj_persona['nombre'] = mb_strtoupper($this->input->post('nombre_curso'), "UTF-8");
            $obj_persona['descripcion'] = mb_strtoupper($this->input->post('descripcion_curso'), "UTF-8");
            $obj_persona['fechaInicio'] = mb_strtoupper($this->input->post('fecha_inicio'), "UTF-8");
            $obj_persona['fechaFin'] = $this->input->post('fecha_fin');
            $obj_persona['estado'] = get_state('ACTIVO');
            $obj_persona['fechaModificacion'] = date('Y-m-d H:i:s');

            $this->db->where('id', $id_cliente);
            $response['success'] = $this->db->update('curso', $obj_persona);


        } else {
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }
        return json_encode($response);
    }

    // Cambia el estado del registro
    public function eliminar($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('curso', array('estado' => get_state('INACTIVO')));
    }

    public function habilitar($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('curso', array('estado' => get_state('ACTIVO')));
    }


}