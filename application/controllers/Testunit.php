<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testunit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("unit_test");
    }

    private function division($a, $b)
    {
        return $a / $b;
    }

    public function prueba()
    {
        return "nombre";

    }

  /*  public function index()
    {
        echo "PRUEBAS UNITARIAS ";
        $test = $this->division(6, 3);
        $expected_result = 2;
        $test_name = "Prueba test function1";
        echo $this->unit->run($test, $expected_result, $test_name);

        //SEGUNDA PARTE
        /*$this->load->library("unit_test");
        $nombre = "nom";
        $datos['prueba'] = $this->unit->run($this->prueba(), 'is_string', $nombre, 'Nota segunda test');

        $datos['titulo'] = 'Library Unit Test';
        $datos['contenido'] = 'pruebas';
        echo $this->unit->run($datos);*/
        //plantilla('inicio/index', $datos);

    /*}*/


     public function index()
    {
        echo "PRUEBAS UNITARIAS ";
        $test = $this->verificador(6);
        $expected_result =0;
        $test_name = "Prueba test function1";
        echo $this->unit->run($test, $expected_result, $test_name);


    }
      private function verificador($a)
    {
        return $a ;
    }



}