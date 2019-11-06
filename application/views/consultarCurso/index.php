<?php
$nombre = $this->session->userdata('usuario_sesion');
?>
    <!--preguntamos si ingresa como adm-->
<?php if ($nombre['cargo'] === '1' || $nombre['cargo'] === '2' ) { ?>
    <section class="content">
        <div class="row">

            <div class=" col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-print fa-2x"></i> <b>LISTA DE COMPROBANTES </b>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Cursos Activos</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1" style="padding: 1%">
                                    <table class="table table-bordered table-striped" id="lista_nota">
                                        <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center" >NRO.</th>
                                            <th class="text-center">NOMBRE CURSO</th>
                                            <th class="text-center">TURNO</th>
                                            <th class="text-center">FECHA</th>
                                            <th class="text-center">IMPRIMIR</th>
                                            <th class="text-center">OPCIONES</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <script type="text/javascript" src="<?= base_url('js-sistema/ConsultarCurso.js') ?>"></script>
<?php } else { ?>
    <br>
    <br>
    <br>
    <div class="form-group">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-info"></i> AVISO!</h4>
                <i class="fa fa-info"></i>&nbsp; NO TIENE ACCESO A ESTA PARTE DEL SISTEMA
            </div>
        </div>
    </div>

    <?php

}
?>