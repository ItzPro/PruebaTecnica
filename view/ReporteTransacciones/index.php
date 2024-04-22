<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["idUsuario"])) {
?>
    <!DOCTYPE html>
    <html>
    <?php require_once("../MainHead/head.php"); ?>
    <title>Prueba Practica:: Gabriel Cruz</title>
    </head>

    <body class="with-side-menu">

        <?php require_once("../MainHeader/header.php"); ?>

        <div class="mobile-menu-left-overlay"></div>

        <?php require_once("../MainNav/nav.php"); ?>

        <!-- Contenido -->
        <div class="page-content">
            <div class="container-fluid">
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Reporte De Transacciones</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../Home/">Home</a></li>
                                    <li class="active">Reporte De Transacciones</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>



                <div class="container-fluid">
                    <header class="section-header">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <h3>Reporte De Transacciones del Dia</h3>

                                </div>
                            </div>
                        </div>
                    </header>

                    <div class="box-typical box-typical-padding">
                        <!-- <button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button> -->
                        <table id="tbl_general" name="tbl_general" class="display nowrap table table-striped table-bordered" style="width:100%">
                            <!---------------------------------------------------------------------------------------------------------------------------------------->
                            <thead class="text-center">
                                <!---------------------------------------------------------------------------------------------------------------------------------------->
                                <!---------------------------------------------------------------------------------------------------------------------------------------->
                                <tr>
                                    <th style="text-transform: capitalize;">#</th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Fecha Transaccion </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Tipo de Cliente </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Identidad del Cliente </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre del Cliente </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Agencia </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Agencia </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Canal de Servicio </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Transacción </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Transacción </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Motivo Transacción </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Motivo Transacción </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Monto de Transacción </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="text-transform: capitalize;">#</th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Fecha Transaccion </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Tipo de Cliente </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Identidad del Cliente </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre del Cliente </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Agencia </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Agencia </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Canal de Servicio </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Transacción </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Transacción </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Motivo Transacción </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Motivo Transacción </th>
                                    <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Monto de Transacción </th>
                                </tr>
                                <!---------------------------------------------------------------------------------------------------------------------------------------->
                                <!---------------------------------------------------------------------------------------------------------------------------------------->
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="container-fluid">
                        <header class="section-header">
                            <div class="tbl">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <h3>Reporte De Transacciones De La Semana</h3>

                                    </div>
                                </div>
                            </div>
                        </header>

                        <div class="box-typical box-typical-padding">
                            <!-- <button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button> -->
                            <table id="tbl_generalsemana" name="tbl_generalsemana" class="display nowrap table table-striped table-bordered" style="width:100%">
                                <!---------------------------------------------------------------------------------------------------------------------------------------->
                                <thead class="text-center">
                                    <!---------------------------------------------------------------------------------------------------------------------------------------->
                                    <!---------------------------------------------------------------------------------------------------------------------------------------->
                                    <tr>
                                        <th style="text-transform: capitalize;">#</th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Fecha Transaccion </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Tipo de Cliente </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Identidad del Cliente </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre del Cliente </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Agencia </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Agencia </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Canal de Servicio </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Transacción </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Transacción </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Motivo Transacción </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Motivo Transacción </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Monto de Transacción </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="text-transform: capitalize;">#</th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Fecha Transaccion </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Tipo de Cliente </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Identidad del Cliente </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre del Cliente </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Agencia </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Agencia </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Canal de Servicio </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Transacción </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Transacción </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Motivo Transacción </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Motivo Transacción </th>
                                        <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Monto de Transacción </th>
                                    </tr>
                                    <!---------------------------------------------------------------------------------------------------------------------------------------->
                                    <!---------------------------------------------------------------------------------------------------------------------------------------->
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <div class="container-fluid">
                            <header class="section-header">
                                <div class="tbl">
                                    <div class="tbl-row">
                                        <div class="tbl-cell">
                                            <h3>Reporte De Transacciones del Mes</h3>

                                        </div>
                                    </div>
                                </div>
                            </header>

                            <div class="box-typical box-typical-padding">
                                <!-- <button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button> -->
                                <table id="tbl_generalmes" name="tbl_generalmes" class="display nowrap table table-striped table-bordered" style="width:100%">
                                    <!---------------------------------------------------------------------------------------------------------------------------------------->
                                    <thead class="text-center">
                                        <!---------------------------------------------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------------------------------------------->
                                        <tr>
                                            <th style="text-transform: capitalize;">#</th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Fecha Transaccion </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Tipo de Cliente </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Identidad del Cliente </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre del Cliente </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Agencia </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Agencia </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Canal de Servicio </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Transacción </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Transacción </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Motivo Transacción </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Motivo Transacción </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Monto de Transacción </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="text-transform: capitalize;">#</th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Fecha Transaccion </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Tipo de Cliente </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Identidad del Cliente </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre del Cliente </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Agencia </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Agencia </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Canal de Servicio </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Transacción </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Transacción </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Motivo Transacción </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Motivo Transacción </th>
                                            <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Monto de Transacción </th>
                                        </tr>
                                        <!---------------------------------------------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------------------------------------------->
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                            <div class="container-fluid">
                                <header class="section-header">
                                    <div class="tbl">
                                        <div class="tbl-row">
                                            <div class="tbl-cell">
                                                <h3>Reporte De Transacciones del Año</h3>

                                            </div>
                                        </div>
                                    </div>
                                </header>

                                <div class="box-typical box-typical-padding">
                                    <!-- <button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button> -->
                                    <table id="tbl_generalano" name="tbl_generalano" class="display nowrap table table-striped table-bordered" style="width:100%">
                                        <!---------------------------------------------------------------------------------------------------------------------------------------->
                                        <thead class="text-center">
                                            <!---------------------------------------------------------------------------------------------------------------------------------------->
                                            <!---------------------------------------------------------------------------------------------------------------------------------------->
                                            <tr>
                                                <th style="text-transform: capitalize;">#</th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Fecha Transaccion </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Tipo de Cliente </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Identidad del Cliente </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre del Cliente </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Agencia </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Agencia </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Canal de Servicio </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Transacción </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Transacción </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Motivo Transacción </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Motivo Transacción </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Monto de Transacción </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th style="text-transform: capitalize;">#</th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Fecha Transaccion </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-person-rolodex"></i> Tipo de Cliente </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Identidad del Cliente </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre del Cliente </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Agencia </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Agencia </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Canal de Servicio </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Transacción </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Transacción </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Código Motivo Transacción </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Nombre Motivo Transacción </th>
                                                <th style="text-transform: capitalize;"><i class="bi bi-input-cursor-text"></i> Monto de Transacción </th>
                                            </tr>
                                            <!---------------------------------------------------------------------------------------------------------------------------------------->
                                            <!---------------------------------------------------------------------------------------------------------------------------------------->
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Contenido -->


                        <?php require_once("../MainJs/js.php"); ?>

                        <script type="text/javascript" src="General.js"></script>


    </body>

    </html>
<?php
} else {
    $conexion = new Conectar();
    header("Location:" . $conexion->ruta() . "index.php");
}
?>