<?php
    require_once('funciones/sesionesE.php');
    require_once('recursos/conexion.php');

    $titulo = 'Plataforma de Egresados | Cuestionario de Seguimiento de Egresados';
    require_once('parciales/arriba.php');
    require_once('parciales/nav.php');
    
    require_once('parciales/logo.php'); 
    
?>
<div class="barraN">
  <div class="contenedor">
    
  </div> 
</div><!-- fin de la barra-->

<div class="barra">
  <div class="contenedor">
    
  </div>
  <p class="contSe"/> Cuestionario de Seguimiento de Egresados/4
  <br>Departamento de Gestión Tecnológica Y Vinculación/IT del Istmo</p>
</div><!-- fin de la barra-->

<div class="barraN">
  <div class="contenedor">
    
  </div>
</div><!-- fin de la barra-->

<form autocomplete="off" role="form" name="desProf" id="desProf" method="POST"  action="tablascuest/desempenio_profesional.php">

  <div class="caja colorcues">

    <?php $id_user =$_SESSION['usuario']['Id']; ?>

    <input type="hidden" name="id_registro" value="<?php echo $id_user;?>">
    
    <h2 class="may titulosH">IV. Desempeño profesional de los egresados (coherencia entre la formación y el tipo de empleo)</h2>
    <hr>
    <br>
    <p>Campos requeridos: <span style="color: #cd6701;">*</span></p>

    <br>

    <p>Seleccionar los campos que correspondan a su trayectoria profesional.</p>
    
    <br>

    <?php
      $sql ="SELECT * FROM `desempenio_profesional` WHERE `usuario`= $id_user";
        $resultado = $con->query($sql);
        $user = $resultado->fetch_assoc();
    ?>

    <input type="hidden" name="editado" value="2019-05-08 13:36:37">

    <p>1.- Eficiencia para realizar las actividades laborales, en relación a su formación académica:<span style="color: #cd6701;">*</span></p>
  
      <select class="resp3" id="eficiencia" name="eficiencia"  tabindex="1">
        <option selected><?php echo $user['eficiencia']; ?></option> <option>Muy eficiente</option> <option>Eficiente</option> <option>Poco eficiente</option> <option>Deficiente</option>
      </select>

      <br>
      <br>

      <p>2.- Cómo califica su formación académica con respecto a su desempeño laboral:<span style="color: #cd6701;">*</span></p>

        <select class="resp3" id="formacion" name="formacion" tabindex="2">
          <option selected><?php echo $user['califica']; ?></option> <option>Muy eficiente</option> <option>Eficiente</option> <option>Poco eficiente</option> <option>Deficiente</option>
        </select>

      <br>
      <br>

      <p>3.- Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional:<span style="color: #cd6701;">*</span></p>
      
        <select class="resp3" id="utilidad" name="utilidad" tabindex="3">
          <option selected><?php echo $user['utilidad']; ?></option> <option>Muy eficiente</option> <option>Eficiente</option> <option>Poco eficiente</option> <option>Deficiente</option>
        </select>

      <br>
      <br>

      <p>4.- Aspectos que valora la empresa u organismo para la contratación de egresados:<span style="color: #cd6701;">*</span></p>

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

      <br>
      <br>

    <?php
        require_once('recursos/conexion.php');

        $id_user=$_SESSION['usuario']['Id'];

        $sql ="SELECT * FROM `desempenio_profesional` WHERE `usuario`= $id_user";
          $resultado = $con->query($sql);
          $user = $resultado->fetch_assoc();

          if (empty($user)) {

            echo "
              <div>
                <a href='CuestionarioU.php' class='btn btn-primary float-left' tabindex='16'>Atrás</a>

                <input type='hidden'name='desProf' value='1'>
                <input type='hidden' name='id_registro' value='$id_user' > 
                <button type='submit' class='btn btn-primary float-right' tabindex='15'>Guardar y continuar</button>
              </div>
            ";
          }
          else{

            $sql ="SELECT desempenio_profesional.id, desempenio_profesional.usuario, perfiles.Id FROM `desempenio_profesional` INNER JOIN perfiles  ON desempenio_profesional.usuario= $id_user";
            $resultado = $con->query($sql);
            $a = $resultado->fetch_assoc(); 
            $ids=$a['id'];

            if (!empty($user)) {

              echo "
                <div>
                  <a href='CuestionarioU.php' class='btn btn-primary float-left' tabindex='16'>Atrás</a>

                  <input type='hidden' name='desProf_up' value='1'>
                  <input type='hidden' name='id_com' value='$ids'> 
                  <button type='submit' class='btn btn-primary float-right' tabindex='15'>Actualizar y continuar</button>
                </div>
              ";
            }

          }
    ?>
    <br>
    <br>
  </div>
</form>

 
<?php
    require_once('parciales/abajo.php');
?>