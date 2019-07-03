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

<script type="text/javascript">
   
</script>
<div class="content-wrapper"> 
  <div class="row">
    <div class="col-md-8">
      <section class="content">
        <h1 class="titulosH">editar cuenta de administrador</h1>          
        <div class="box">    
          <div class="box-body">
           <p> <li> Administrador principal: nivel  1</li>
           <li> Administrador secundario: nivel 2</li>
           <li>Los nombres de ususarios no pueden ser repetidos</li><br> </p>


             <?php  $sql ="SELECT * FROM `admins` WHERE `id_admin` = $id";
            $resultado = $con->query($sql);
             $admin = $resultado->fetch_assoc();
            ?> 
            <form role="form" name="editar-admin" id="editar-admin" method="POST"   action="modelo-admin.php">
              
             <div class="form-group">
                    <label for="usuarioAdmin">USUARIO</label>
                    <input type="text" class="form-control resp" id="usuarioAdmin" name="usuarioAdmin" placeholder="ususario"  value="<?php echo $admin['usuarioAdmin'] ?>" required>
                    <br>
                   
                <div id="result-usuarioAdmin"></div>
              </div>
              <div class="form-group">
                <label for="nombreAdmin">NOMBRE</label>
                <input  type="text" class="form-control resp" id="nombreAdmin" name="nombreAdmin" placeholder="Nombre completo" value="<?php echo $admin['nombreAdmin'] ?>" required>
              </div>
                  <div class="form-group">
                  <label for="nombreAdmin">APELLIDOS</label>
                  <input  type="text" class="form-control resp" id="apAdmin" name="apAdmin" placeholder="Nombre completo" required value="<?php echo $admin['apAdmin'] ?>">
                </div>

               
              <div class="form-group">
                <label for="nivel">NIVEL</label>
                <input  type="number" class="form-control resp3" id="nivel" name="nivel"  placeholder="Nivel del administrador" value="<?php echo $admin['nivel']?>" maxlength="1" min="1" max="2" required>
              </div> 
                <div class="form-group">
                <label for="password">CONTRASEÑA</label>
                <input type="password" class="form-control resp2" id="password" name="password" placeholder="password">
                 <input type="password" class="form-control resp2" id="repetir_password" name="repetir_password" placeholder="Repetir contraseña">
                <span id="resultado_password" class="help-block"></span>
              </div>
              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?php echo $id; ?>"> 
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