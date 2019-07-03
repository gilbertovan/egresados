<?php 
    session_start();
    if(isset($_SESSION['usuario'])){header('Location: index.php');}
    require_once('funciones/funciones.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ficha']) && validar_ficha($_POST['ficha'])){
        if(!empty($_POST['miel'])){return header('Location: index.php');}
        $campos = [
            'nombre' => 'Nombre(s)',
            'apellido' => 'Apellidos',
            'usuario' => 'Nombre de Usuario',
            'email' => 'Correo electrónico',
            'clave' => 'Contraseña',
            'reclave' => 'Re-Contraseña',
            'terminos' => 'Terminos y Condiciones'
        ];
        $errores = validar($campos);
        $errores = array_merge($errores, comparadorDeClaves($_POST['clave'], $_POST['reclave']));
        if(empty($errores)){$errores = registro();}
    }
    $titulo = 'Plataforma de Egresados | Registro';
    require_once('parciales/arriba.php');
    require_once('parciales/nav.php');
    require_once('recursos/conexion.php');
?>

    <div class="container" id="pagina-registro">
        <div class="row">
             <h1 class="titulo-de-pagina">Regístrate</h1>
            <center> <p class="registro"> o <a  href="login.php">Inicia sesión</a></center> </p>
            <h2>Regístrate <small>para formar parte de nuestra comunidad de egresados del <b>ITIstmo</b></small></h2>
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                

                <?php if(!empty($errores)){echo mostrarErrores($errores);} ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="formulario-registro">
                    <input type="hidden" name="ficha" value="<?php echo ficha_csrf(); ?>">
                    <input type="hidden" name="miel" value="">
                    <input type="hidden" name="editado" value="2019-05-08 13:36:37">
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

                    <div class="row">
                        <div class="col-sm-3">
                            <label class="btn btn-primary btn-lg btn-block">
                                <input type="checkbox" name="terminos" tabindex="7" <?php if(isset($_POST['terminos'])){echo "checked='checked'";} ?>>
                                Acepto
                            </label>
                        </div>
                        <div class="col-sm-9">
                           <h4><b>Al registrarse acepta todos los <a href="pdf/terminosycondiciones.pdf" target="_blank">términos y condiciones</a>.</b></h4>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-lg btn-block" name="registroBtn" tabindex="8">Registrar</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="index.php" class="btn btn-danger btn-lg btn-block" tabindex="9">Cancelar</a>
                        </div>
                    </div>

                </form><!-- /Formulario de registro -->
            </div>
        </div>        
    </div>
<?php
 
    require_once('parciales/abajo.php');
?>