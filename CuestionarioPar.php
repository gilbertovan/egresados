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
  <p class="contSe"/> Cuestionario de Seguimiento de Egresados/6
  <br>Departamento de Gestión Tecnológica Y Vinculación/IT del Istmo</p>
</div><!-- fin de la barra-->

<div class="barraN">
</div>

<?php 
  $sql ="SELECT * FROM `perfiles` WHERE `Id` = $id_user";
  $resultado = $con->query($sql);
  $admin = $resultado->fetch_assoc();
?> 
<form autocomplete="off" role="form" name="participacion" id="participacion" method="POST"  action="tablascuest/participacion.php">


  <div class="caja colorcues">
    
        <h2 class="may titulosH">VI. Participación Social De Los Egresados</h2>
        <hr>
        <br>
        <p>Campos requeridos: <span style="color: #cd6701;">*</span></p>
        
        <?php 
        $sql ="SELECT * FROM `participacion_social` WHERE `usuario` = $id_user";
        $resultado = $con->query($sql);
        $user = $resultado->fetch_assoc();
      ?>
        <br>
        
        <input type="hidden" name="usuario" value="<?php echo $id_user; ?>">
         
         <input type="hidden" name="editado" value="2019-05-08 13:36:37">

        <p>1.- Pertenece a organizaciones sociales:<span style="color: #cd6701;">*</span></p>
         <select class="resp3"  id="orgasoci" name="orgasoci" tabindex="1" >
          
          <option><?php echo $user['sociales'];?></option> <option>Si</option> <option>No</option>
          </select>

          <br>
          <br>

           <P>¿Cuáles?:</P>
          <input class="resp" type="text" tabindex="2" name="cualesorg" placeholder="En caso de pertenecer a una organización social especifique cual"  value="<?php echo $user['cual_sociales'];?>">

          <br>
          <br>
         
          <p> 2.- Pertenecea organismos de profesionistas:<span style="color: #cd6701;">*</span></p>
         
          <select class="resp3" id="orgprof" name="orgprof" tabindex="3">
          <option><?php echo $user['profesionistas'];?></option><option>Si</option> <option>No</option>
          </select>

          <br>
          <br>

          <P>¿Cuáles?:</P>
          <input class="resp" type="text" tabindex="4" name="cualesprof" placeholder="En caso de pertenecer a una organización de profesionistas especifique cual" value="<?php echo $user['cual_profesionistas'];?>" >

          <br>
          <br>


          <p> 3.- Pertenece a la asociación de egresados:<span style="color: #cd6701;">*</span></p>
          
          <select id="asocegresados" name="asocegresados" tabindex="5" class="resp3"  >
          <option><?php echo $user['egresados'];?></option><option>Si</option> <option>No</option>
         </select>

           <P>¿Cuáles?:</P>
          <input class="resp" type="text" tabindex="6" name="cualesE" placeholder="En caso de pertenecer a una asociación especifique cual" value="<?php echo $user['cual_egresados'];?>">
     
          <br>
          <br>
          <br>


           <?php
            require_once('recursos/conexion.php');

            $id_user=$_SESSION['usuario']['Id'];

            $sql ="SELECT * FROM `participacion_social` WHERE `usuario`= $id_user";
              $resultado = $con->query($sql);
              $user = $resultado->fetch_assoc();

              if (empty($user)) {

                echo "
                  <div>
                    <a href='CuestionarioExp.php' class='btn btn-primary float-left' tabindex='8'>Atrás</a>

                    <input type='hidden' name='participacion' value='1' >
                    <input type='hidden' name='usuario' value='$id_user'> 
                    <button type='submit' class='btn btn-primary float-right' tabindex='7'>Guardar y continuar</button>
                  </div>

                  
                  ";
              }
              else{

           
              $sql ="SELECT participacion_social.id, participacion_social.usuario, perfiles.Id FROM `participacion_social`  INNER JOIN perfiles  ON participacion_social.usuario= $id_user";
                $resultado = $con->query($sql);
                $par= $resultado->fetch_assoc(); 
                  $ids=$par['id'];

                if (!empty($user)) {

                  echo "
                    <div>
                      <a href='CuestionarioExp.php' class='btn btn-primary float-left' tabindex='8'>Atrás</a>
                      
                      <input type='hidden' name='participacion_up' value='2' >
                      <input type='hidden' name='id_par' value='$ids'> 
                      <button type='submit' class='btn btn-primary float-right' tabindex='7'>Actualizar y continuar</button>
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

<!-- A T E N T A M E N T E
Excelencia en Educación Tecnológica® 
“Por una tecnología propia como principio de libertad” -->
