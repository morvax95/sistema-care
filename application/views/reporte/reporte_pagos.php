<?php

$data_user = $this->session->userdata('usuario_sesion');
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-address-book-o fa-2x"></i> <b>REPORTE DE PAGOS</b>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    
                    <div class="panel panel-default">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <form id="datos_busqueda">
                                            <div class="col-md-3">
                                                <label class="control-label"><b>ESTADO PAGO </b></label>
                                                <select class="form-control" id="estado_pagado" name="estado_pagado">
                                                <option value="deudores">DEUDORES
                                                 </option>
                                                 <option value="pagados">NO DEUDORES
                                                 </option>
                                                
                                                ></select>
                                            </div>

                                        </form>
                                        <div class="col-md-1" style="width: 8%">
                                            <a class="btn btn-danger btn-sm" onclick="buscarPagos();"
                                               title="Busqueda de los datos"><i
                                                        class="fa fa-search"></i> Buscar
                                            </a>
                                        </div>
                                        <div class="col-md-1" style="width:8%" hidden>
                                            <a class="btn btn-success btn-sm" onclick="exportar_excel_personas()"
                                               title="Exportacion a archivo excel">
                                                <i class="fa fa-file-excel-o"></i> Excel
                                            </a class="btn">
                                        </div>
                                        <div class="col-md-1">
                                            <a class="btn btn-warning btn-sm" onclick="imprimir_pagos()"
                                               href="" target="_blank"
                                               title="Exportacion a archivo PDF">
                                                <i class="fa fa-file-pdf-o"></i> PDF
                                            </a class="btn">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">

                        <div class="panel-body">

                            <table class="table table-bordered" id="lista_reporte_pagos">
                                <thead>
                                <th class="text-center" style="width: 5%">NRO.</th>
                                <th class="text-center" style="width: 13%" hidden>ID</th>
                                <th class="text-center" style="width: 13%">CI</th>
                                <th class="text-center" style="width: 35%">NOMBRE</th>
                                <th class="text-center" style="width: 20%">TELÉFONO</th>
                                <th class="text-center" style="width: 25%">MONTO</th>
                                <th class="text-center" style="width: 25%"> SALDO</th>
                                <th class="text-center" style="width: 25%"> PAGADO</th>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?= base_url('js-sistema/reporte.js') ?>"></script>
