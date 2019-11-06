<?php


class Inicio_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function obtener_avisos()
    {

        $this->load->model('persona_model', 'persona');
        $data['cumpleañeros'] = $this->persona->get_birthday();
        $data['deudas'] = $this->persona->deudores_mes();
        return $data;
    }

    public function cargar_menu($usuario_id, $cargo)
    {

        if ($cargo != 1) {
            $this->db->select('m.*')
                ->from('menu m, acceso a, usuario u')
                ->where('m.id = a.menu_id')
                ->where('a.usuario_id = u.id')
                ->where('u.id', $usuario_id)
                ->order_by('m.id', 'ASC');
            return $this->db->get()->result_array();
        } else {
            return $this->db->get('menu')->result_array();
        }
    }

    public function verificar($id)
    {
        $res = $this->db->get_where('usuario', array('id' => $id));
        return $res->row();
    }

    public function confirma_cambio($idUsuario, $claveNueva)
    {
        $claveEncriptada = password_hash($claveNueva, PASSWORD_BCRYPT);
        $datos = array(
            'clave' => $claveEncriptada
        );
        $this->db->where('id', $idUsuario);
        $res = $this->db->update('usuario', $datos);
        return $res;
    }
}