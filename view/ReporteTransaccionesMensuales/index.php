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
                                <h3>Reporte de transacciones mensuales</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../Home/">Home</a></li>
                                    <li class="active">Reporte de transacciones mensuales</li>
                                </ol>
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
                                <th>#</th>
                                <th><i class="bi bi-person-rolodex"></i> Fecha transacción </th>
                                <th><i class="bi bi-person-rolodex"></i> Tipo de cliente </th>
                                <th><i class="bi bi-input-cursor-text"></i> Identidad del cliente </th>
                                <th><i class="bi bi-input-cursor-text"></i> Nombre del cliente </th>
                                <th><i class="bi bi-input-cursor-text"></i> Código agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Nombre agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Canal de servicio </th>
                                <th><i class="bi bi-input-cursor-text"></i> Código transacción </th>
                                <th><i class="bi bi-input-cursor-text"></i> Nombre transacción </th>
                                <th><i class="bi bi-input-cursor-text"></i> Código motivo transacción </th>
                                <th><i class="bi bi-input-cursor-text"></i> Nombre motivo transacción </th>
                                <th><i class="bi bi-input-cursor-text"></i> Monto de transacción </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th><i class="bi bi-person-rolodex"></i> Fecha transacción </th>
                                <th><i class="bi bi-person-rolodex"></i> Tipo de cliente </th>
                                <th><i class="bi bi-input-cursor-text"></i> Identidad del cliente </th>
                                <th><i class="bi bi-input-cursor-text"></i> Nombre del cliente </th>
                                <th><i class="bi bi-input-cursor-text"></i> Código agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Nombre agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Canal de servicio </th>
                                <th><i class="bi bi-input-cursor-text"></i> Código transacción </th>
                                <th><i class="bi bi-input-cursor-text"></i> Nombre transacción </th>
                                <th><i class="bi bi-input-cursor-text"></i> Código motivo transacción </th>
                                <th><i class="bi bi-input-cursor-text"></i> Nombre motivo transacción </th>
                                <th><i class="bi bi-input-cursor-text"></i> Monto de transacción </th>
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