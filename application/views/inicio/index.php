<?php

$user_data = $this->session->userdata('usuario_sesion');
?>
<style>
    .sombra2 {
        text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
        font-size: 35px;
        font-weight: bold;
        font-family: 'Arial Black';
        text-align: center;
    }
</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="sombra2">BIENVENIDO</h3>
                    <center><h3>Panel de Control</h3></center>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <div class="box-body">


                    <!--inicio-->
                    <?php if ($user_data['cargo'] === '1') { ?>
                        <?php
                        if (isset($cumpleañeros)) {
                            $cantidad = count($cumpleañeros);
                            ?>
                            <!--  <div class="col-lg-6 col-md-6 col-xs-6">
                                  <!--  <div class="small-box  box-success box-solid">-->
                            <!-- <div class="small-box  box-success bg-light-blue ">
                                    <div class="inner">
                                        <h4> <?= $cantidad ?> <?= 'Cumpleañeros este Mes' ?></h4>

                                        <p><?= 'Centro de Alto Rendimiento Estudiantil' ?></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-birthday-cake"></i>
                                    </div>
                                    <a href="<?= site_url() ?>persona/lista_cumple" class="small-box-footer">
                                        <marquee>Ver Cumpleañeros <i class="fa fa-arrow-circle-right"></i>
                                        </marquee>
                                    </a>
                                </div>
                            </div>-->
                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!--Contenido-->
                            <div class="card">

                                <div class="row clearfix">
                                    <!--<center><h4>Tomar en cuenta los mensajes del sistema</h4></center>-->
                                </div>

                            </div>
                            <!--para que sea responsiva la imagen-->
                            <style>
                                img {
                                    width: 25%;
                                    height: auto;
                                }
                            </style>
                            <?php if ($user_data['cargo'] != '1') { ?>
                            <div class="row clearfix" align="center">
                                <div class="image">
                                    <img src="<?= base_url('assets/img/logo.png') ?>" width="600" height="435"/>
                                </div>
                            </div>
                            <?php } ?>
                            <!--Fin Contenido-->


                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <!-- Info boxes -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <?php if ($user_data['cargo'] === '1') { ?>
                                    <?php
                                    if (isset($deudas)) {
                                        $cantidad = count($deudas);
                                        ?>
                                        <div class="box box-warning box-solid">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">DEUDAS POR COBRAR</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool"
                                                            data-widget="collapse"><i
                                                                class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="icon">
                                                    <h2 style="margin-top: 0%; margin-bottom: 0%"><i
                                                                style="font-size: 30pt"
                                                                class="fa fa-compress"></i>
                                                        Cantidad de
                                                        deudas del mes por cobrar
                                                        <?= $cantidad ?>.</h2>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <?php if ($user_data['cargo'] === '1') { ?>
                                                    <a style="color: black"
                                                       href="<?= site_url('reporte/reporte_pagos') ?>">
                                                        Ver lista de Deudas
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <?php if ($user_data['cargo'] === '1') { ?>
                                    <?php
                                    if (isset($cumpleañeros)) {
                                        $cantidad = count($cumpleañeros);
                                        ?>
                                        <div class="box box-success box-solid">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">CUMPLEAÑEROS DEL MES</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool"
                                                            data-widget="collapse"><i
                                                                class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="icon">
                                                    <h2 style="margin-top: 0%; margin-bottom: 0%"><i
                                                                style="font-size: 30pt"
                                                                class="fa fa-user"></i>
                                                        Este
                                                        mes <?= $cantidad ?> Docente(s) cumplen años </h2>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <?php if ($user_data['cargo'] === '1') { ?>
                                                    <a style="color: black"
                                                       href="<?= site_url('persona/lista_cumple') ?>">
                                                        Ver lista de cumpleañeros
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>


                            </div>
                        </div>
                    </section>


                </div>
            </div>
        </div>
    </div>



