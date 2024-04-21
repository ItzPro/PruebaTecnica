<header class="site-header">
    <div class="container-fluid">


        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="../../recursos/Grande.png" alt="">
            <img class="hidden-lg-up" src="../../recursos/Pequeno.png" alt="">
        </a>

        <!-- Esto es el boton que permite mostrar y ocultar el sidebar -->

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>

        <!-- --------------------------------------------------------- -->

        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">

                    <!-- Derecha -------------------------------------------------- -->

                    <div class="dropdown user-menu">
                        <span class="lblcontactonomx"><?php echo $_SESSION["nombreUsuario"] ?> </span>
                    </div>
                    <!-- Usuario -------------------------------------------------- -->
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../public/img/avatar-2-64.png" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Configuracion</a>
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Logout/logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesion</a>
                        </div>
                    </div>
                    <!-- --------------------------------------------------------- -->

                    <!-- Derecha -------------------------------------------------- -->

                    <!-- Corre toda la barra superior a la derecha por si la pagina es muy pequeña -->
                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                    <!-- ------------------------------------------------------------------------- -->

                </div><!--.site-header-shown-->

                <div class="mobile-menu-right-overlay"></div>
                <input type="hidden" id="user_idx" value="<?php echo $_SESSION["idUsuario"] ?>">

                <div class="site-header-collapsed">
                    <div class="site-header-collapsed-in">
                        <div class="dropdown dropdown-typical">
                            <!-- Izquierda -------------------------------------------------- -->

                            <h1>Prueba Tecnica - Gabriel Cruz </h1>

                            <!-- Izquierda -------------------------------------------------- -->
                        </div><!--.site-header-collapsed-in-->
                    </div><!--.site-header-collapsed-->
                </div><!--site-header-content-in-->
            </div><!--.site-header-content-->
        </div><!--.container-fluid-->
</header><!--.site-header-->