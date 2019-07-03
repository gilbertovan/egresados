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
	<section class="content"> 
               <?php
    $sql ="SELECT * FROM `perfiles` WHERE `Id` = $id";
    $resultado = $con->query($sql);
    $user = $resultado->fetch_assoc();
    ?>
<form autocomplete="off" role="form" name="agregar_c" id="agregar_c" method="POST"  action="../tablascuest/comentarios.php">
  <div class="caja colorcues">
    
    <h2 class="titulosH">VII.- Comentarios y sugerencias</h2>    
    <hr class="titulo">
    <br>
    <br>
    <div class="colorcues" >



      <p>Opinión o recomendaciones para mejorar la formación profesional de un egresado de su carrera:</p>    <?php 
          $sql ="SELECT * FROM `comentarios_sugerencias` WHERE `usuario` = $id";
          $resultado = $con->query($sql);
          $com = $resultado->fetch_assoc();
          ?> 
      <input class="resp" type="comentario" name="comentario" placeholder="Comentario opcional"  value="<?php echo $com['opinion_recomendaciones'];?>"  >
      
        <input type="hidden" name="editado" value="2019-05-08 13:36:37">
             <br>
        <br>
        <br>
  
      <hr>
        <?php  if (empty($com)) {

            echo "

              <div>
                <input type='hidden'name='Comentarios' value='1'>
                <input type='hidden' name='usuario' value='$id' > 
                 <button type='submit' class='btn btn-primary '>TERMINAR</button>
             
              </div>

              
              "; ?>
            

           <?php }  else{

            if (!empty($com)) {  ?>
              <a href="listE.php" class="btn btn-primary float-right" >VER CUESTIONARIOS</a>
    

           <?php  }

          }
        ?>
        </div>
 

  </div>
</form>


</section>
</div>
<?php
 include_once'templates/footer.php';
?>