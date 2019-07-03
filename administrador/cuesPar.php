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
<form autocomplete="off" role="form" name="agregar_c" id="agregar_c" method="POST"  action="../tablascuest/participacion.php">


  <div class="caja colorcues">
  <h2 class="titulosH">VI.- Participación Social De Los Egresados</h2>
  <hr class="titulo">
  <?php 
  $sql ="SELECT * FROM `participacion_social` WHERE `usuario` = $id";
  $resultado = $con->query($sql);
  $participacion = $resultado->fetch_assoc();
?> 

    <br>
  

     
      <p>1.- Pertenece a organizaciones sociales:<span style="color: #cd6701;">*</span></p>
     <select class="resp3"  id="orgasoci" name="orgasoci" tabindex="1" >
      
      <option><?php echo $participacion['sociales'];?></option> <option>Si</option> <option>No</option>
      </select>

      <br>
      <br>

       <P>¿Cuáles?:</P>
      <input class="resp" type="text" name="cualesorg" placeholder="En caso de pertenecer a una organización social especifique cual"  value="<?php echo $participacion['cual_sociales'];?>">

      <br>
      <br>
     
      <p> 2.- Pertenecea organismos de profesionistas:<span style="color: #cd6701;">*</span></p>
     
      <select class="resp3" id="orgprof" name="orgprof" tabindex="2">
      <option><?php echo $participacion['profesionistas'];?></option><option>Si</option> <option>No</option>
      </select>

      <br>
      <br>

      <P>¿Cuáles?:</P>
      <input class="resp" type="text" name="cualesprof" placeholder="En caso de pertenecer a una organizaciónn de profesionistas especifique cual" value="<?php echo $participacion['cual_profesionistas'];?>" >

      <br>
      <br>


      <p> 3.- Pertenece a la asociación de egresados:<span style="color: #cd6701;">*</span></p>
      
      <select id="asocegresados" name="asocegresados" tabindex="3" class="resp3"  >
      <option><?php echo $participacion['egresados'];?></option><option>Si</option> <option>No</option>
     </select>

       <P>¿Cuáles?:</P>
      <input class="resp" type="text" name="cualesE" placeholder="En caso de pertenecer a una asociación especifique cual" value="<?php echo $participacion['cual_egresados'];?>">
      
        <input type="hidden" name="editado" value="2019-05-08 13:36:37">
       <br>
        <br>
        <br>
  
      <hr>
         <?php  if (empty($participacion)) {

            echo "

              <div>
                <input type='hidden'name='participacion' value='1'>
                <input type='hidden' name='usuario' value='$id' > 
                 <button type='submit' class='btn btn-primary '>GUARDAR</button>
             
              </div>

              
              "; ?>
               <a href="cuesC.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>

           <?php }  else{

            if (!empty($participacion)) {  ?>
             <a href="cuesC.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>
    

           <?php  }

          }
        ?>
  </div>
</form>


</section>
</div>
<?php
 include_once'templates/footer.php';
?>