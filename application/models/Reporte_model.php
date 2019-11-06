<?php

class Reporte_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getNitEmpresa()
    {
        return $this->db->get('sucursal')->row();
    }


    public function get_persona($rol)
    {
        $this->db->select("p.ci,p.nombre,p.apellidoPaterno,p.apellidoMaterno,p.correo,date(p.fechaNacimiento) as fechaN,p.telefono,p.direccion,p.genero,r.nombre as rol");
        $this->db->from("persona p,rol r");
        $this->db->where("p.rol_id=r.id");
        if (!empty($rol)) {
            $this->db->where("p.rol_id=" . $rol);
        }
        $resultado['datos'] = $this->db->get()->result();
        return $resultado;
    }
    public function get_curso($rol)
    {
        $this->db->select("*");
        $this->db->from("vi_cursos");
        $resultado['datos'] = $this->db->get()->result();
        return $resultado;
    }
    public function get_pagos($estado)
    {
        if ($estado=="deudores"){
            $this->db->select("*");
            $this->db->from("pagos");
            $this->db->where("pagado>0");
            $resultado['datos'] = $this->db->get()->result();
            return $resultado;
        }else{
            $this->db->select("*");
            $this->db->from("pagos");
            $this->db->where("pagado=0");
            $resultado['datos'] = $this->db->get()->result();
            return $resultado;
        }
    }
    public function get_all_persona()
    {
        $this->db->select("count(p.id) as cantidad_persona");
        $this->db->from("persona p");
        $this->db->where("p.rol_id=2");
        $resultado['cantidad_persona'] = $this->db->get()->result();
        return $resultado;
    }
    public function get_cursos($fecha_inicio, $fecha_fin)
    {
        $this->db->select("*");
        $this->db->from("vi_cursos c");
        if (!empty($fecha_inicio) && !empty($fecha_fin) ) {
            $this->db->where("c.FechaInicio >='" . $fecha_inicio . "' and c.fechafin  <='" . $fecha_fin . "'" );
        }
        $resultado['datos'] = $this->db->get()->result();
        return $resultado;
    }
}