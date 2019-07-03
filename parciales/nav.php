<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <!-- Logo y boton de expander y colapsar los enlaces -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#enlaces">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand"><b>Plataforma de Egresados ITIstmo</b></a>
            </div><!-- /Logo y boton de expander y colapsar los enlaces -->

            <!-- Enlaces de navgacion -->
            <div class="collapse navbar-collapse navbar-right" id="enlaces">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Principio</a></li>
                    <li><a href="http://itistmo.mx/" target="_blank">Nosotros</a></li> <!-- target="_self" -->
                    

                    <?php
                        if(isset($_SESSION['usuario'])){
                            echo '
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        '.$_SESSION['usuario']['Usuario'].' <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                    <li><a href="mostrar.php">Ver perfil</a></li>
                                        <li><a href="logout.php">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            ';
                        }
                        else{
                            echo '
                                <li><a href="registro.php">Registro</a></li>
                                <li><a href="login.php">Inicia sesión</a></li>
                                <li><a href="loginadmin.php">Administrador</a></li>
                                
                                
                            ';
                        }
                    ?>

                </ul>
            </div><!-- /Enlaces de navgacion -->
        
        </div>
    </nav>