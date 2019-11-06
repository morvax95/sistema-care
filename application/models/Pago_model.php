<?php

class Pago_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_debts()
    {
        $this->db->select("*")
            ->from("pagos ")
            ->where("pagado>0");
        $result = $this->db->get()->result();
        return $result;
    }

    public function registrar_pago()
    {
        $response = array(
            'success' => false,
            'message' => null
        );

        $deuda['curso_id'] =$this->input->post('venta_id');
        $deuda['forma_pago'] = $this->input->post('forma_pago');
        $deuda['banco'] = '';
        $deuda['nro_cuenta'] = '';
        $deuda['nro_cheque'] = '';
        $deuda['fecha_pago'] =  $this->input->post('fecha_pago');
        $deuda['fecha_registro'] = date('Y-m-d');
        $deuda['monto'] =$this->input->post('monto_pagar');
        $deuda['saldo'] =$this->input->post('monto_pagar');
        
        $deuda['estado'] =$this->input->post('saldo');
        if ($deuda['estado']==0) {
            $deuda['estado'] = 'Cancelado';
        } else {
            $deuda['estado'] = 'Debe';
        }

        /*if ($deuda['saldo']==0) {
            $deuda['estado'] = 'Cancelado';
        } else {
            $deuda['estado'] = 'Debe';
        }*/
        $this->db->insert('pago', $deuda);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $response['message'] = 'Error';
        } else {
            $this->db->trans_commit();
            $response['success'] = true;
        }
        return json_encode($response);
    }

    
    public function comprobante_pago($id)
    {
        $this->db->select("*");
        $this->db->from("pagos");
    
        $resultado['datos'] = $this->db->get()->result();
        return $resultado;

    }
}