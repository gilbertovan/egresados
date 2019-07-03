<?php 
    session_start();
    require_once('funciones/funciones.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ficha']) && validar_ficha($_POST['ficha'])){
        if(!empty($_POST['miel'])){return header('Location: index.php');}
        $campos = [
            'nombre' => 'Nombre(s)',
            'apellido' => 'Apellidos',
            'usuario' => 'Nombre de Usuario',
            'email' => 'Correo electrónico',
            'clave' => 'Contraseña',
            'reclave' => 'Re-Contraseña'
        ];
        $errores = validar($campos);
        $errores = array_merge($errores, comparadorDeClaves($_POST['clave'], $_POST['reclave']));
        if(empty($errores)){$errores = editar();}
    }
    $titulo = 'Plataforma de Egresados | Registro';
    require_once('parciales/arriba.php');
    require_once('parciales/nav.php');
    require_once('parciales/logo.php');
    require_once('recursos/conexion.php');
?>

    <div class="container" id="pagina-registroE">
        <div class="row">
            <h1 class="titulo-de-pagina">Editar perfil</h1>
            <br>
            <center><h4><b>Si No desea cambiar su contraseña es necesario
                <br><span style="color: red;">ingresar su contraseña actual</span> para guardar todos los cambios.</b></h4></center>
            <br>
            
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <?php if(!empty($errores)){echo mostrarErrores($errores);} ?>
                <!-- <ul class="errores"></ul> -->
                <!-- Formulario de registro -->
                <form method="POST" id="formulario-editar">
                    <input type="hidden" name="ficha" value="<?php echo ficha_csrf(); ?>">
                    <input type="hidden" name="miel" value="">

                    <?php
                        $id_user=$_SESSION['usuario']['Id']; 
                    ?>
                    <input type="hidden" name="ids" value="<?php echo $id_user; ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="campo-contenedor">
                                        <input type="text" class="form-control input-lg" name="nombre" value="<?php campo('nombre')?>" placeholder="Nombre(s)" tabindex="1" autofocus>
                                        <span class="glyphicon icono-derecho"></span>
                                        <span class="glyphicon glyphicon-user icono-izquierdo"></span>
                                    </div>
                                    <div class="input-group-addon" data-toggle="tooltip" data-placement="bottom" title="Nombre(s) de la persona.">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="campo-contenedor">
                                        <input type="text" class="form-control input-lg" name="apellido" value="<?php campo('apellido')?>" placeholder="Apellidos" tabindex="2">
                                        <span class="glyphicon icono-derecho"></span>
                                        <span class="glyphicon glyphicon-user icono-izquierdo"></span>
                                    </div>
                                    <div class="input-group-addon" data-toggle="tooltip" data-placement="bottom" title="Apellidos de la persona.">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="campo-contenedor">
                                        <input type="text" class="form-control input-lg" name="usuario" value="<?php campo('usuario')?>" placeholder="Nombre de Usuario" tabindex="3">
                                        <span class="glyphicon icono-derecho"></span>
                                        <span class="glyphicon glyphicon-user icono-izquierdo"></span>
                                    </div>
                                    <div class="input-group-addon" data-toggle="tooltip" data-placement="bottom" title="Nombre de Usuario que desea usar.">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="campo-contenedor">
                                        <input type="text" class="form-control input-lg" name="email" value="<?php campo('email')?>" placeholder="Correo electrónico" tabindex="4">
                                        <span class="glyphicon icono-derecho"></span>
                                        <span class="glyphicon glyphicon-envelope icono-izquierdo"></span>
                                    </div>
                                    <div class="input-group-addon" data-toggle="tooltip" data-placement="bottom" title="Correo electrónico vigente">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="campo-contenedor">
                                        <input type="password" class="form-control input-lg" name="clave" placeholder="Contraseña" tabindex="5" id="clave">
                                        <span class="glyphicon icono-derecho"></span>
                                        <span class="glyphicon glyphicon-lock icono-izquierdo"></span>
                                    </div>
                                    <div class="input-group-addon" data-toggle="tooltip" data-placement="bottom" title="Contraseña segura para su cuenta.">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="campo-contenedor">
                                        <input type="password" class="form-control input-lg" name="reclave" placeholder="Re-Contraseña" tabindex="6">
                                        <span class="glyphicon icono-derecho"></span>
                                        <span class="glyphicon glyphicon-lock icono-izquierdo"></span>
                                    </div>
                                    <div class="input-group-addon" data-toggle="tooltip" data-placement="bottom" title="Repita la contraseña segura para su cuenta.">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-lg btn-block" name="registroBtn" tabindex="7">Guardar cambios</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="mostrar.php" class="btn btn-danger btn-lg btn-block" tabindex="8">Cancelar</a>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>
<?php
    require_once('parciales/abajo.php');
?>