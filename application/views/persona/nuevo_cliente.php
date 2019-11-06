<?php

?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <center><h2 class="box-title"><i class="fa fa-address-book-o fa-2x"></i><b> REGISTRA LOS DATOS DE
                                PERSONA</b></h2></center>
                </div>
                <form id="frm_registrar_cliente" action="<?= site_url('persona/registrar_cliente') ?>" method="post"
                      class="form-horizontal">
                    <?php $this->view('persona/formulario') ?>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>


<!-- REGISTRO DE ROL -->
<div id="modal_registro_rol" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h5 class="panel-heading cabecera_frm bg-primary" style="color: white"><b> REGISTRO DE NUEVO
                            ROL</b>
                    </h5></center>
            </div>
            <form id="frm_registro_rol" class="form-horizontal"
                  action="<?= site_url('persona/registrar_rol') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label text-right"><b>ROL</b></label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="nombre_rol" name="nombre_rol"
                                   value="" autofocus
                                   placeholder="Campo requerido"/>
                            <input id="type_data" name="type_data" value="0" hidden>
                        </div>
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                    <a id="btn_cerrar_modal_rol" class="btn btn-danger" data-dismiss="modal"><i
                                class="fa fa-times"></i> Cerrar
                    </a>
                </div>
            </form>
        </div>
    </div>
    <style>
        label {
            color: black;
        }
    </style>
</div>

<script src="<?= base_url('js-sistema/persona.js') ?>"></script>

