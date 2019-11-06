<?php

?>
<section class="content">
    <div class="row">
        <form id="frm_editar_usuario" class="form-horizontal"
              action="<?= site_url('usuario/editar_usuario') ?>" method="post">
            <?php
            $this->load->view('usuario/formulario');
            ?>
        </form>
    </div>
</section>
<script src="<?= base_url('js-sistema/usuario.js') ?>"></script>
