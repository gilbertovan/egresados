<?php
     require_once('recursos/conexion.php');
    
    $titulo = 'Inicia Sesión | Administrador';
    require_once('parciales/arriba.php');
    require_once('parciales/nav.php');
   ?>

         <div class="container" id="pagina-login">
    <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <h1 class="titulo-de-pagina">inicia Sesión</h1>
                <h4 class="titulo-de-pagina">Administrador</h4>
                <form  name="login-admin-form" id="login-admin" method="POST" action="administrador/login-admins.php">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" id="usuarioAdmin" name="usuarioAdmin" value="" placeholder="Nombre De Usuario">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="password" class="form-control input-lg" name="password" placeholder="Contraseña">  
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" name="login-admin" value="1">
                            <button type="submit"  class="btn btn-success btn-lg btn-block" >Iniciar</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="index.php" class="btn btn-danger btn-lg btn-block" tabindex="4">Cancelar</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>  
    </div>
<?php
    require_once('parciales/abajo.php');
?>