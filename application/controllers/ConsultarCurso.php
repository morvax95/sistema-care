<?php

class ConsultarCurso extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ConsultarCurso_model', 'solicitud');
    }

    //region Vistas de producto

    public function index()
    {
        plantilla('ConsultarCurso/index');
    }

    //actualizar el estado de la solicitud a cancelada y devuelta a estado 1 los materiales

    public function modificar_estado_solicitud_cancelada()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            echo $this->solicitud->modificar_estado_solicitud_cancelada($id);
            $this->solicitud->devolucion_materiales2($id);
        } else {
            show_404();
        }
    }

    public function get_all_data()
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

            echo json_encode($this->solicitud->get_all_data($params));
        } else {
            show_404();
        }
    }

    public function ver_datos_solitud()
    {

        if ($this->input->post()) {
            $id = $this->input->post('id');
            $data = $this->solicitud->get_data_by_id($id);
            plantilla('ConsultarCurso/ver', $data);
        } else {
            show_404();
        }
    }


    public function modificar_estado_solicitud()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id_solicitud');
            echo $this->solicitud->cambiar_estado_solicitud($id);
        } else {
            show_404();
        }
    }

    /*** Imprimir  en pdf gestion de curso ****/
    public function imprimir_gestionCurso()
    {
        $comprobante_id = $this->uri->segment(3);
        $datos = $this->solicitud->nota_curso($comprobante_id);

        $lista_datos = $datos['datos'];

        foreach ($lista_datos as $row_detalle) {
            $nombre = $row_detalle->docente;
            $apm = $row_detalle->materno;
            $app = $row_detalle->paterno;
            $nota = $row_detalle->nota;
            $nombre_curso = $row_detalle->curso;
            $turno_curso = $row_detalle->turno;
            $fechaRegistro = $row_detalle->fechaRegistro;
            $cantidadhora = $row_detalle->cantidadhora;
            $fechaInicio = $row_detalle->FechaInicio;
            $fechaFin = $row_detalle->FechaFin;
            $subtotal = $row_detalle->subtotal;
            $descuento = $row_detalle->descuento;
            $total = $row_detalle->total;
        }

        $this->load->library('pdf');
        $this->pdf = new Pdf('P', 'mm', 'Legal');
        $this->pdf->AddPage();

        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();

        $this->pdf->SetTitle("COMPROBANTE DE CURSO");
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

        $this->pdf->Cell(60, 5, 'Centro de Alto Rendimiento Estuadiantil', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->MultiCell(72, 5, '', 0, 'C');
        $this->pdf->Cell(75, 5, ' ', 0, 0, 'C');

        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->SetTextColor(248, 0, 0);
        $this->pdf->Cell(40, 5, 'COMPROBANTE DE REGISTRO', 0, 0, 'C');
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
', 0, 0, 'C');

        $this->pdf->Ln(15);
        $nro = 1;
        $nro = $nro + 1;

        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Ln(10);

        /*COLOCANDO FECHA EN LITERAL*/
        $anio = substr($fechaRegistro, 0, 4);
        $mes = substr($fechaRegistro, 5, 2);
        $dia = substr($fechaRegistro, 8, 2);
        $fecha_registro = $dia . ' de ' . $this->obtener_mes($mes) . ' del ' . $anio;
        /*COLOCANDO FECHA INICIO EN LITERAL*/
        $anio = substr($fechaInicio, 0, 4);
        $mes = substr($fechaInicio, 5, 2);
        $dia = substr($fechaInicio, 8, 2);
        $fechaInicio = $dia . ' de ' . $this->obtener_mes($mes) . ' del ' . $anio;
        /*COLOCANDO FECHA FIN EN LITERAL*/
        $anio = substr($fechaFin, 0, 4);
        $mes = substr($fechaFin, 5, 2);
        $dia = substr($fechaFin, 8, 2);
        $fechaFin = $dia . ' de ' . $this->obtener_mes($mes) . ' del ' . $anio;

        /*  NOMBRE DE DOCENTE*/
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(27, 5, utf8_decode('NOMBRE DOCENTE        :   ' . $nombre . ' ' . $app . ' ' . $apm), 'TL');
        $this->pdf->Cell(165, 5, '', 'TR');
        $this->pdf->SetFont('Arial', 'B', 8);;
        $this->pdf->Ln(5);
        /*  FECHA IMPRESION  */
        //  $this->pdf->Cell(27, 5, utf8_decode(' FECHA DE IMPRESIÓN   :  ' . date('d/m/Y')), 'LB');
        $this->pdf->Cell(27, 5, utf8_decode('FECHA DE IMPRESIÓN   :  ' . $fecha_registro), 'LB');
        $this->pdf->Cell(165, 5, '', 'RB');
        $this->pdf->Ln(7);
        //SEGUNDA COLUMNA

        /*  NOMBRE DE CURSO*/
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(27, 5, utf8_decode(' CURSO  :  ' . $nombre_curso . '                                                                TURNO  :' . $turno_curso . '                                           CANTIDAD DE HORAS : ' . $cantidadhora), 'TL');
        $this->pdf->Cell(165, 5, '', 'TR');
        $this->pdf->SetFont('Arial', 'B', 8);;
        $this->pdf->Ln(5);
        /*  FECHA INICIO Y FECHA FIN DEL CURSO  */

        $this->pdf->Cell(27, 5, utf8_decode(' FECHA INICIO  :  ' . $fechaInicio . '                        FECHA FIN : ' . $fechaFin), 'LB');
        $this->pdf->Cell(165, 5, '', 'RB');
        $this->pdf->Ln(7);

        /* Encabezado de la columna*/

        $this->pdf->Cell(30, 5, "NRO", 1, 0, 'C');
        $this->pdf->Cell(40, 5, "CI", 1, 0, 'C');
        $this->pdf->Cell(72, 5, "NOMBRE ESTUDIANTE", 1, 0, 'C');
        $this->pdf->Cell(50, 5, "CELULAR", 1, 0, 'C');


        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', '', 8);

        $cantidad_filas = 0;

        foreach ($lista_datos as $row_detalle) {
            $cantidad_filas++;
            $estilo = 'RL';
            if ($nro == 1) {
                $estilo = $estilo . 'T';
            }
            if ($cantidad_filas == count($lista_datos)) {
                $estilo = 'LRB';
            }


            $this->pdf->Cell(30, 4, utf8_decode($cantidad_filas), $estilo, 0, 'C');
            $this->pdf->Cell(40, 4, utf8_decode($row_detalle->ci), $estilo, 0, 'C');
            $this->pdf->Cell(72, 4, utf8_decode($row_detalle->estudiantes . ' ' . $row_detalle->apellidoPE . ' ' . $row_detalle->apellidoME), $estilo, 0, 'C');
            $this->pdf->Cell(50, 4, utf8_decode($row_detalle->telefono), $estilo, 0, 'C');
            $this->pdf->Ln(4);
            $nro = $nro + 1;
        }
        $this->pdf->Ln(5);
        /*  MONTOS DE CURSO*/
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(27, 5, utf8_decode('SUB TOTAL        :   ' . $subtotal . ' BS' . '                                                            DESCUENTO : ' . $descuento . ' BS' . '                                               TOTAL : ' . $total . ' BS'), 'TL');
        $this->pdf->Cell(165, 5, '', 'TR');
        $this->pdf->SetFont('Arial', 'B', 8);;
        $this->pdf->Ln(5);

        /*  MONTO EN LITERAL  */
        // Convertimos el monto en literal
        include APPPATH . '/libraries/convertidor.php';
        $v = new EnLetras();
        $valor = $v->ValorEnLetras($total, " ");

        $this->pdf->Cell(27, 5, utf8_decode('MONTO TOTAL  :  ' . $valor), 'LB');
        $this->pdf->Cell(165, 5, '', 'RB');
        $this->pdf->Ln(7);

        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(27, 5, utf8_decode('   NOTA    : ' . $nota), 'TL');
        $this->pdf->Cell(165, 5, '', 'TR');
        $this->pdf->SetFont('Arial', 'B', 8);;
        $this->pdf->Ln(5);
        /*  LINEA DE SEPARACION */
        $this->pdf->Cell(27, 5, utf8_decode('          '), 'LB');
        $this->pdf->Cell(165, 5, '', 'RB');
        $this->pdf->Ln(30);


        $this->pdf->Output("CompranteRegistro.pdf", 'I');

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