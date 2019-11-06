<?php
$index = 0;
$array_seleccionados = array();
$array_lista_nivel = array();

if (isset($usuario)) {
    foreach ($funciones_seleccionadas['seleccionados'] as $fila) {
        $array_seleccionados[$index] = $fila->id;
        $index++;
    }
    $index = 0;
    foreach ($niveles_seleccionados as $fila_datos) {
        $array_lista_nivel[$index] = $fila_datos->id;
        $index++;
    }

}
?>
<div>
    <div class="box-body" >
        <div class="col-sm-8">
            <input type="text" id="id_cliente" name="id_cliente" value="<?= isset($curso) ? $curso->id : '' ?>"
                   hidden>

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">NOMBRE DEL CURSO *</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nombre_curso" name="nombre_curso"
                   value="<?= isset($curso) ? $curso->nombre : '' ?>"
                   placeholder="Escriba el nombre del curso">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">DESCRIPCIÓN</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="descripcion_curso" name="descripcion_curso"
                   value="<?= isset($curso) ? $curso->descripcion : '' ?>"
                   placeholder="Escriba una descripcion del curso">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">FECHA INICIO</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?= $fecha_actual ?>"
                   
            >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">FECHA FIN</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?= $fecha_actual ?>"     
            >
        </div>
    </div>
    <div class="form-group" id="div_nivel" >
        <label class="col-md-3 control-label text-right"><b>NIVEL DEL CURSO</b></label>
        <div class="col-lg-9">
            <div class="checkbox">
                <?php
                foreach ($nivel as $row) {
                    if (in_array($row->id, $array_lista_nivel)) {
                        ?>
                        <label class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <input id="seleccion_Nivel" name="seleccion_Nivel[]"
                                   type="checkbox"
                                   checked="checked"
                                   value="<?= $row->id ?>"> <?= $row->nombre ?>
                        </label>
                        <?php
                    } else {
                        ?>
                        <label class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <input id="seleccion_Nivel" name="seleccion_Nivel[]"
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
            <span style="color: red"><em><b>Seleccione un nivel.</b></em></span>
        </div>
    </div>

    <div class="col-lg-offset-1 col-lg-10">
        <div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-info"></i> Aviso!</h4>
            Los campos con (*) son requidos.
        </div>
    </div>
</div>
<div class="box-footer text-center">
    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
    <a href="<?= site_url('curso/index') ?>" class="btn btn-danger"><i class="fa fa-times"></i>
        Salir</a>
</div>
