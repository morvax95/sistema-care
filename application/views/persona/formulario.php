<?php
$index = 0;
$array_seleccionados = array();
$array_lista_profesion = array();

if (isset($usuario)) {
    foreach ($funciones_seleccionadas['seleccionados'] as $fila) {
        $array_seleccionados[$index] = $fila->id;
        $index++;
    }
    $index = 0;
    foreach ($profesioones_s_seleccionadas as $fila_profesiones) {
        $array_lista_profesion[$index] = $fila_profesiones->id;
        $index++;
    }

}
?>
<script language="javascript" type="text/javascript">
    function valida_campos(tx) {
//        var nombre = $('#nombre_persona').val();
        if (tx == "") {
            swal('Ingrese el nombre de la persona');
            document.getElementById('nombre_persona').value = "";
        }

    }

</script>
<div>
    <div class="box-body">
        <div class="col-sm-8">
            <input type="text" id="id_cliente" name="id_cliente" value="<?= isset($cliente) ? $cliente->id : '' ?>"
                   hidden>

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">CÉDULA DE IDENTIDAD </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="ci_nit" name="ci_nit"
                   value="<?= isset($cliente) ? $cliente->ci : '' ?>"
                   placeholder="Escriba nro de carnet de identidad">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">NOMBRE PERSONA*</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nombre_persona" name="nombre_persona"
                   value="<?= isset($cliente) ? $cliente->nombre : '' ?>"
                   placeholder="Escriba el nombre completo">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">APELLIDO PATERNO</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno"
                   value="<?= isset($cliente) ? $cliente->apellidoPaterno : '' ?>"
                   placeholder="Escriba el Apellido Paterno">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">APELLIDO MATERNO</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno"
                   value="<?= isset($cliente) ? $cliente->apellidoMaterno : '' ?>"
                   placeholder="Escriba el Apellido Materno">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">CELULAR / TELÉFONO *</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="telefono" name="telefono"
                   value="<?= isset($cliente) ? $cliente->telefono : '' ?>"
                   placeholder="Escriba el nro de telefono o celular">
        </div>
    </div>
    <div class="form-group" id="div_genero">
        <label class="col-sm-3 control-label" for="cboTipo">GÉNERO </label>
        <div class="col-sm-8">
            <select type="text" class="form-control" id="genero"
                    name="genero"
                    value="<?= isset($cliente) ? $cliente->genero : '' ?>"
            >
                <option value="0">::ELIJA UNA OPCIÓN</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
            </select>

        </div>
    </div>
    <div class="form-group" div="div_rol">
        <label class="col-sm-3 control-label" for="cboTipo">ROL PERSONA </label>
        <div class="col-sm-8">
            <select id="rol_persona" name="rol_persona" class="form-control" required>
                <option value="0">::ELIJA UNA OPCIÓN</option>
                <?php
                foreach ($rol as $row) {

                    ?>
                    <option value="<?= $row->id ?>" <?= is_selected($row->id, isset($row) ? $row->nombre : null) ?>><?= $row->nombre ?></option>
                    <?php

                }
                ?>
            </select>
            <a style="color: orange;" href="#modal_registro_rol" data-toggle="modal"><i
                        class="fa fa-plus-square"></i> Agregar una nuevo Rol</a>
        </div>

    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">CORREO ELECTRÓNICO</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="correo" name="correo"
                   value="<?= isset($cliente) ? $cliente->correo : '' ?>"
                   placeholder="Ingrese un correo electronico">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">FECHA NACIMIENTO</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                   value="<?= $fecha_actual ?>"
                   value="<?= isset($cliente) ? $cliente->fechaNacimiento : '' ?>"
            >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">DIRECCIÓN DOMICILIO</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="direccion" name="direccion"
                   value="<?= isset($cliente) ? $cliente->direccion : '' ?>"
                   placeholder="Ingrese la direccion actual de su domicilio">
        </div>
    </div>

    <div class="form-group" id="div_profesion" hidden>
        <label class="col-md-3 control-label text-right"><b>PROFESIÓN</b></label>
        <div class="col-lg-9">
            <div class="checkbox">
                <?php
                foreach ($profesion as $row) {
                    if (in_array($row->id, $array_lista_profesion)) {
                        ?>
                        <label class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <input id="seleccion_profesion" name="seleccion_profesion[]"
                                   type="checkbox"
                                   checked="checked"

                                   value="<?= $row->id ?>"> <?= $row->nombre ?>
                        </label>
                        <?php
                    } else {
                        ?>
                        <label class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <input id="seleccion_profesion" name="seleccion_profesion[]"
                                   type="checkbox"
                                   value="<?= $row->id ?>"> <?= $row->nombre ?>
                        </label>
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
            </div>
            <br>
            <br>
            <span style="color: red"><em><b>Seleccione al menos una opción en profesión.</b></em></span>
        </div>
    </div>


    <div class="col-lg-offset-1 col-lg-10">
        <div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-info"></i> Aviso!</h4>
            Los campos con (*) son requidos.
        </div>
    </div>
</div>
<center>
    <div class="box-footer text-center">
        <button type="submit" id="btn_registrar_usuario" class="btn btn-primary"
                onClick="valida_campos(this.form.nombre_persona.value)"><i class="fa fa-save"></i> Guardar
        </button>

        <a href="<?= site_url('persona/index') ?>" class="btn btn-danger"><i class="fa fa-times"></i>
            Salir</a>
    </div>
</center>

