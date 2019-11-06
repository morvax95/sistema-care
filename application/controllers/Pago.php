<?php


class Pago extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pago_model', 'pagos');
    }

    public function listar()
    {
        plantilla('pagos/index');
    }


    public function get_all_debts()
    {
        if ($this->input->is_ajax_request()) {
            echo json_encode($this->pagos->get_all_debts());
        } else {
            show_404();
        }
    }

    public function registrar_pago()
    {
        if ($this->input->is_ajax_request()) {
            echo $this->pagos->registrar_pago();
        } else {
            show_404();
        }
    }
      /*** Imprimir nota de pago****/
      public function imprimir_nota_pago()
      {
          $venta_id = $this->uri->segment(3);
          $datos = $this->pagos->comprobante_pago($venta_id);
          $lista_compras = $datos['datos'];
  
          $sucursal_id = 1;

          foreach ($lista_compras as $row_detalle) {
              $nombre_cliente = $row_detalle->persona;
              $forma=$row_detalle->forma_pago;
              $fecha_servicio = $row_detalle->fecha_servicio;
              $monto_total = $row_detalle->pagado;
              $motivo = $row_detalle->curso;
          }
        
          if ($forma == 'forma_pago_efectivo') {
              $modo_pago = 'EFECTIVO';
          } else if ($forma == 'forma_pago_tarjeta') {
              $modo_pago = 'TARJETA';
          } else if ($forma == 'forma_pago_cheque') {
              $modo_pago = 'CHEQUE';
          } else if ($forma = 'forma_pago_deposito') {
              $modo_pago = 'DEPOSITO';
          } else {
              $modo_pago = 'NADA';
          }
  
          $this->load->library('pdf');
          $this->pdf = new Pdf('P', 'mm', 'Legal');
          $this->pdf->AddPage();
  
          // Define el alias para el número de página que se imprimirá en el pie
          $this->pdf->AliasNbPages();
  
          $this->pdf->SetTitle("NOTA DE PAGO");
          $var_img = base_url() . 'assets/img/logo.png';
          $this->pdf->Image($var_img, 10, 10, 38, 33);
  
          $this->pdf->SetFont('Arial', 'B', 8);
          $this->pdf->Cell(133, 5, '', 0, 0, 'C');
          $this->pdf->Cell(65, 5, 'CARE - SANTA CRUZ ', 0, 0, 'C');
          $this->pdf->SetFont('Arial', 'B', 9);
          $this->pdf->SetTextColor(248, 000, 000);
  
          /**/
          $this->pdf->Ln(5);
          $this->pdf->Cell(133, 5, '', 0, 0, 'C');
          $this->pdf->SetFont('Arial', 'B', 9);
          $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
  
          $this->pdf->Cell(60, 5, 'Centro de Alto Rendimiento Estudiantil', 0, 0, 'C');
          $this->pdf->SetFont('Arial', 'B', 9);
          $this->pdf->MultiCell(72, 5, '', 0, 'C');
          $this->pdf->Cell(75, 5, ' ', 0, 0, 'C');
  
          $this->pdf->SetFont('Arial', 'B', 12);
          $this->pdf->SetTextColor(248, 0, 0);
          $this->pdf->Cell(40, 5, 'COMPROBANTE DE PAGO', 0, 0, 'C');
          $this->pdf->SetFont('Arial', '', 9);
          $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
  
          $this->pdf->Cell(100, 4, 'Av. Hernando Zanabria', 0, 0, 'C');
          $this->pdf->Cell(60, 4, '', 0);
          $this->pdf->SetFont('Arial', '', 9);
  
        $this->pdf->MultiCell(72, 4, '', 0, 'C');
        $this->pdf->Cell(75, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->SetTextColor(248, 0, 0);
        $this->pdf->Cell(41, 5, 'CARE ', 0, 0, 'C');

        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetFont('Arial', 'B', 7);
        $this->pdf->Cell(95, 4, 'Telf. 70208802
', 0, 0, 'C');;
  
          $this->pdf->Ln(4);
          $this->pdf->Cell(139, 5, '', 0, 0, 'C');
          $this->pdf->SetFont('Arial', 'B', 7);
          $this->pdf->Cell(50, 4, 'Santa Cruz - Bolivia', 0, 0, 'C');
          $this->pdf->Cell(60, 4, '', 0);
          $this->pdf->Cell(72, 4, '', 0);
  
          $this->pdf->Ln(15);
          $nro = 1;
          $nro = $nro + 1;
  
          $this->pdf->SetFont('Arial', 'B', 8);
          $this->pdf->Ln(5);
  
          /*COLOCANDO FECHA EN LITERAL*/
          $anio = substr($fecha_servicio, 0, 4);
          $mes = substr($fecha_servicio, 5, 2);
          $dia = substr($fecha_servicio, 8, 2);
          $fecha_literal = $dia . ' de ' . $this->obtener_mes($mes) . ' del ' . $anio;
        
  
          /*  NOMBRE DEL CLIENTE*/
          $this->pdf->SetFont('Arial', 'B', 8);
          $this->pdf->Cell(27, 5, utf8_decode('NOMBRE ESTUDIANTE   : ' . $nombre_cliente), 'TL');
          $this->pdf->Cell(165, 5, '', 'TR');
          $this->pdf->SetFont('Arial', 'B', 8);;
          $this->pdf->Ln(5);
          /*  FECHA DE LA VENTA*/
          $this->pdf->Cell(27, 5, utf8_decode('FECHA DE SERVICIO      : ' . $fecha_literal . '                                                                           FORMA DE PAGO  : ' . $modo_pago), 'LB');
          $this->pdf->Cell(165, 5, '', 'RB');
          $this->pdf->Ln(7);

          // Convertimos el monto en literal
          include APPPATH . '/libraries/convertidor.php';
          $v = new EnLetras();
          $valor = $v->ValorEnLetras(1, " ");
          $this->pdf->Ln(2);
          $this->pdf->SetFont('Arial', 'B', 8);
          $this->pdf->Cell(7, 5, 'MONTO TOTAL Bs  :  ', 'LTB', 0, 'L');
          $this->pdf->SetFont('Arial', '', 8);
          $this->pdf->Cell(125, 5, '                           ' . $monto_total, 'TBR', 0, 'L');
          $this->pdf->Cell(5, 5, '', '', 0, 'L');
          $this->pdf->SetFont('Arial', 'B', 8);
          $this->pdf->Cell(20, 5, 'TOTAL Bs :', 1, 0, 'R');
          $this->pdf->SetFont('Arial', '', 8);
          $this->pdf->Cell(35, 5, $monto_total, 1, 0, 'R');
          $this->pdf->Ln(8);
          /*  NOTA DE LA VENTA*/
          $this->pdf->SetFont('Arial', 'B', 8);
        
          $this->pdf->Cell(27, 5, utf8_decode('MOTIVO PAGO    : CURSO ' . $motivo ), 'TL');
          $this->pdf->Cell(165, 5, '', 'TR');
          $this->pdf->SetFont('Arial', 'B', 8);;
          $this->pdf->Ln(5);
          /*  LINEA DE SEPARACION */
       
          $this->pdf->Cell(27, 5, utf8_decode('NOTA                   : ' ), 'LB');
          $this->pdf->Cell(165, 5, '', 'RB');
          $this->pdf->Ln(30);
          /*  ENTREGADO Y RECIBIDO POR*/
          $this->pdf->Cell(27, 5, utf8_decode('                                   -------------------------------------------------------------   ' . '                            -------------------------------------------------------------  '), ' ');
          $this->pdf->Ln(3);
          $this->pdf->Cell(27, 5, utf8_decode('                                                       ENTREGADO                                ' . '                                                       RECIBIDO    '), ' ');
          $this->pdf->Ln(17);
          $this->pdf->Cell(27, 5, utf8_decode('   *******************************************************      GRACIAS POR SU PREFERENCIA    *************************************************  '), ' ');
          $this->pdf->Output("NotaPago.pdf", 'I');
      }
      function obtener_mes($valor)
      {
          $result = '';
          switch ($valor) {
              case '01':
                  $result = 'Enero';
                  break;
              case '02':
                  $result = 'Febrero';
                  break;
              case '03':
                  $result = 'Marzo';
                  break;
              case '04':
                  $result = 'Abril';
                  break;
              case '05':
                  $result = 'Mayo';
                  break;
              case '06':
                  $result = 'Junio';
                  break;
              case '07':
                  $result = 'Julio';
                  break;
              case '08':
                  $result = 'Agosto';
                  break;
              case '09':
                  $result = 'Septiembre';
                  break;
              case '10':
                  $result = 'Octubre';
                  break;
              case '11':
                  $result = 'Noviembre';
                  break;
              case '12':
                  $result = 'Diciembre';
                  break;
          }
          return $result;
      }

}