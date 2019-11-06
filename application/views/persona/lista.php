<?php

?>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">Cédula</th>
        <th class="text-center">Nombre Persona</th>
        <th class="text-center">Teléfono</th>
        <th class="text-center">Correo</th>

    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($clientes as $row) {
        ?>
        <tr>
            <td><?= $row->ci ?></td>
            <td><?= ucwords(strtolower($row->docente)) ?></td>
            <td><?= $row->telefono ?></td>
            <td><?= $row->correo ?></td>
            <!-- <td><?= date('d/m/Y', strtotime($row->fechaNacimiento)) ?></td>-->
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
