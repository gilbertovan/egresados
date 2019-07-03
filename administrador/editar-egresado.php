<?php
include_once'../funciones/sesiones.php';
include_once'../recursos/conexion.php';
$id = $_GET['id'];
if (!filter_var($id, FILTER_VALIDATE_INT)) {
  die("ERROR");
}
include_once'templates/header.php'; 
include_once'templates/barra.php';
include_once'templates/navegacion.php';  
?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-10">
      <section class="content"> 
        <h1 class="titulosH" >editar egresado</h1>
        <div class="box">
          <div class="box-body">
          <p> <li> Los nombres de usuarios y correos electrónicos no pueden ser repetidos.</li><br> </p> 
             <?php  $sql ="SELECT * FROM `perfiles` WHERE `Id` = $id";
            $resultado = $con->query($sql);
            $perfiles = $resultado->fetch_assoc();?>  
              <form role="form" name="guardar-regis"  id="guardar-regis" method="POST"  action="model-egresado.php" >
                
                <div class="form-group">
                  <label for="nombre">NOMBRE</label>
                  <input  type="text" class="form-control resp"  id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $perfiles['Nombre'] ?>">
                </div>
                <div class="form-group">
                  <label for="apellido">PELLIDOS</label>
                  <input  type="text" class="form-control resp" id="apellido" name="apellido" placeholder="apellidos " value="<?php echo $perfiles['Apellido'] ?>">
                </div>
                <div class="form-group">
                  <label for="usuario">USUARIO</label>
                  <input  type="text" class="form-control resp2" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $perfiles['Usuario'] ?>">
                    <div id="result-usuario"></div>

                </div>
                <div class="form-group">
                  <label for="correo">CORREO ELECTRONICO</label>
                  <input  type="tel" class="form-control resp" id="email" name="email" placeholder="Correo electronico" value="<?php echo $perfiles['Email'] ?>">
                  <div id="result-email"></div>

                </div>
                <div class="form-group"> 

                  <label for="password">CONTRASEÑA</label>
                  <input type="password" class="form-control resp2" minlength="8" id="clave" name="clave" placeholder="Contraseña">
                  <input type="password" class="form-control resp2" minlength="8" id="repetir_clave" name="repetir_clave" placeholder="Repetir contraseña">
                  <span id="resultado_clave" class="help-block"></span>
                   <p><li>Únicamente acepta letras sin acentos y números  </li></p>
                </div>
               
                <div class="box-footer">
                <input type="hidden" name="regis" value="actualizar">
                <input type="hidden" name="Id" value="<?php echo $id; ?>"> 
                <button type="submit"  class="btn btn-primary" >Guardar</button>
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

