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

    <div class="container" id="pagina-mostrar">
        <div class="row">
            <h1 class="titulo-de-pagina">Datos del perfil</h1>
            <br>
            
            <br>
            
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <?php if(!empty($errores)){echo mostrarErrores($errores);} ?>
                <form method="POST" id="formulario-mostrar">
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
                                        <?php
                                        require_once('recursos/conexion.php');
                                        try{
                                            $sql ="SELECT * FROM `perfiles` WHERE `Id` = $id_user";
                                            $resultado = $con->query($sql);
                                              
                                        }catch(exeption $e){
                                            $error=$e->getMessage();
                                            echo $error;
                                        }
                                        $user1 = $resultado->fetch_assoc();
                                      ?>
                                        <label type="text" class="form-control input-lg" name="nombre"> &nbsp; &nbsp;&nbsp;<?php echo $user1['Nombre'];?></label>
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
                                        <label type="text" class="form-control input-lg" name="apellido" tabindex="2"> &nbsp; &nbsp;&nbsp;<?php echo $user1['Apellido'] ?></label>
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
                                        <label type="text" class="form-control input-lg" name="usuario" tabindex="3">&nbsp; &nbsp;&nbsp;<?php echo ($user1['Usuario'])?></label>
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
                                        <label type="text" class="form-control input-lg" name="email"  tabindex="4">&nbsp; &nbsp;&nbsp;<?php echo ($user1['Email'])?></label>
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

                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <center><a href="editar_perfil.php" class="btn btn-success btn-lg btn-block" name="registroBtn" tabindex="7">Editar perfil</a></center>
                        </div>
                        <div class="col-sm-6">
                            <a href="index.php" class="btn btn-danger btn-lg btn-block" tabindex="8">Principio</a>
                            <br>  
                        </div>
                    </div>
                </form><!-- /Formulario de registro -->
            </div>
        </div>        
    </div>
<?php

    require_once('parciales/abajo.php');
?>