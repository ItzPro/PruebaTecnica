<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["idUsuario"])) {
?>
    <!DOCTYPE html>
    <html>

    <head lang="en">
        <?php require_once("../MainHead/head.php"); ?>
        <title>Sistema de registro PHP :: Inicio</title>
    </head>

    <body class="with-side-menu">

        <?php require_once("../MainHeader/header.php"); ?>



        <div class="mobile-menu-left-overlay"></div>

        <?php require_once("../MainNav/nav.php"); ?>

        <!-- Contenido -->
        <div class="page-content">
            <div class="container-fluid">


                <div class="box-typical box-typical-padding">

                    <h1>Bienvenido</h1>
                    <h3>Por favor utilice los botones del menú lateral para acceder a las diferentes opciones del sistema.</h3>
                </div>

            </div>
        </div>
        <!-- Contenido -->


        <?php require_once("../MainJS/js.php"); ?>
        <script type="text/javascript" src="home.js"></script>
    </body>

    </html>

<?php
} else {
    $conexion = new Conectar();
    header("Location:" . $conexion->ruta() . "index.php");
}
?>