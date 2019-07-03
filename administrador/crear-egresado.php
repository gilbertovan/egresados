<?php
include_once'../funciones/sesiones.php';
include_once'../recursos/conexion.php';
include_once'templates/header.php';
include_once'templates/barra.php';
include_once'templates/navegacion.php';
?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-10">
      <section class="content"> 
        <h1 class="titulosH">Registro de egresados</h1>
        <div class="box">
          <div class="box-body">
          <p><li>La contraseña únicamente acepta letras sin acentos y número</li>
            <li> Los nombres de usuarios y correos electrónicos no pueden ser repetidos.</li><br> </p> 
              <form role="form" name="agregar_egresado" id="agregar_egresado" method="POST"  action="insertar-admin.php">
                
                <div class="form-group">
                  <label for="nombreAdmin">NOMBRE</label>
                  <input  type="text" class="form-control resp" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="usuarioAdmin">APELLIDOS</label>
                  <input  type="text" class="form-control resp" id="apellido" name="apellido" placeholder="apellidos " required>
                </div>
                <div class="form-group">
                  
                  <label for="usuarioAdmin">USUARIO</label>
                  <input  type="trxt" class="form-control resp2" id="usuario" name="usuario" placeholder="Usuario" required>
                   <div id="result-usuario"></div>
                             
                </div>
                <div class="form-group">
                  <label for="usuarioAdmin">CORREO ELECTRONICO</label>
                  <input  type="email" class="form-control resp" id="email" name="email" placeholder="Correo electronico" required>
                   <div id="result-email"></div>
                </div>
                <div class="form-group"> 
                  <label for="password">CONTRASEÑA</label>
                  <input type="password" class="form-control resp2" id="clave" name="clave" minlength="8"  placeholder="Contraseña" required>
                  <input type="password" class="form-control resp2" id="repetir_clave" name="repetir_clave" minlength="8" placeholder="Repetir contraseña"required >
                  <span id="resultado_clave" class="help-block"></span>
                </div>

                <input type="hidden" name="editado" value="2019-05-08 13:36:37">
                
               
                <div class="box-footer">
                  <input type="hidden"name="agregar_egresado">
                  <button type="submit" id="crear_registro" class="btn btn-primary" >Registrar</button>
                </div>
            </form>
          </div>
        </div>
      </section> 
    </div>
  </div>
</div>
<?php
 include_once'templates/footer.php';
?>

