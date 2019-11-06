<?php

class ConsultarCurso_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function cambiar_estado_produccion($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('solicitud', array('estado_producto' => 1));
    }


    public function get_all_data($params = array())
    {
        // Si se envia como parametro "draw", la peticion se esta realizando desde datatables
        if (!empty($this->input->post('draw'))) {

            $this->db->start_cache();
            $this->db->select("pc.id,c.nombre as curso,t.nombre as turno,a.nombre as aula,pc.estado,date(p.fechaRegistro) as fecha");
            $this->db->from('persona p,personacurso pc,curso c,turno t, aula a');
            $this->db->where('p.id=pc.personaId');
            $this->db->where('c.id=pc.cursoId');
            $this->db->where('t.id=pc.turno_id');
            $this->db->where('a.id=pc.aula_id');
            // $this->db->where('sucursal_id', get_branch_id_in_session());
            $this->db->where('pc.estado=1');
            $this->db->group_by('pc.fechaRegistro');
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
                $this->db->order_by("{$params['column']}", $params['order']);
            } else {
                $this->db->order_by('c.id', 'DESC');
            }

            if (array_key_exists('search', $params) && !empty($params['search'])) {
                $this->db->group_start();
                $this->db->like('lower(c.nombre)', strtolower($params['search']));
                $this->db->or_like('t.nombre', $params['search']);
                $this->db->group_end();
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
        }
    }


    //obtiene los datos del  detalle persona_curso
    public function get_data_by_id($id)
    {
        $this->db->select("c.id,c.nombre as curso,t.nombre as turno,a.nombre as aula,pc.estado,p.rol_id,pd.nombre as docente , pd.apellidoPaterno as paterno,pd.apellidoMaterno as materno,pd.ci")
            ->from("persona p,personacurso pc,curso c,turno t, aula a,persona pd")
            ->where("p.id=pc.personaId")
            ->where("c.id=pc.cursoId")
            ->where("t.id=pc.turno_id")
            ->where("a.id=pc.aula_id")
            ->where("pd.id=pc.DocenteId")
            ->where("pc.id", $id)
            ->where('pc.estado=1');
        $data['datos_cliente'] = $this->db->get()->row();
        // Detalle
        $this->db->select("c.id,c.nombre as curso,t.nombre as turno,a.nombre as aula,pc.estado,p.nombre as persona,p.apellidoPaterno,p.apellidoMaterno,p.ci")
            ->from("persona p,personacurso pc,curso c,turno t, aula a")
            ->where("p.id=pc.personaId")
            ->where("c.id=pc.cursoId")
            ->where("t.id=pc.turno_id")
            ->where("a.id=pc.aula_id")
            ->where('p.rol_id>1')
            ->where("pc.id", $id);
        $data['detalle'] = $this->db->get()->result();
        return $data;
    }

    // Cambia el estado solcitud a entregado
    public function cambiar_estado_solicitud($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('solicitud', array('estado_solicitud' => 2));
    }

    // Cambia el estado solcitud a cancelada
    public function modificar_estado_solicitud_cancelada($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('solicitud', array('estado_solicitud' => 4));
    }

    // Cambia el estado de materiales a 1
    public function devolucion_materiales2($id)
    {
        $this->db->where('solicitud_id', $id);
        return $this->db->update('detalle_material', array('estado' => 1));

    }

    //para imprimir el comprante del estudiante pdf
    public function nota_curso($codigo)
    {
        $this->db->select("pc.nota,p.telefono,c.id,t.nombre as turno,c.nombre as curso,pd.nombre as docente,pd.apellidoPaterno as paterno,pd.apellidoMaterno as materno,p.nombre as estudiantes,p.apellidoPaterno as apellidoPE,p.apellidoMaterno as apellidoME,p.ci,pc.estado,pc.nota,pc.fechaRegistro,pc.cantidadhora,pc.FechaInicio,pc.FechaFin,pc.subtotal,pc.descuento,pc.total");
        $this->db->from("persona p,personacurso pc,persona pd,curso c,turno t");
        $this->db->where("p.id=pc.personaid");
        $this->db->where("pd.id=pc.Docenteid");
        $this->db->where("c.id=pc.cursoid");
        $this->db->where("t.id=pc.turno_id");
        $this->db->where("PC.estado=1");
        if (!empty($codigo)) {
            $this->db->where("pc.id ='" . $codigo . "'");
        }
        $resultado['datos'] = $this->db->get()->result();
        return $resultado;
    }

    //consulta para la notificacion activas
    public function solicitud_activas()
    {
        $this->db->select("count(id) as codigo")
            ->from("solicitud")
            ->where("estado_solicitud=1")
            ->group_by("id");
        $result = $this->db->get()->result();
        return $result;
    }

//consulta para la notificacion entregadas
    public function solicitud_entregadas()
    {
        $this->db->select("count(id) as codigo")
            ->from("solicitud")
            ->where("estado_solicitud=2")
            ->group_by("id");
        $result = $this->db->get()->result();
        return $result;
    }

//consulta para la notificacion devueltas
    public function solicitud_devueltas()
    {
        $this->db->select("count(id) as codigo")
            ->from("solicitud")
            ->where("estado_solicitud=3")
            ->group_by("id");
        $result = $this->db->get()->result();
        return $result;
    }

    //consulta para la notificacion canceladas
    public function solicitud_canceladas()
    {
        $this->db->select("count(id) as codigo")
            ->from("solicitud")
            ->where("estado_solicitud=4")
            ->group_by("id");
        $result = $this->db->get()->result();
        return $result;
    }

}