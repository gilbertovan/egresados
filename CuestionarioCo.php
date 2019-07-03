<?php
require_once('funciones/sesionesE.php');
require_once('recursos/conexion.php');
$titulo = 'Plataforma de Egresados | Cuestionario de Seguimiento de Egresados';
require_once('parciales/arriba.php');
require_once('parciales/nav.php');  
require_once('parciales/logo.php'); 
$id_user =$_SESSION['usuario']['Id']; 
?>
<div class="barraN">
</div>

<div class="barra">
  <p class="contSe"/> Cuestionario de Seguimiento de Egresados/7
  <br>Departamento de Gestión Tecnológica Y Vinculación/IT del Istmo</p>
</div><!-- fin de la barra-->

<div class="barraN"> 
</div>

 
<form autocomplete="off" role="form" name="Comentarios" id="Comentarios" method="POST"  action="tablascuest/comentarios.php">
  <div class="caja colorcues">
    
    <h2 class="may titulosH">VII. Comentarios y sugerencias</h2>
    <hr>
    <br>  
    <div class="colorcues" >


     <input type="hidden" name="usuario" value="<?php echo $id_user; ?>">

      <input type="hidden" name="editado" value="2019-05-08 13:36:37">

      <p>Opinión o recomendaciones para mejorar la formación profesional de un egresado de su carrera:</p>

      <?php 
        $sql ="SELECT * FROM `comentarios_sugerencias` WHERE `usuario` = $id_user";
          $resultado = $con->query($sql);
          $user = $resultado->fetch_assoc();
      ?>

      <input class="resp" type="comentario" tabindex="1" name="comentario" placeholder="Comentario opcional"  value="<?php echo $user['opinion_recomendaciones'];?>"  >
      <br>
      <br>
      <br>

      <?php
        require_once('recursos/conexion.php');

        $id_user=$_SESSION['usuario']['Id'];

        $sql ="SELECT * FROM `comentarios_sugerencias` WHERE `usuario`= $id_user";
          $resultado = $con->query($sql);
          $user = $resultado->fetch_assoc();

          if (empty($user)) {

            echo "

              <div>
                <br>
                <br>
                <a href='CuestionarioPar.php' class='btn btn-primary float-left' tabindex='3'>Atrás</a>

                <input type='hidden' name='Comentarios' value='1' >
                <input type='hidden' name='usuario' value='$id_user'> 
                <button type='submit' class='btn btn-primary float-right' tabindex='2'>Terminar</button>
              </div>

              
              ";
          }
          else{

            $sql ="SELECT comentarios_sugerencias.id, comentarios_sugerencias.usuario, perfiles.Id FROM `comentarios_sugerencias`  INNER JOIN perfiles  ON comentarios_sugerencias.usuario= $id_user";
              $resultado = $con->query($sql);
              $a = $resultado->fetch_assoc(); 
              $ids=$a['id'];

            if (!empty($user)) {
              echo "
                <div>
                  <br>
                  <br>
                  <a href='CuestionarioPar.php' class='btn btn-primary float-left' tabindex='3'>Atrás</a>
            
                  <input type='hidden' name='editar_up' value='1' >
                  <input type='hidden' name='id_com' value='$ids'> 
                  <button type='submit' class='btn btn-primary float-right' tabindex='2'>Actualizar y Terminar</button>
                </div>
              ";
            }

          }
      ?>
      <br>
      <br>
    </div>
  </div>
</form>

<?php
require_once('parciales/abajo.php');
?>

<!-- https://es.stackoverflow.com/questions/61440/count-y-consulta-compleja-con-inner-join-sql -->