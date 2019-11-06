<?php

class Reporte extends CI_Controller
{
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Este es el pie de página creado con el método Footer() de la clase creada PDF que hereda de FPDF', 'T', 0, 'C');
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('reporte_model', 'reporte');
        $this->load->model('sucursal_model', 'sucursal');
        $this->load->model('persona_model', 'persona');
    }

    public function index()
    {
        show_error('Pagina no habilitada.<br><br><a class="btn btn-danger" href="' . base_url('inicio') . '"> Volver</a> ', 'Error de acceso', '<b>PAGINA EN CONSTRUCCION</b>');
    }

    public function reporte_persona()
    {
        $data['rol'] = $this->persona->get_all_rol();
        plantilla('reporte/reporte_persona', $data);
    }
    public function reporte_curso()
    {
        $data["fecha_actual"] = date("Y-m-d");
        $data['rol'] = $this->persona->get_all_rol();
        plantilla('reporte/reporte_curso', $data);
    }
    public function reporte_pagos()
    {
        $data["fecha_actual"] = date("Y-m-d");
        $data['rol'] = $this->persona->get_all_rol();
        plantilla('reporte/reporte_pagos', $data);
    }

    public function get_persona()
    {
        if ($this->input->is_ajax_request()) {
            $cargo = $this->input->post('rol_persona');
            echo json_encode($this->reporte->get_persona($cargo));
        } else {
            show_404();
        }
    }
    public function get_pagos()
    {
        if ($this->input->is_ajax_request()) {
            $estado = $this->input->post('estado_pagado');
            echo json_encode($this->reporte->get_pagos($estado));
        } else {
            show_404();
        }
    }
    public function get_cursos()
    {
        if ($this->input->is_ajax_request()) {
            $fecha_inicio = $this->input->post('fecha_inicio');
            $fecha_fin = $this->input->post('fecha_fin');
            
            echo json_encode($this->reporte->get_cursos($fecha_inicio, $fecha_fin));
        } else {
            show_404();
        }
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

//----------------------------------------------------------------------------------

    /*** Imprimir  en pdf personas ****/
    public function imprimir_persona()
    {
        $rol = $this->input->post('rol_persona');
        $datos = $this->reporte->get_persona($rol);
        $datos_cantidad = $this->reporte->get_all_persona();

        $sucursal_id = 1;// $this->input->post('sucursal');
        $datos_empresa = $this->sucursal->get_datos_empresa($sucursal_id);

        $datosPersona = $datos['datos'];
        $datos_cantidad_total = $datos_cantidad['cantidad_persona'];

        foreach ($datosPersona as $row) {
            $rol_persona = $row->rol;
        }
        foreach ($datos_cantidad_total as $row) {
            $total = $row->cantidad_persona;
        }
        $this->load->library('pdf');
        $this->pdf = new Pdf('P', 'mm', 'Legal');
        $this->pdf->AddPage();

        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("REPORTE");
        $var_img = base_url() . 'assets/img/logo.png';
        $this->pdf->Image($var_img, 10, 10, 35, 30);

        /*  intenando poner multicell   */
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(133, 5, '', 0, 0, 'C');
        $this->pdf->Cell(53, 5, $datos_empresa->nombre_empresa, 0, 0, 'C');
        $this->pdf->Cell(55, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->SetTextColor(248, 000, 000);

        $this->pdf->Ln(4);
        $this->pdf->Cell(133, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
        $this->pdf->Cell(52, 5, $datos_empresa->sucursal, 0, 0, 'C');
        $this->pdf->Cell(60, 5, '', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->MultiCell(72, 5, '', 0, 'C');
        $this->pdf->Ln(0);
        $this->pdf->Cell(70, 5, ' ', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->SetTextColor(248, 000, 000);
        $this->pdf->Cell(50, 5, 'REPORTE DE PERSONA', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
        $this->pdf->Cell(80, 4, $datos_empresa->direccion, 0, 0, 'C');
        $this->pdf->Cell(60, 4, '', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->MultiCell(72, 4, '', 0, 'C');
        $this->pdf->Ln(0);
        $this->pdf->Cell(75, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->SetTextColor(248, 000, 000);
        $this->pdf->Cell(40, 5, utf8_decode($datos_empresa->nombre_empresa), 0, 0, 'C');
        $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
        $this->pdf->SetFont('Arial', 'B', 7);
        $this->pdf->Cell(90, 4, 'TELEFONO: ' . $datos_empresa->telefono, 0, 0, 'C');
        $this->pdf->Cell(60, 4, '', 0);
        $this->pdf->Cell(72, 4, '', 0);

        $this->pdf->Ln(4);
        $this->pdf->Cell(139, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 7);
        $this->pdf->Cell(40, 4, 'SANTA CRUZ - BOLIVIA', 0, 0, 'C');
        $this->pdf->Cell(60, 4, '', 0);
        $this->pdf->Cell(72, 4, '', 0);

        $this->pdf->Ln(5);

        $nro = 1;
        $nro = $nro + 1;

        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Ln(10);
        /*COLOCANDO FECHA EN LITERAL*/
        $mes = date('m');
        $anio = date('Y');
        $dia = date("d");
        $fechaTransaccion = $dia . ' de ' . $this->obtener_mes($mes) . ' del ' . $anio;

        /*  FECHA IMRESION*/
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(27, 5, utf8_decode(' FECHA DE IMPRESIÓN   :  ' . $fechaTransaccion. '                                                                                                                          ' ), 'TL');
        $this->pdf->Cell(165, 5, '', 'TR');
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Ln(5);
        /*  CANTIDAD  */
        $this->pdf->Cell(27, 5, utf8_decode(' NOMBRE ROL / CARGO  : '.$rol_persona ), 'LB');
        $this->pdf->Cell(165, 5, '' , 'RB');
        $this->pdf->Ln(7);

        /* Encabezado de la columna*/
        $this->pdf->Cell(10, 5, "NRO", 1, 0, 'C');
        $this->pdf->Cell(60, 5, "NOMBRE COMPLETO ", 1, 0, 'C');
        $this->pdf->Cell(25, 5, "CELULAR ", 1, 0, 'C');
        $this->pdf->Cell(37, 5, "EMAIL", 1, 0, 'C');
        $this->pdf->Cell(30, 5, "GENERO", 1, 0, 'C');
        $this->pdf->Cell(30, 5, "NACIMIENTO", 1, 0, 'C');

        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', '', 8);
        $cantidad_filas = 0;
        $lista_compras = $datos['datos'];

        foreach ($lista_compras as $row_detalle) {
            $cantidad_filas++;
            $estilo = 'RL';
            if ($nro == 1) {
                $estilo = $estilo . 'T';
            }
            if ($cantidad_filas == count($lista_compras)) {
                $estilo = 'LRB';
            }
            $this->pdf->Cell(10, 4, utf8_decode($cantidad_filas), $estilo, 0, 'C');
            $this->pdf->Cell(60, 4, utf8_decode($row_detalle->nombre . ' ' . $row_detalle->apellidoPaterno . ' ' . $row_detalle->apellidoMaterno), $estilo, 0, 'C');
            $this->pdf->Cell(25, 4, utf8_decode($row_detalle->telefono), $estilo, 0, 'C');
            $this->pdf->Cell(37, 4, utf8_decode($row_detalle->correo), $estilo, 0, 'C');
            $this->pdf->Cell(30, 4, utf8_decode($row_detalle->genero), $estilo, 0, 'C');
            $this->pdf->Cell(30, 4, utf8_decode($row_detalle->fechaN), $estilo, 0, 'C');


            $this->pdf->Ln(4);
            $nro = $nro + 1;

        }
        $valor=$total;
        $this->pdf->Output("Reportes.pdf", 'I');
    }
    public function imprimir_cursos()
    {
        $rol = $this->input->post('rol_persona');
        $datos = $this->reporte->get_curso($rol);
        $datos_cantidad = $this->reporte->get_all_persona();

        $sucursal_id = 1;
        $datos_empresa = $this->sucursal->get_datos_empresa($sucursal_id);

        $datosPersona = $datos['datos'];
        $datos_cantidad_total = $datos_cantidad['cantidad_persona'];

        foreach ($datosPersona as $row) {
            $inicio = $row->FechaInicio;
            $fin = $row->fechafin;
        }
        foreach ($datos_cantidad_total as $row) {
            $total = $row->cantidad_persona;
        }
        $this->load->library('pdf');
        $this->pdf = new Pdf('P', 'mm', 'Legal');
        $this->pdf->AddPage();

        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("REPORTE");
        $var_img = base_url() . 'assets/img/logo.png';
        $this->pdf->Image($var_img, 10, 10, 35, 30);

        /*  intenando poner multicell   */
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(133, 5, '', 0, 0, 'C');
        $this->pdf->Cell(53, 5, $datos_empresa->nombre_empresa, 0, 0, 'C');
        $this->pdf->Cell(55, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->SetTextColor(248, 000, 000);

        $this->pdf->Ln(4);
        $this->pdf->Cell(133, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
        $this->pdf->Cell(52, 5, $datos_empresa->sucursal, 0, 0, 'C');
        $this->pdf->Cell(60, 5, '', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->MultiCell(72, 5, '', 0, 'C');
        $this->pdf->Ln(0);
        $this->pdf->Cell(70, 5, ' ', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->SetTextColor(248, 000, 000);
        $this->pdf->Cell(50, 5, 'REPORTE DE CURSOS', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
        $this->pdf->Cell(80, 4, $datos_empresa->direccion, 0, 0, 'C');
        $this->pdf->Cell(60, 4, '', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->MultiCell(72, 4, '', 0, 'C');
        $this->pdf->Ln(0);
        $this->pdf->Cell(75, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->SetTextColor(248, 000, 000);
        $this->pdf->Cell(40, 5, utf8_decode($datos_empresa->nombre_empresa), 0, 0, 'C');
        $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
        $this->pdf->SetFont('Arial', 'B', 7);
        $this->pdf->Cell(90, 4, 'TELEFONO: ' . $datos_empresa->telefono, 0, 0, 'C');
        $this->pdf->Cell(60, 4, '', 0);
        $this->pdf->Cell(72, 4, '', 0);

        $this->pdf->Ln(4);
        $this->pdf->Cell(139, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 7);
        $this->pdf->Cell(40, 4, 'SANTA CRUZ - BOLIVIA', 0, 0, 'C');
        $this->pdf->Cell(60, 4, '', 0);
        $this->pdf->Cell(72, 4, '', 0);

        $this->pdf->Ln(5);

        $nro = 1;
        $nro = $nro + 1;

        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Ln(10);
        /*COLOCANDO FECHA EN LITERAL*/
        $mes = date('m');
        $anio = date('Y');
        $dia = date("d");
        $fechaTransaccion = $dia . ' de ' . $this->obtener_mes($mes) . ' del ' . $anio;

        /*  FECHA IMRESION*/
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(27, 5, utf8_decode(' FECHA DE IMPRESIÓN   :  ' . $fechaTransaccion. '                                                                                                                          ' ), 'TL');
        $this->pdf->Cell(165, 5, '', 'TR');
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Ln(5);
        /*  CANTIDAD  */
        $this->pdf->Cell(27, 5, utf8_decode(' FECHA INICIO : ' .$inicio .'                                   FECHA FIN: '.$fin ), 'LB');
        $this->pdf->Cell(165, 5, '' , 'RB');
        $this->pdf->Ln(7);


        /* Encabezado de la columna*/
        $this->pdf->Cell(10, 5, "NRO", 1, 0, 'C');
        $this->pdf->Cell(70, 5, "NOMBRE ALUMNO ", 1, 0, 'C');
        $this->pdf->Cell(30, 5, "CELULAR ", 1, 0, 'C');
        $this->pdf->Cell(52, 5, "CURSO", 1, 0, 'C');
        $this->pdf->Cell(30, 5, "AULA", 1, 0, 'C');

        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', '', 8);
        $cantidad_filas = 0;

        $lista_compras = $datos['datos'];

        foreach ($lista_compras as $row_detalle) {
            $cantidad_filas++;
            $estilo = 'RL';
            if ($nro == 1) {
                $estilo = $estilo . 'T';
            }
            if ($cantidad_filas == count($lista_compras)) {
                $estilo = 'LRB';
            }
            $this->pdf->Cell(10, 4, utf8_decode($cantidad_filas), $estilo, 0, 'C');
            $this->pdf->Cell(70, 4, utf8_decode($row_detalle->alumno), $estilo, 0, 'C');
            $this->pdf->Cell(30, 4, utf8_decode($row_detalle->telefono), $estilo, 0, 'C');
            $this->pdf->Cell(52, 4, utf8_decode($row_detalle->curso), $estilo, 0, 'C');
            $this->pdf->Cell(30, 4, utf8_decode($row_detalle->aula), $estilo, 0, 'C');


            $this->pdf->Ln(4);
            $nro = $nro + 1;

        }

        $valor=$total;
        $this->pdf->Output("Reportes.pdf", 'I');
    }

    public function imprimir_pagos()
    {
        $estado = $this->input->post('rol_persona');
        $datos = $this->reporte->get_pagos($estado);
            
       /* if($estado="pagados"){
            $tipo_estado="NO DEUDORES";
        }elseif($estado="deudores"){
            $tipo_estado="DEUDORES";
        }*/

        $sucursal_id = 1;
        $datos_empresa = $this->sucursal->get_datos_empresa($sucursal_id);

        $datosPersona = $datos['datos'];
        $this->load->library('pdf');
        $this->pdf = new Pdf('P', 'mm', 'Legal');
        $this->pdf->AddPage();

        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("REPORTE");
        $var_img = base_url() . 'assets/img/logo.png';
        $this->pdf->Image($var_img, 10, 10, 35, 30);

        /*  intenando poner multicell   */
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(133, 5, '', 0, 0, 'C');
        $this->pdf->Cell(53, 5, $datos_empresa->nombre_empresa, 0, 0, 'C');
        $this->pdf->Cell(55, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->SetTextColor(248, 000, 000);

        $this->pdf->Ln(4);
        $this->pdf->Cell(133, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
        $this->pdf->Cell(52, 5, $datos_empresa->sucursal, 0, 0, 'C');
        $this->pdf->Cell(60, 5, '', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->MultiCell(72, 5, '', 0, 'C');
        $this->pdf->Ln(0);
        $this->pdf->Cell(70, 5, ' ', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->SetTextColor(248, 000, 000);
        $this->pdf->Cell(50, 5, 'REPORTE DE PAGOS', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
        $this->pdf->Cell(80, 4, $datos_empresa->direccion, 0, 0, 'C');
        $this->pdf->Cell(60, 4, '', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->MultiCell(72, 4, '', 0, 'C');
        $this->pdf->Ln(0);
        $this->pdf->Cell(75, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->SetTextColor(248, 000, 000);
        $this->pdf->Cell(40, 5, utf8_decode($datos_empresa->nombre_empresa), 0, 0, 'C');
        $this->pdf->SetTextColor(0, 0, 0);/* volvemos a color de texto negro*/
        $this->pdf->SetFont('Arial', 'B', 7);
        $this->pdf->Cell(90, 4, 'TELEFONO: ' . $datos_empresa->telefono, 0, 0, 'C');
        $this->pdf->Cell(60, 4, '', 0);
        $this->pdf->Cell(72, 4, '', 0);

        $this->pdf->Ln(4);
        $this->pdf->Cell(139, 5, '', 0, 0, 'C');
        $this->pdf->SetFont('Arial', 'B', 7);
        $this->pdf->Cell(40, 4, 'SANTA CRUZ - BOLIVIA', 0, 0, 'C');
        $this->pdf->Cell(60, 4, '', 0);
        $this->pdf->Cell(72, 4, '', 0);

        $this->pdf->Ln(5);

        $nro = 1;
        $nro = $nro + 1;

        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Ln(10);
        /*COLOCANDO FECHA EN LITERAL*/
        $mes = date('m');
        $anio = date('Y');
        $dia = date("d");
        $fechaTransaccion = $dia . ' de ' . $this->obtener_mes($mes) . ' del ' . $anio;

        /*  FECHA IMRESION*/
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(27, 5, utf8_decode(' FECHA DE IMPRESIÓN   :  ' . $fechaTransaccion. '                                                                                                                          ' ), 'TL');
        $this->pdf->Cell(165, 5, '', 'TR');
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Ln(5);
        /*  CANTIDAD  */
        $this->pdf->Cell(27, 5, utf8_decode(' TIPO DE ESTADO            : '.$estado   ), 'LB');
        $this->pdf->Cell(165, 5, '' , 'RB');
        $this->pdf->Ln(7);

        /* Encabezado de la columna*/
        $this->pdf->Cell(10, 5, "NRO", 1, 0, 'C');
        $this->pdf->Cell(32, 5, "CARNET IDENTIDAD", 1, 0, 'C');
        $this->pdf->Cell(60, 5, "NOMBRE ALUMNO ", 1, 0, 'C');
        $this->pdf->Cell(30, 5, "MONTO", 1, 0, 'C');
        $this->pdf->Cell(30, 5, "SALDO", 1, 0, 'C');
        $this->pdf->Cell(30, 5, "PAGO", 1, 0, 'C');

        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', '', 8);
        $cantidad_filas = 0;

        $lista_compras = $datos['datos'];

        foreach ($lista_compras as $row_detalle) {
            $cantidad_filas++;
            $estilo = 'RL';
            if ($nro == 1) {
                $estilo = $estilo . 'T';
            }
            if ($cantidad_filas == count($lista_compras)) {
                $estilo = 'LRB';
            }
            $this->pdf->Cell(10, 4, utf8_decode($cantidad_filas), $estilo, 0, 'C');
            $this->pdf->Cell(32, 4, utf8_decode($row_detalle->ci), $estilo, 0, 'C');
            $this->pdf->Cell(60, 4, utf8_decode($row_detalle->persona), $estilo, 0, 'C');
            $this->pdf->Cell(30, 4, utf8_decode($row_detalle->monto), $estilo, 0, 'C');
            $this->pdf->Cell(30, 4, utf8_decode($row_detalle->saldo), $estilo, 0, 'C');
            $this->pdf->Cell(30, 4, utf8_decode($row_detalle->pagado), $estilo, 0, 'C');

            $this->pdf->Ln(4);
            $nro = $nro + 1;

        }

        //$valor=$total;
        $this->pdf->Output("Reportes.pdf", 'I');
    }

}