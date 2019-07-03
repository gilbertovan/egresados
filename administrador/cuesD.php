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
           
  <form autocomplete="off" role="form" name="agregar_c" id="agregar_c" method="POST"  action="../tablascuest/desempenio_profesional.php">


   <?php
            $sql ="SELECT * FROM desempenio_profesional WHERE `usuario` = $id ";
            $resultado = $con->query($sql);
            $desempeño = $resultado->fetch_assoc();
    ?>

        

    <div class="caja colorcues">
    <h2 class="titulosH">IV.- Desempeño profesional de los egresados (coherencia entre la formación y el tipo de empleo)</h2>
    <hr class="titulo">

      <br>
      
        <br>

        <p>Seleccionar los campos que correspondan a su trayectoria profesional.</p>
        <br>
         

       <?php
        $sql ="SELECT * FROM `desempenio_profesional` WHERE `usuario`= $id";
          $resultado = $con->query($sql);
          $user = $resultado->fetch_assoc();
      ?>

      <p>1.-Eficiencia para realizar las actividades laborales, en relación a su formación académica:<span style="color: #cd6701;">*</span></p>
    
        <select class="resp3" id="eficiencia" name="eficiencia"  tabindex="1">
          <option selected><?php echo $user['eficiencia']; ?></option> <option>Muy eficiente</option> <option>Eficiente</option> <option>Poco eficiente</option> <option>Deficiente</option>
        </select>

        <br>
        <br>

        <p>2.-Cómo califica su formación académica con respecto a su desempeño laboral:<span style="color: #cd6701;">*</span></p>

          <select class="resp3" id="formacion" name="formacion" tabindex="2">
            <option selected><?php echo $user['califica']; ?></option> <option>Muy eficiente</option> <option>Eficiente</option> <option>Poco eficiente</option> <option>Deficiente</option>
          </select>

        <br>
        <br>

        <p>3.-Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional:<span style="color: #cd6701;">*</span></p>
        
          <select class="resp3" id="utilidad" name="utilidad" tabindex="3">
            <option selected><?php echo $user['utilidad']; ?></option> <option>Muy eficiente</option> <option>Eficiente</option> <option>Poco eficiente</option> <option>Deficiente</option>
          </select>

        <br>
        <br>

        <p>4.-Aspectos que valora la empresa u organismo para la contratación de egresados:<span style="color: #cd6701;">*</span></p>

          <select class="resp3" id="aspectos" name="aspectos"  tabindex="4">
            <option selected><?php echo $user['aspectos']; ?></option> <option>Muy eficiente</option> <option>Eficiente</option> <option>Poco Eficiente</option> <option>Deficiente</option>
          </select>
        
        <br>
        <br>
        
        <p>En las siguientes  preguntas de valoración utiliza la escala del 1 al 5 donde  1 es “Poco” y 5 es “Mucho” <span style="color: #cd6701;">*</span></p>

        <br>
          
          <table align="center" wind="550" height="15%" bgcolor="#F3F3F1" bordercolor="black" border="1">

            <tr>

              <td id="b1"></td>

              <td width="50px" id="b1"><center>Poco</center></td>

              <td width="50px" id="b1"></td>

              <td width="50px" id="b1"></td>

              <td width="50px" id="b1"></td>

              <td width="50px" id="b1"><center>Mucho</center></td>

            </tr>

            <tr>

              <td id="b1"></td>

              <td width="50px"><center>1</center></td>

              <td width="50px"><center>2</center></td>

              <td width="50px"><center>3</center></td>

              <td width="50px"><center>4</center></td>

              <td width="50px"><center>5</center></td>

            </tr> 

            <tr>

              <td>1. Área o campo de estudio</td>

              <td width="50px"><center><input type="radio" name="area" value="1" tabindex="5" required/></center></td>

              <td width="50px"><center><input type="radio" name="area" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="area" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="area" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="area" value="5"/></center></td>

            </tr> 

              <tr>

              <td>2. Titulación</td>

              <td width="50px"><center><input type="radio" name="Titulacion" value="1" tabindex="6" required/></center></td>

              <td width="50px"><center><input type="radio" name="Titulacion" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="Titulacion" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="Titulacion" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="Titulacion" value="5"/></center></td>

            </tr>

            <tr>

              <td>3. Experiencia laboral/ práctica (antes de egresar)</td>

              <td width="50px"><center><input type="radio" name="Experiencia" value="1" tabindex="7" required/></center></td>

              <td width="50px"><center><input type="radio" name="Experiencia" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="Experiencia" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="Experiencia" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="Experiencia" value="5"/></center></td>

            </tr> 

            <tr>

              <td  width="750px">4. Competencia laboral: habilidad para resolver problemas, capacidad de análisis, habilidad para el aprendizaje, creatividad, administración del tiempo, capacidad de negociación, habilidades manuales, trabajo en equipo, iniciativa, honestidad, persistencia, etc.</td>

              <td width="50px"><center><input type="radio" name="Competencia" value="1" tabindex="8" required/></center></td>

              <td width="50px"><center><input type="radio" name="Competencia" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="Competencia" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="Competencia" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="Competencia" value="5"/></center></td>

            </tr> 

            <tr>

              <td>5. Posicionamiento de la institución de egreso</td>

              <td width="50px"><center><input type="radio" name="Posicionamiento" value="1" tabindex="9" required/></center></td>

              <td width="50px"><center><input type="radio" name="Posicionamiento" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="Posicionamiento" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="Posicionamiento" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="Posicionamiento" value="5"/></center></td>

            </tr> 

            <tr>

              <td>6. Conocimiento de idiomas extranjeros</td> 

              <td width="50px"><center><input type="radio" name="Conocimiento" value="1" tabindex="10" required/></center></td>

              <td width="50px"><center><input type="radio" name="Conocimiento" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="Conocimiento" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="Conocimiento" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="Conocimiento" value="5"/></center></td>

            </tr> 

            <tr>

              <td>7. Recomendaciones/ Referencias</td>

              <td width="50px"><center><input type="radio" name="Recomendaciones" value="1" tabindex="11" required/></center></td>

              <td width="50px"><center><input type="radio" name="Recomendaciones" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="Recomendaciones" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="Recomendaciones" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="Recomendaciones" value="5"/></center></td>

            </tr> 

            <tr>

              <td>8. Personalidad/ Actitudes</td>

              <td width="50px"><center><input type="radio" name="Personalidad" value="1" tabindex="12" required/></center></td>

              <td width="50px"><center><input type="radio" name="Personalidad" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="Personalidad" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="Personalidad" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="Personalidad" value="5"/></center></td>

            </tr> 

            <tr>

              <td>9. Capacidad de liderazgo</td>

              <td width="50px"><center><input type="radio" name="Capacidad" value="1" tabindex="13" required/></center></td>

              <td width="50px"><center><input type="radio" name="Capacidad" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="Capacidad" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="Capacidad" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="Capacidad" value="5"/></center></td>

            </tr> 

            <tr>

              <td>10. Otros</td>

              <td width="50px"><center><input type="radio" name="Otros" value="1" tabindex="14" required/></center></td>

              <td width="50px"><center><input type="radio" name="Otros" value="2"/></center></td>

              <td width="50px"><center><input type="radio" name="Otros" value="3"/></center></td>

              <td width="50px"><center><input type="radio" name="Otros" value="4"/></center></td>

              <td width="50px"><center><input type="radio" name="Otros" value="5"/></center></td>

            </tr> 
          </table> 
          
          <input type="hidden" name="editado" value="2019-05-08 13:36:37">    
           <br>
          <br>
          <br>
    
        <hr>
          <?php  if (empty($desempeño)) {

              echo "

                <div>
                  <input type='hidden'name='desProf' value='1'>
                  <input type='hidden' name='id_registro' value='$id' > 
                   <button type='submit' class='btn btn-primary '>GUARDAR</button>
               
                </div>

                
                "; ?>
                <a href="cuesExp.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>

             <?php }  else{

              if (!empty($desempeño)) {  ?>
               <a href="cuesExp.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>
      

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