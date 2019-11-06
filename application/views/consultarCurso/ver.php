<?php

?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h2 class="box-title"><i class="fa fa-database"></i> DATOS CORRESPONDIENTES AL CURSO
                    </h2>
                    <div style="float:right">
                        <a href="<?= site_url('ConsultarCurso/index') ?>" class="btn btn-danger"><i
                                    class="fa fa-arrow-left"></i>&nbsp; Volver</a>
                    </div>

                </div>
                <div class="form-horizontal">
                    <div class="box-body">


                        <div class="col-md-12">
                            <div class="form-group" style="margin-bottom: 0%">


                                <div class="col-md-3">
                                    <label class="control-label"><b>NRO. CURSO</b></label>
                                    <input class="form-control" readonly
                                           value="<?= $datos_cliente->curso ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label"><b>CÉDULA IDENTIDAD</b></label>
                                    <input class="form-control" readonly
                                           value="<?= $datos_cliente->ci ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label"><b>NOMBRE DOCENTE</b></label>
                                    <input type="text" class="form-control"
                                           value="<?= $datos_cliente->docente, ' ', $datos_cliente->paterno, ' ', $datos_cliente->materno ?>"
                                           readonly/>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-6">
                                    <label class="control-label"><b> </b></label>

                                </div>

                            </div>
                        </div>
                        <!--DATOS DE LOS PRODUCTOS PENDIENTES-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table table-responsive">
                                    <table id="lista_datos" class="table table-bordered">
                                        <thead>
                                        <th style="width: 26%" class="text-center">CI ESTUDIANTE</th>
                                        <th style="width: 26%" class="text-center">NOMBRE ESTUDIANTE</th>
                                        <th style="width: 12%" class="text-center">TURNO</th>
                                        <th style="width: 10%" class="text-center">AULA</th>

                                        </thead>
                                        <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($detalle as $row) {
                                            ?>
                                            <tr>
                                                <td hidden><input type="text" value=" <?= $row->id ?> "
                                                                  id="n_venta" name="n_venta"/>
                                                </td>
                                                <td class="text-center" hidden>
                                                    <?= $row->id ?>

                                                </td>
                                                <td class="text-center">
                                                    <?= $row->ci ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $row->persona, ' ', $row->apellidoPaterno, ' ', $row->apellidoMaterno ?>
                                                </td>

                                                <td class="text-center">
                                                    <?= $row->turno ?>
                                                </td>

                                                <td class="text-center">
                                                    <?= $row->aula ?>
                                                </td>


                                            </tr>

                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<script type="text/javascript" src="<?= base_url('js-sistema/reporte.js') ?>"></script>-->
<script type="text/javascript" src="<?= base_url('js-sistema/consultarCurso.js') ?>"></script>