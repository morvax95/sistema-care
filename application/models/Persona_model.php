<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Persona_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function get_all()
    {
        return $this->db->get('persona')->result();
    }

    public function get_all_rol()
    {
        return $this->db->get('rol')->result();
    }

    public function get_all_aula()
    {
        return $this->db->get('aula')->result();
    }


    // Obtiene los datos de una persona seleccionado por su id
    public function get_customer_by_id($id)
    {
        return $this->db->get_where('persona', array('id' => $id))->row();
    }

    // Obtener datos de todos las personas
    public function listar_clientes($params = array())
    {
        if (!empty($this->input->post('draw'))) {

            $this->db->start_cache();
            $this->db->select('*')
                ->from('vi_personas c')
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
                $this->db->like('c.ci', $params['search']);
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
            return $this->db->get_where('persona', array('estado' => get_state('ACTIVO')))->result();
        }
    }


    // Registro de persona
    public function registrar_persona()
    {
        $response = array(
            'success' => FALSE,
            'messages' => array()
        );

        /* VALIDACION DEL LOS CAMPOS DEL FORMULARIO */
        $this->form_validation->set_rules('nombre_persona', 'nombre', 'trim|required');
        $this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if ($this->form_validation->run() === true) {
            /** OBTENERMOS VALORES DE LOS INPUT **/
            $obj_persona['ci'] = $this->input->post('ci_nit');
            $obj_persona['nombre'] = mb_strtoupper($this->input->post('nombre_persona'), "UTF-8");
            $obj_persona['apellidoPaterno'] = mb_strtoupper($this->input->post('apellidoPaterno'), "UTF-8");
            $obj_persona['apellidoMaterno'] = mb_strtoupper($this->input->post('apellidoMaterno'), "UTF-8");
            $obj_persona['telefono'] = $this->input->post('telefono');
            $obj_persona['estado'] = get_state('ACTIVO');
            $obj_persona['correo'] = mb_strtoupper($this->input->post('correo'), "UTF-8");
            $obj_persona['fechaRegistro'] = date('Y-m-d H:i:s');
            $obj_persona['fechaNacimiento'] = $this->input->post('fechaNacimiento');
            $obj_persona['direccion'] = mb_strtoupper($this->input->post('direccion'), "UTF-8");
            $obj_persona['genero'] = mb_strtoupper($this->input->post('genero'), "UTF-8");
            $obj_persona['rol_id'] = $this->input->post('rol_persona');
            $obj_persona['usuario_id'] = get_user_id_in_session();
            $user_data = $this->session->userdata('usuario_sesion');//obtenemos el id del usuario
            $obj_persona['sucursal_id'] = $user_data['id_sucursal'];

            // Inicio de transacción
            $this->db->trans_begin();
            $this->db->insert('persona', $obj_persona);
            $last_customer_id = $this->db->insert_id();
            /*-------------------------------------------------------------------------*/
            // Registramos las profesiones seleccionadas
            $id_usuario = $this->db->insert_id();
            $lista_profesiones = $this->input->post('seleccion_profesion');

            foreach ($lista_profesiones as $row) {
                $response['success'] = $this->db->insert('PersonaProfesion', array('PersonaId' => $id_usuario, 'ProfesionId' => $row));
            }

            /*-------------------------------------------------------------------------*/

            // Obtener resultado de transacción
            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                $response['success'] = TRUE;
                $response['customer'] = $this->get_customer_by_id($last_customer_id);
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


    // Modificacion de persona
    public function modificar_cliente()
    {
        $response = array(
            'success' => FALSE,
            'messages' => array()
        );
        $id_cliente = $this->input->post('id_cliente');
        /* VALIDACION DEL LOS CAMPOS DEL FORMULARIO */
        $this->form_validation->set_rules('nombre_persona', 'nombre', 'trim|required');
        $this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if ($this->form_validation->run() === true) {
            /** OBTENERMOS VALORES DE LOS INPUT **/

            $obj_cliente['ci'] = $this->input->post('ci_nit');
            $obj_cliente['nombre'] = mb_strtoupper($this->input->post('nombre_persona'), "UTF-8");
            $obj_cliente['apellidoPaterno'] = mb_strtoupper($this->input->post('apellidoPaterno'), "UTF-8");
            $obj_cliente['apellidoMaterno'] = mb_strtoupper($this->input->post('apellidoMaterno'), "UTF-8");
            $obj_cliente['telefono'] = $this->input->post('telefono');
            $obj_cliente['estado'] = get_state('ACTIVO');
            $obj_cliente['correo'] = mb_strtoupper($this->input->post('correo'), "UTF-8");
            $obj_cliente['fechaNacimiento'] = $this->input->post('fechaNacimiento');
            $obj_cliente['direccion'] = mb_strtoupper($this->input->post('direccion'), "UTF-8");
            $obj_cliente['fechaModificacion'] = date('Y-m-d H:i:s');

            $this->db->where('id', $id_cliente);
            $response['success'] = $this->db->update('persona', $obj_cliente);
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
        return $this->db->update('persona', array('estado' => get_state('INACTIVO')));
    }

    // Cambia el estado del registro a activo
    public function habilitar($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('persona', array('estado' => get_state('ACTIVO')));
    }

    /*-------------------------------------------------------------------*/


    public function get_birthday()
    {
        $user_data = $this->session->userdata('usuario_sesion');
        $mes_actual = date('m');
        $result = $this->db->query("select * from vi_persona_docente  where month(fechanacimiento)= ?  ", array($mes_actual))->result();
        return $result;
    }
    public function deudores_mes()
    {
        $user_data = $this->session->userdata('usuario_sesion');
        $mes_actual = date('m');
        $result = $this->db->query("select * from pagos where month(fecha_servicio)= ?  ", array($mes_actual))->result();
        return $result;
    }

    public function registrarRol()
    {
        $response = array(
            'success' => FALSE,
            'messages' => array()
        );
        $this->form_validation->set_rules('nombre_rol', 'nombre rol', 'trim|required|is_unique[rol.nombre]');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if ($this->form_validation->run() === true) {
            /** OBTENERMOS VALORES DE LOS INPUT **/
            $obj_data['nombre'] = mb_strtoupper($this->input->post('nombre_rol'), "UTF-8");
            $obj_data['fechaRegistro'] = date('Y-m-d');
            $obj_data['estado'] = 1;
            $response['success'] = $this->db->insert('rol', $obj_data);
        } else {
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }
        return json_encode($response);
    }

    public function registrarAula()
    {
        $response = array(
            'success' => FALSE,
            'messages' => array()
        );
        $this->form_validation->set_rules('nombre_aula', 'nombre_aula rol', 'trim|required|is_unique[aula.nombre]');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if ($this->form_validation->run() === true) {
            /** OBTENERMOS VALORES DE LOS INPUT **/
            $obj_data['nombre'] = mb_strtoupper($this->input->post('nombre_aula'), "UTF-8");
            $obj_data['Descripcion'] = 'NINGUNA';
            $obj_data['fechaRegistro'] = date('Y-m-d');
            $obj_data['estado'] = 1;
            $response['success'] = $this->db->insert('aula', $obj_data);
        } else {
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }
        return json_encode($response);
    }


}