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
  <div class="contenedor">
    
  </div> 
</div><!-- fin de la barra-->

<div class="barra">
  <div class="contenedor">
    
</div>
  <p class="contSe"/> Cuestionario de Seguimiento de Egresados/2
  <br>Departamento de Gestión Tecnológica Y Vinculación/IT del Istmo</p>
</div><!-- fin de la barra-->

<div class="barraN">
  <div class="contenedor">
    
  </div>
</div><!-- fin de la barra--> 

<form autocomplete="off" role="form" name="agregar" id="agregar" method="POST"  action="tablascuest/pertinencia_disponibilidad.php">

  <div class="caja colorcues">
  
    <h2 class="may titulosH"> II. Pertinencia y disponibilidad de medios y recursos para el aprendizaje</h2>
    <hr>
    <br>
    <p>Campos requeridos: <span style="color: #cd6701;">*</span></p>
    <br>
    
    <input type="hidden" name="usuario" value="<?php echo $id_user; ?>">

    <input type="hidden" name="editado" value="2019-05-08 13:36:37">
                      
    <P>1.- Calidad de los docentes:<span style="color: #cd6701;">*</span></P>

    <?php
      $sql ="SELECT * FROM `pertinencia_disponibilidad` WHERE `usuario`= $id_user";
        $resultado = $con->query($sql);
        $user = $resultado->fetch_assoc();
    ?>
      <select class="resp3" name="calidad" tabindex="1" required>
        <option selected><?php echo $user['calidad_docentes']; ?> </option><option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select> 
      
    <br>
    <br>
    <br>
    
    <p>2.- Plan de Estudios:<span style="color: #cd6701;">*</span></p>

      <select class="resp3" name="plan" tabindex="2" required>
        <option selected><?php echo $user['plan_estudios']; ?> <option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select>
      
    <br>
    <br>
    <br>

    <p>3.- Oportunidad de participar en proyectos de investigación y desarollo:<span style="color: #cd6701;">*</span></p>

      <select class="resp3" name="opor" id="opor" tabindex="3" required>
        <option selected><?php echo $user['oportunidad_participar']; ?> <option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select>

    <br>
    <br>
    <br>

    <p>4.- Énfasis que se le prestaba a la investigación dentro del proceso de enseñanza:<span style="color: #cd6701;">*</span></p>

      <select class="resp3" name="enfasis" tabindex="4" required>
        <option selected><?php echo $user['enfasis_investigacion']; ?> <option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select>

    <br>
    <br>
    <br>

    <p>5.- Satisfacción con las condiciones de estudio (infraestructura):<span style="color: #cd6701;">*</span></p>

      <select class="resp3" name="satis" tabindex="4" required>
        <option selected><?php echo $user['satisfaccion_condiciones']; ?> <option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select>

    <br>
    <br>
    <br>

    <p>6.- Experiencia obtenida a través de la residencia profesional:<span style="color: #cd6701;">*</span></p>

      <select class="resp3" name="expe" tabindex="6" required>
        <option selected><?php echo $user['experiencia_obtenida']; ?> <option value="Muy buena">Muy buena</option> <option value="Buena">Buena</option> <option value="Regular">Regular</option> <option value="Mala">Mala</option>
      </select>
      
      <?php
        require_once('recursos/conexion.php');

        $id_user=$_SESSION['usuario']['Id'];

        $sql ="SELECT * FROM `pertinencia_disponibilidad` WHERE `usuario`= $id_user";
          $resultado = $con->query($sql);
          $user = $resultado->fetch_assoc();

        if (empty($user)) {
          echo "
            <div>
            <br>
            <br>
              <a href='Cuestionario.php' class='btn btn-primary float-left' tabindex='8'>Atrás</a>

              <input type='hidden' name='pertinencia' value='1' >
              <input type='hidden' name='usuario' value='$id_user'> 
              <button type='submit' class='btn btn-primary float-right' tabindex='7'>Guardar y continuar</button>
            </div>

            ";
        }
        else{

          $sql ="SELECT pertinencia_disponibilidad.id, pertinencia_disponibilidad.usuario, perfiles.Id FROM `pertinencia_disponibilidad`  INNER JOIN perfiles  ON pertinencia_disponibilidad.usuario= $id_user";
            $resultado = $con->query($sql);
            $a = $resultado->fetch_assoc(); 
            $ids=$a['id'];

          if (!empty($user)) {

            echo "
              <div> 
              <br>
              <br>
                <a href='Cuestionario.php' class='btn btn-primary float-left' tabindex='8'>Atrás</a>
                
                <input type='hidden' name='pertinencia_up' value='1' >
                <input type='hidden' name='id_com' value='$ids'> 
                <button type='submit' class='btn btn-primary float-right' tabindex='7'>Actualizar y continuar</button>
              </div>";
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