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
                                <h3>Mantenimiento agencias</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../Home/">Home</a></li>
                                    <li class="active">Mantenimiento agencias</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">
                    <button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo registro</button>
                    <table id="tbl_general" name="tbl_general" class="display nowrap table table-striped table-bordered" style="width:100%">
                        <!---------------------------------------------------------------------------------------------------------------------------------------->
                        <thead class="text-center">
                            <!---------------------------------------------------------------------------------------------------------------------------------------->
                            <!---------------------------------------------------------------------------------------------------------------------------------------->
                            <tr>
                                <th>#</th>
                                <th><i class="bi bi-person-rolodex"></i> ID canal servicio </th>
                                <th><i class="bi bi-person-rolodex"></i> Código de agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Dirección de agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Teléfono de agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Fecha de registro </th>
                                <th><i class="bi bi-input-cursor-text"></i> Fecha de modificación </th>
                                <th><i class="bi bi-input-cursor-text"></i> Usuario que lo registró </th>
                                <th><i class="bi bi-pencil-fill"></i> Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th><i class="bi bi-person-rolodex"></i> ID canal servicio </th>
                                <th><i class="bi bi-person-rolodex"></i> Código de agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Dirección de agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Teléfono de agencia </th>
                                <th><i class="bi bi-input-cursor-text"></i> Fecha de registro </th>
                                <th><i class="bi bi-input-cursor-text"></i> Fecha de modificación </th>
                                <th><i class="bi bi-input-cursor-text"></i> Usuario que lo registró </th>
                                <th><i class="bi bi-pencil-fill"></i> Editar</th>
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

        <?php require_once("modalGeneral.php"); ?>

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