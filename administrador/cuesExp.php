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
<form autocomplete="off" role="form" name="agregar_c" id="agregar_c" method="POST"  action="../tablascuest/expectativas_desarrollo.php">
<?php
          $sql ="SELECT * FROM expectativas_desarrollo WHERE `usuario` = $id ";
          $resultado = $con->query($sql);
          $espectativa = $resultado->fetch_assoc();
          ?>

  <div class="caja colorcues">
 <h2 class="titulosH"> V.- Expectativas de desarrollo, superación profecional y de actualizacion</h2>
  <hr class="titulo">
    <br>
 <p>1.- ACTUALIZACIÓN DE CONOCIMIENTOS</p>

    <br>

    <?php
      $sql ="SELECT * FROM `expectativas_desarrollo` WHERE `usuario`= $id";
        $resultado = $con->query($sql);
        $user = $resultado->fetch_assoc();
    ?>

    <p>Le gustaría tomar cursos de actualización:<span style="color: #cd6701;">*</span></p>

      <select class="resp3" id="curso" name="curso" tabindex="1"> 
        <option selected><?php echo $user['cursos_actualizacion']; ?></option> <option>Si</option> <option>No</option>
      </select>

    <br>
    <br>

    <P>¿Cuáles?:</P>

      <input class="resp" type="text" id="cualescur" name="cualescur" value="<?php echo $user['cuales_actualizacion']; ?>" tabindex="2" placeholder="En caso de si, especifique que cursos le gustaría tomar" maxlength="30">

    <br>
    <br>

    <P>Le gustaría iniciar algún posgrado:<span style="color: #cd6701;">*</span></P>
         
      <select class="resp3" id="posgrado" name="posgrado"  tabindex="3" >
        <option selected><?php echo $user['iniciar_posgrado']; ?></option> <option>Si</option> <option>No</option>
      </select>

    <br>
    <br>

    <P>¿Cuáles?:</P>
      
      <input class="resp" type="text" name="cualespos" value="<?php echo $user['cual_posgrado']; ?>" tabindex="4" placeholder="En caso de si, especifique que posgrado le gustaría Tomar" >

        <input type="hidden" name="editado" value="2019-05-08 13:36:37">

 
        <br>
        <br>
        <br>
  
      <hr>
         <?php  if (empty($espectativa)) {

            echo "

              <div>
                <input type='hidden'name='expectativa' value='1'>
                <input type='hidden' name='id_registro' value='$id' > 
                 <button type='submit' class='btn btn-primary '>GUARDAR</button>
             
              </div>

              
              "; ?>
              <a href="cuesPar.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>

           <?php }  else{

            if (!empty($espectativa)) {  ?>
              <a href="cuesPar.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>
    

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