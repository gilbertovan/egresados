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
         $sql ="SELECT * FROM perfiles WHERE `Id` = $id ";
           $resultado = $con->query($sql);
          $trabajoA = $resultado->fetch_assoc();
          ?>

<form autocomplete="off" role="form" name="agregar_c" id="agregar_c" method="POST"  action="../tablascuest/pertinencia_disponibilidad.php">


<div class="caja colorcues">
   <h2 class="titulosH"> II. Pertinencia y disponibilidad de medios y recursos para el aprendizaje</h2>
   <hr class="titulo">

    <br>
       <?php
          $sql ="SELECT * FROM pertinencia_disponibilidad WHERE `usuario` = $id ";
          $resultado = $con->query($sql);
          $pertinencia = $resultado->fetch_assoc();
          ?> 
                                      
    <P>1.- Calidad de los docentes:<span style="color: #cd6701;">*</span></P>
      

    <select class="resp3" name="calidad" tabindex="1" required>
       <option selected><?php echo $pertinencia['calidad_docentes'];?></option> <option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
    </select> 
    <br>
    <br>
    <br>

    <p>2.- Plan de Estudios:<span style="color: #cd6701;">*</span></p>

        <select class="resp3" name="plan" tabindex="2" required>
         <option selected><?php echo $pertinencia['plan_estudios'];?></option><option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
        </select>
       

    <br>
    <br>
    <br>

    <p>3.- Oportunidad de participar en proyectos de investigación y desarollo:<span style="color: #cd6701;">*</span></p>

      <select class="resp3" name="opor"  id="opor" tabindex="3" required>
         <option selected><?php echo $pertinencia['oportunidad_participar'];?></option><option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select>

    <br>
    <br>
    <br>

    <p>4.- Énfasis que se le prestaba a la investigación dentro del proceso de enseñanza:<span style="color: #cd6701;">*</span></p>

      <select class="resp3" name="enfasis" tabindex="4" required>
        <option selected><?php echo $pertinencia['enfasis_investigacion'];?></option> <option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select>

    <br>
    <br>
    <br>

    <p>5.- Satisfacción con las condiciones de estudio (infraestructura):<span style="color: #cd6701;">*</span></p>

      <select class="resp3" name="satis" tabindex="5" required>
      <option selected><?php echo $pertinencia['satisfaccion_condiciones'];?></option> <option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select>

    <br>
    <br>
    <br>

    <p>6.- Experiencia obtenida a través de la residencia profesional:<span style="color: #cd6701;">*</span></p>


      <select class="resp3" name="expe" tabindex="6" required>
        <option selected><?php echo $pertinencia['experiencia_obtenida'];?></option><option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select>
      
        <input type="hidden" name="editado" value="2019-05-08 13:36:37">
      <br>
      <br>
      <br>
      <hr>
      <?php  if (empty($pertinencia)) {

            echo "

              <div>
                <input type='hidden'name='pertinencia' value='1'>
                <input type='hidden' name='usuario' value='$id' > 
                 <button type='submit' class='btn btn-primary '>GUARDAR</button>
             
              </div>

              
              "; ?>
                <a href="cuesU.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>

           <?php }  else{

            if (!empty($pertinencia)) {  ?>
               <a href="cuesU.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>
    

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