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
        <h1 class="titulosH">Registrar administrador</h1>
        <div class="box">
          <div class="box-body">  
            <p><li> Administrador principal: nivel  1</li>
            <li> Administrador secundario: nivel 2</li>
            <li>Los nombres de ususarios no pueden ser repetidos</li><br> </p>
            <form role="form" name="agregar-admin" id="agregar-admin" method="POST"  action="insertar-admin.php">
               <div class="form-group">
                    <label for="usuarioAdmin">Usuario</label>
                    <input type="text" class="form-control resp" id="usuarioAdmin" name="usuarioAdmin" placeholder="ususario">
                    <br>
                   
                    <div id="result-usuarioAdmin"></div>
                </div>
                <div class="form-group">
                  <label for="nombreAdmin">NOMBRE</label>
                  <input  type="text" class="form-control resp" id="nombreAdmin" name="nombreAdmin" placeholder="Nombre" required>
                </div>
                    <div class="form-group">
                  <label for="apAdmin">APELLIDO</label>
                  <input  type="text" class="form-control resp" id="apAdmin" name="apAdmin" placeholder="Apellido" required>
                </div>
               
                <div class="form-group"> 
                  <label for="password">CONTRASEÑA</label>
                  <input type="password" class="form-control resp2" id="password" name="password" minlength="4" placeholder="Contraseña" required>
                  <input type="password" class="form-control resp2" id="repetir_password" name="repetir_password" minlength="4" placeholder="Repetir contraseña" required>
                  <span id="resultado_password" class="help-block"></span>
                </div>
                   <div class="form-group">
                  <label for="nivel">NIVEL</label>
                  <input  type="number" class="form-control resp3" id="nivel" name="nivel" placeholder="Nivel del administrador"  maxlength="1" min="1" max="2" required>
                </div>
                   
                
                 <input type="hidden" name="editado" value="2019-05-08 13:36:37">
                
                <div class="box-footer">
                  <input type="hidden"  name="agregar-admin">

                  <button type="submit"   id="crear_registro" class="btn btn-primary" >Registrar</button>
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

