<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Persona extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('persona_model', 'persona');
    }

    public function index()
    {
        plantilla('persona/index', null);
    }

    public function nuevo()
    {
        $data["fecha_actual"] = date("Y-m-d");
        $data['profesion'] = $this->db->get('profesion')->result();
        $data['rol'] = $this->persona->get_all_rol();
        plantilla('persona/nuevo_cliente', $data);
    }

    public function editar()
    {
        $data["fecha_actual"] = date("Y-m-d");
        $data['profesion'] = $this->db->get('profesion')->result();
        $data['cliente'] = $this->persona->get_customer_by_id($this->input->post('id'));
        $data['rol'] = $this->persona->get_all_rol();
        plantilla('persona/editar', $data);
    }

    public function lista_cumple()
    {
        $data['clientes'] = $this->persona->get_birthday();
        plantilla('persona/cumple', $data);
    }

    public function imprimir()
    {
        $data['clientes'] = $this->persona->get_birthday();
        $sesion = $this->session->userdata('usuario_sesion');
        $data['empresa'] = $this->db->get_where('sucursal', array('id' => $sesion['id_sucursal']))->row();
        $this->load->view('persona/imprimir', $data);
    }

    public function imprimir_clientes()
    {
        $data['clientes'] = $this->persona->listar_clientes();
        $sesion = $this->session->userdata('usuario_sesion');
        $data['empresa'] = $this->db->get_where('sucursal', array('id' => $sesion['id_sucursal']))->row();
        $this->load->view('persona/lista_clientes', $data);
    }

    public function listar_clientes()
    {
        if ($this->input->is_ajax_request()) {
            // Se recuperan los parametros enviados por datatable
            $start = $this->input->post('start');
            $limit = $this->input->post('length');
            $search = $this->input->post('search')['value'];
            $order = $this->input->post('order')['0']['dir'];
            $column_num = $this->input->post('order')['0']['column'];
            $column = $this->input->post('columns')[$column_num]['data'];

            // Se almacenan los parametros recibidos en un array para enviar al modelo
            $params = array(
                'start' => $start,
                'limit' => $limit,
                'search' => $search,
                'column' => $column,
                'order' => $order
            );

            echo json_encode($this->persona->listar_clientes($params));
        } else {
            show_404();
        }
    }

    public function registrar_cliente()
    {
        if ($this->input->is_ajax_request()) {
            echo $this->persona->registrar_persona();
        } else {
            show_404();
        }
    }

    public function modificar_cliente()
    {
        if ($this->input->is_ajax_request()) {
            echo $this->persona->modificar_cliente();
        } else {
            show_404();
        }
    }

    public function eliminar()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            echo $this->persona->eliminar($id);
        } else {
            show_404();
        }
    }

    public function habilitar()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id_cliente');

            $res = $this->persona->habilitar($id);
            if ($res !== 1) {
                echo 'true';
            } else {
                echo 'error';
            }
        } else {
            show_404();
        }
    }

    public function get_cliente()
    {
        $dato = $this->input->post_get('name_startsWith');
        $tipo = $this->input->post_get('type');
        if ($tipo === 'ci_nit') {
            $this->db->like('ci_nit', $dato);
            $this->db->where('id >0');
            $this->db->distinct();
            $res = $this->db->get('persona');
            if ($res->num_rows() > 0) {
                foreach ($res->result_array() as $row) {
                    $data[$row['ci_nit'] . '|' . $row['nombre_cliente']] = $row['nombre_cliente'] . '/' . $row['id'];
                }
                echo json_encode($data); //format the array into json data
            } else {
                $data["No existe este nit"] = "No existe este nit";
                echo json_encode($data);
            }
        } else {
            $this->db->like('lower(nombre_cliente)', strtolower($dato));
            $this->db->where('id >0');
            $res = $this->db->get('cliente');
            if ($res->num_rows() > 0) {
                foreach ($res->result_array() as $row) {
                    $data[$row['nombre_cliente'] . '|' . $row['ci_nit']] = $row['ci_nit'] . '/' . $row['id'];
                }
                echo json_encode($data); //format the array into json data
            } else {
                $data["No existe este nombre de cliente"] = "No existe este nombre de cliente";
                echo json_encode($data);
            }
        }

    }

    //endregion
    public function registrar_rol()
    {
        if ($this->input->is_ajax_request()) {
            echo $this->persona->registrarRol();
        } else {
            show_404();
        }
    }

    //endregion
    public function registrar_aula()
    {
        if ($this->input->is_ajax_request()) {
            echo $this->persona->registrarAula();
        } else {
            show_404();
        }
    }

    //metodo para que se actualize el rol automaticamente
    public function get_rol()
    {
        if ($this->input->is_ajax_request()) {
            echo json_encode($this->persona->get_all_rol());
        } else {
            show_404();
        }
    }

//metodo para que se actualize el rol automaticamente
    public function get_aula()
    {
        if ($this->input->is_ajax_request()) {
            echo json_encode($this->persona->get_all_aula());
        } else {
            show_404();
        }
    }

    public function enviar_datos()
    {
        /*DATOS USUARIOS*/
        $this->load->model('login_model', 'login');
        $this->load->model('usuario_model', 'usuario');
        $res['sucursal'] = $this->login->obtener_sucursales();
        $res['cargos'] = $this->db->get('cargo')->result();
        $res['menu'] = $this->usuario->get_menu();
        $res['sucursales'] = $this->db->get('sucursal')->result();
        /*DATOS USUARIOS*/
        $res['persona'] = $this->persona->get_customer_by_id($this->input->post('id'));
        plantilla('usuario/nuevo_usuario', $res);
    }


}