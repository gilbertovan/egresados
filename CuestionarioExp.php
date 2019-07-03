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
  <p class="contSe"/> Cuestionario de Seguimiento de Egresados/5
  <br>Departamento de Gestión Tecnológica Y Vinculación/IT del Istmo</p>
</div><!-- fin de la barra-->

<div class="barraN">
  <div class="contenedor">
    
  </div>
</div><!-- fin de la barra-->

<form autocomplete="off" role="form" name="expectativa" id="expectativa" method="POST"  action="tablascuest/expectativas_desarrollo.php">

  <div class="caja colorcues">

    <?php $id_user =$_SESSION['usuario']['Id']; ?>

    <input type="hidden" name="id_registro" value="<?php echo $id_user;?>">

    <h2 class="may titulosH"> V. Expectativas de desarrollo, superación profecional y de actualizacion</h2>
    <hr>
    <br>
    <p>Campos requeridos: <span style="color: #cd6701;">*</span></p>
    <br>
              
    <p>1.- ACTUALIZACIÓN DE CONOCIMIENTOS</p>

    <br>

    <?php
      $sql ="SELECT * FROM `expectativas_desarrollo` WHERE `usuario`= $id_user";
        $resultado = $con->query($sql);
        $user = $resultado->fetch_assoc();
    ?>

    <input type="hidden" name="editado" value="2019-05-08 13:36:37">

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

    <br>
    <br>

    <?php
        require_once('recursos/conexion.php');

        $id_user=$_SESSION['usuario']['Id'];

        $sql ="SELECT * FROM `expectativas_desarrollo` WHERE `usuario`= $id_user";
          $resultado = $con->query($sql);
          $user = $resultado->fetch_assoc();

          if (empty($user)) {

            echo " 
              <div>
                <a href='CuestionarioD.php' class='btn btn-primary float-left' tabindex='6'>Atrás</a>

                <input type='hidden'name='expectativa' value='1'>
                <input type='hidden' name='id_registro' value='$id_user' > 
                <button type='submit' class='btn btn-primary float-right' tabindex='5'>Guardar y continuar</button>
              </div>
            ";
          }
          else{

            $sql ="SELECT expectativas_desarrollo.id, expectativas_desarrollo.usuario, perfiles.Id FROM `expectativas_desarrollo`  INNER JOIN perfiles  ON expectativas_desarrollo.usuario= $id_user";
            $resultado = $con->query($sql);
            $a = $resultado->fetch_assoc(); 
            $ids=$a['id'];

            if (!empty($user)) {

              echo "
                <div>
                  <a href='CuestionarioD.php' class='btn btn-primary float-left' tabindex='6'>Atrás</a>
                  
                  <input type='hidden' name='expectativa_up' value='1'>
                  <input type='hidden' name='id_com' value='$ids'> 
                  <button type='submit' class='btn btn-primary float-right' tabindex='5'>Actualizar y continuar</button>
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