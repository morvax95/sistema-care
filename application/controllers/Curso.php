<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Curso extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('curso_model', 'curso'); 
    }

    public function index()
    {
        plantilla('curso/index', null);
    }

    public function nuevo()
    {
        $data["fecha_actual"] = date("Y-m-d");
        $data['nivel'] = $this->db->get('contenido')->result();
        plantilla('curso/nuevo_curso', $data);
    }

    public function editar()
    {
        $data["fecha_actual"] = date("Y-m-d");
        $data['nivel'] = $this->db->get('contenido')->result();
        $data['curso'] = $this->curso->get_curso_by_id($this->input->post('id'));
        plantilla('curso/editar', $data);
    }


    public function listar_curso()
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

            echo json_encode($this->curso->listar_curso($params));
        } else {
            show_404();
        }
    }

    public function registrar_curso()
    {
        if ($this->input->is_ajax_request()) {
            echo $this->curso->registrar_curso();
        } else {
            show_404();
        }
    }


    public function modificar_curso()
    {
        if ($this->input->is_ajax_request()) {
            echo $this->curso->modificar_curso();
        } else {
            show_404();
        }
    }

    public function eliminar()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            echo $this->curso->eliminar($id);
        } else {
            show_404();
        }
    }

    public function habilitar()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id_cliente');

            $res = $this->curso->habilitar($id);
            if ($res !== 1) {
                echo 'true';
            } else {
                echo 'error';
            }
        } else {
            show_404();
        }
    }


}