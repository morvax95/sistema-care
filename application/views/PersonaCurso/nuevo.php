<?php
$user_data = $this->session->userdata('usuario_sesion');
?>
<!-- Main content -->
<style>
    hr {
        margin-top: 2%;
        margin-bottom: 1%;
    }
</style>
<?php if ($user_data['cargo'] == '1' or $user_data['cargo'] == '3') { ?>
    <section id="seccion" class="content">
        <div class="row">
            <form id="frm_registrar_inventario" class="form-horizontal" role="form"
                  action="javascript: agregar_fila();">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-file-archive-o fa-2x"></i> <b>INSCRIPCIÓN DE CURSO</b>
                            </h3>
                        </div>
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label"><b>NOMBRE</b></label>
                                        <input style="font-size: 13pt; font-weight: bold" type="text"
                                               id="nombre_docente"
                                               name="nombre_docente" class="form-control"
                                               value="" placeholder="Nombre del Docente" />
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <label class="control-label"><b>CI</b></label>
                                        <input style="font-size: 13pt; font-weight: bold" type="number" id="ci_docente"
                                               name="ci_docente" class="form-control" value=""
                                               placeholder="ci del Docente" autofocus/>
                                        <input type="text" id="idCliente" name="idCliente" value="" hidden/>
                                    </div>
                                    <div style="padding-top: 3%" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <a
                                                href="<?= site_url('persona/nuevo') ?>"
                                                class="btn btn-success btn-block"><i class="fa fa-user-plus"></i> Nueva
                                            Persona</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                <span style="color:red">
                                    <i class="fa fa-info-circle"></i>
                                    <b>
                                       <em>
                                            Los Docentes que no estén registrados, se agregarán en la agenda automáticamente al registrar la Inscripción.
                                        </em>
                                    </b>
                                </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">CURSO</label>
                                        <select id="curso_id" name="curso_id" class="form-control">
                                            <option value="0">::ELIJA UNA OPCIÓN</option>
                                            <?php
                                            foreach ($curso as $row) {
                                                if ($row->tipo_almacen == 0) {
                                                    ?>
                                                    <option value="<?= $row->id ?>"><?= $row->nombre ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <label class="control-label">TURNO</label>
                                        <select id="turno_id" name="turno_id" class="form-control">
                                            <option value="0">::ELIJA UNA OPCIÓN</option>
                                            <?php
                                            foreach ($turno as $row) {
                                                if ($row->tipo_almacen == 0) {
                                                    ?>
                                                    <option value="<?= $row->id ?>"><?= $row->nombre ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <label class="control-label"><b>AULA</b></label>

                                        <select id="aula_id" name="aula_id" class="form-control" required>
                                            <option value="0">::ELIJA UNA OPCIÓN</option>
                                            <?php
                                            foreach ($aula as $row) {
                                                if ($row->tipo_almacen == 0) {
                                                    ?>
                                                    <option value="<?= $row->id ?>"><?= $row->Nombre ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>

                                        <a style="color: orange;" href="#modal_registro_aula" data-toggle="modal"><i
                                                    class="fa fa-plus-square"></i> Agregar  nueva aula</a>

                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">


                                    </div>
                                </div>
                                <hr>
                                <div class="col-xs-12">
                                    <table id="lista_inventario" class="table table-bordered">
                                        <thead>
                                        <th style="width: 30%" class="text-center">NOMBRE ESTUDIANTE</th>
                                        <th style="width: 10%" class="text-center">CI DEL ESTUDIANTE</th>
                                        <th style="width: 10%" class="text-center">OPCIONES</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>
                                                <input id="nombre_estudiante" name="nombre_estudiante" type="text"
                                                       class="form-control input-sm"
                                                       placeholder="Escriba el nombre del estudiante"/>
                                                <!--CONTADOR DE FILAS DE LA TABLA -->
                                                <input type="text" id="contador" name="contador"
                                                       hidden/>
                                                <!--CODIGO -->
                                                <input type="text" id="estudiante_id" name="estudiante_id"
                                                       placeholder="codigo" hidden
                                                >
                                            </td>
                                            <td>
                                                <input type="number" id="carnet_estudiante" name="carnet_estudiante"
                                                       class="form-control input-sm "
                                                       placeholder="Escriba el ci del estudiante">
                                            </td>

                                            <td class="text-center">
                                                <button type="submit" id="agregar" name="agregar"
                                                        class="btn btn-primary">
                                                    <i class="fa fa-plus-circle white"></i>
                                                    Agregar
                                                </button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label">Nota</label>
                                        <textarea id="nota" name="nota" class="form-control">

                                    </textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SUBTOTAL Y DESCUENTO -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <label class="control-label" style="font-size: 14pt"><b>FECHA INICIO</b></label>
                            <input style="font-size: 18pt;" type="date" step="any" id="fecha_inicio" name="fecha_inicio" value="<?= $fecha_actual ?>"
                                   class="form-control" value="0.00"/>
                            <label class="control-label" style="font-size: 14pt"><b>FECHA FIN</b></label>
                            <input style="font-size: 18pt;" type="date" step="any" id="fecha_fin" value="<?= $fecha_actual ?>"
                                   name="fecha_fin"
                                   class="form-control" value="0.00"/>
                            <label class="control-label" style="font-size: 14pt"><b>CANTIDAD DE HORAS</b></label>
                            <input style="font-size: 18pt;" type="number" step="any" id="cantidad_hora"
                                   name="cantidad_hora"
                                   class="form-control" value="0.00"/>
                                   <label class="control-label" style="font-size: 14pt"><b>FORMA PAGO</b></label>
                                   <select class="form-control" id="forma_pago" name="forma_pago">
                                <option value="vacio">SELECCIONE FORMA DE PAGO</option>
                                <option value="forma_pago_efectivo">EFECTIVO
                                </option>
                                <option value="forma_pago_cheque">CHEQUE
                                </option>
                                <option value="forma_pago_tarjeta">TARJETA
                                </option>
                                <option value="forma_pago_deposito">DEPOSITO
                                    BANCARIO
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-body">
                            <label class="control-label" style="font-size: 14pt"><b>SUB TOTAL</b></label>
                            <input style="font-size: 18pt;" type="number" step="any" id="sub_total" name="sub_total"
                                   class="form-control" value="0.00"/>
                            <label class="control-label" style="font-size: 14pt"><b>DESCUENTO</b></label>
                            <input style="font-size: 18pt;" type="number" step="any" id="descuento"
                                   name="descuento"
                                   class="form-control" value="0.00"/>
                        </div>
                    </div>
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
                        <div class="info-box-content">

                            <span class="info-box-text" style="font-size: 14pt"><b>TOTAL</b></span>
                            <span class="info-box-number">
                          <input readonly style="border:0px; font-size: 18pt; background-color: transparent"
                                 type="number"
                                 step="any" id="total_as" name="total_as"
                                 class="form-control" value="0.00"/></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

                    <button id="btn_registrar" name="btn_registrar"
                            class="btn btn-block btn-primary">
                        <i class="fa fa-save"></i> Registrar
                        Curso
                    </button>
                </div>
            </form>
    </section>
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



<!-- REGISTRO DE AULA -->
<div id="modal_registro_aula" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h5 class="panel-heading cabecera_frm bg-primary" style="color: white"><b> REGISTRO DE
                            AULA</b>
                    </h5></center>
            </div>
            <form id="frm_registro_aula" class="form-horizontal"
                  action="<?= site_url('persona/registrar_aula') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label text-right"><b>AULA</b></label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="nombre_aula" name="nombre_aula"
                                   value="" autofocus
                                   placeholder="Campo requerido"/>
                            <input id="type_data" name="type_data" value="0" hidden>
                        </div>
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                    <a id="btn_cerrar_modal_aula" class="btn btn-danger" data-dismiss="modal"><i
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

<script src="<?= base_url('js-sistema/PersonaCurso.js') ?>"></script>
<script src="<?= base_url('js-sistema/Persona.js') ?>"></script>
<script>

    var count = 0;
    function agregar_fila() {

        if ($('#nombre_estudiante').val() === '') {
            swal('No puede agregar item en blanco.');
            return;
        }

        if ($('#nombre_estudiante').val() === '') {
            swal('No puede agregar item en blanco.');
            return;
        }
        count = count + 1;
        $('#contador').val(count);
        var frm = $("#frm_registrar_inventario").serialize();
        console.log(frm);
        $.ajax({
            url: site_url + 'personaCurso/agregar',
            data: frm,
            type: 'post',
            success: function (registro) {
                var datos = eval(registro);
                $('#carnet_estudiante').val('');
                $('#lista_inventario tbody').append(datos[0]);
                $('#nombre_estudiante').focus();
                $('#nombre_estudiante').val('');

                eliminar_fila();
                return false;
            }
        });
        return false;
    }



    function eliminar_fila() { //Elimina las filas de la tabla
        $("a.eliminar").click(function () {
            $(this).parents("tr").fadeOut("normal", function () {
                $(this).remove();
                count = count - 1;
                $('#contador').val(count);
            });
        });
    }
</script>
