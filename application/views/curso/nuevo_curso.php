<?php

?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <center><h2 class="box-title"><i class="fa fa-address-book-o fa-2x"></i><b> REGISTRA LOS DATOS DE UN
                                CURSO</b></h2></center>
                </div>
                <form id="frm_registrar_curso" action="<?= site_url('curso/registrar_curso') ?>" method="post"
                      class="form-horizontal">
                    <?php $this->view('curso/formulario') ?>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>




<script src="<?= base_url('js-sistema/curso.js') ?>"></script>

