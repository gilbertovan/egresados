<div class="barraN">
  <div class="contenedor">
    
  </div> 
</div><!-- fin de la barra-->

<div class="barra">
  <div class="contenedor">
    
  </div>
  <p class="contSe"/> Cuestionario de Seguimiento de Egresados/1
  <br>Departamento de Gestión Tecnológica Y Vinculación/IT del Istmo</p>
</div><!-- fin de la barra-->

<div class="barraN">
  <div class="contenedor">
    
  </div>
</div><!-- fin de la barra-->

<div class="texto">

  <br>
  <br>
  <p><b>Instrucciones:</b></p>
  <br>
  <p>Por favor lea cuidadosamente y conteste este cuestionario de la siguiente manera, según sea el caso:</p>

  1.- En el caso de preguntas cerradas, seleccione la que considere apropiada según su caso.
  <br>
  2.- En los casos de preguntas abiertas dejamos un área de texto para que usted escriba con mayúscula una respuesta (____________________).
  <br>
  3.- Al final anexamos un inciso para comentarios y sugerencias, le agradeceremos anote ahí lo que considere prudente para mejorar nuestro sistema educativo o bien los temas que, a su juicio, omitimos en el cuestionario.
  <br>
  <br>
  Gracias por su gentil colaboración.
</div>

<form autocomplete="off" role="form" name="agregarPerfil" id="agregarPerfil" method="POST"  action="tablascuest/perfil_egresado.php">

  <div class="caja colorcues">
    <div class="programa">
    
    <?php $id_user =$_SESSION['usuario']['Id']; ?>

   <input type="hidden" name="usuario" value="<?php echo $id_user; ?>">
    <h2 class="may titulosH ">I. Perfil del Egresado</h2>
    <hr>
    <br>
    <p>Campos requeridos: <span style="color: #cd6701;">*</span></p>
    <br>

    <input type="hidden" name="editado" value="2019-05-08 13:36:37">

    <p>Nombre:<span style="color: #cd6701;">*</span></p>

    <?php
        $sql ="SELECT * FROM `perfil_egresado` WHERE `usuario` = $id_user";
          $resultado = $con->query($sql);
          $user = $resultado->fetch_assoc();
      ?>

      <?php require_once('funciones/scrip.php'); ?>
   
      <input class="resp" onkeypress="return soloLetras(event)" type="text" name="apellidopa" maxlength="50" id="apellidopa" value="<?php echo $user['apellido_paterno'];?>" tabindex="1" placeholder="Apellido paterno" required>

      <input class="resp" onkeypress="return soloLetras(event)" type="text" name="apellidoma" maxlength="50" id="apellidoma" value="<?php echo $user['apellido_materno'];?>" tabindex="2" placeholder="Apellido materno" required>

      <input class="resp" onkeypress="return soloLetras(event)" type="text" name="nombret" maxlength="50" id="nombret" value="<?php echo $user['nombre'];?>" tabindex="3" placeholder="Nombre(s)" required>

    <br>
    <br>

    <p>No. de control:<span style="color: #cd6701;">*</span></p></p>

      <input class="resp2" type="text" name="control" value="<?php echo $user['no_control'];?>" tabindex="4" placeholder="No. ctrl" maxlength="10" required>

    <br>
    <br>

    <p>Fecha de nacimiento:<span style="color: #cd6701;">*</span></p></p>

      <input class="resp3" type="date" name="fechanacimiento" value="<?php echo $user['fecha_nacimiento'];?>" tabindex="5" required>
      
    <br>
    <br>

    <p>CURP:<span style="color: #cd6701;">*</span></p>

      <input class="resp may" type="text" name="curp" maxlength="20" value="<?php echo $user['curp'];?>" tabindex="6" placeholder="CURP" required>
    
    <br>
    <br>

    <p>Sexo:<span style="color: #cd6701;">*</span></p></p>
        <select class="resp3" name="sexo" tabindex="7" required>
        <option selected><?php echo $user['sexo'];?></option><option value="Hombre">Hombre</option> <option value="Mujer"/>Mujer</option>
        </select>
        

    <br>
    <br>

    <p>Estado civil:<span style="color: #cd6701;">*</span></p></p>

    
        <select class="resp3" name="civil" tabindex="8" required>
          <option selected><?php echo $user['estado_civil'];?></option> <option value="Soltero(a)">Soltero(a)</option> <option value="Casado(a)">Casado(a)</option> <option value="Otro" >Otro</option>
         </select>
    

      <br>
      <input class="resp2" onkeypress="return soloLetras(event)" type="text" name="otrocivil" maxlength="30" value="<?php echo $user['otro_civil'];?>" tabindex="9" placeholder="En caso de no estar soltero o casado especifique">

    <br>
    <br>

    <p>Domicilio:<span style="color: #cd6701;">*</span></p></p>

      <input class="resp2" type="text" name="calle" maxlength="60" value="<?php echo $user['calle'];?>" tabindex="10" placeholder="Calle"   required>

      <input class="resp3" type="text" name="no" maxlength="10" value="<?php echo $user['no'];?>" tabindex="11" placeholder="No. de calle (s/n)" required>

      <input class="resp2"  type="text" name="colonia" maxlength="60" value="<?php echo $user['colonia'];?>" tabindex="12" placeholder="Colonia" required>

      <input class="resp3" type="text" name="postal" maxlength="10" value="<?php echo $user['postal'];?>" tabindex="13" placeholder="C.P." required>

    <br>
    <br>

    <p>Ciudad:<span style="color: #cd6701;">*</span></p></p>
          
      <input class="resp" onkeypress="return soloLetras(event)" type="text" name="ciudad" maxlength="60" value="<?php echo $user['ciudad'];?>" tabindex="14" placeholder="Ciudad" required>

    <br>
    <br>

    <p>Municipio:<span style="color: #cd6701;">*</span></p></p>
        
      <input class="resp" type="text" name="municipio" maxlength="60" value="<?php echo $user['municipio'];?>" tabindex="15" placeholder="Municipio" required>

    <br>
    <br>

    <p>Teléfono(s):<span style="color: #cd6701;">*</span></p></p>

      <input class="resp2" type="number" min="0" name="telefono" maxlength="14" value="<?php echo $user['telefono'];?>" tabindex="16" placeholder="Tel./ Cel." required>

    <br>
    <br>

    <p>Correo electrónico:<span style="color: #cd6701;">*</span></p></p>
            
      <input class="resp2" type="email" name="correot" maxlength="50" value="<?php echo $user['correo'];?>" tabindex="17" placeholder="Correo electrónico" required>

    <br>
    <br>
    <br>

    <p>Carrera de Egreso:<span style="color: #cd6701;">*</span></p></p>

       <input type="text" onkeypress="return soloLetras(event)" class="resp" name="carrera" maxlength="60" list="car" value="<?php
                          if (empty($user['carrera_egreso'])) {
                            echo "";
                          }
                          else{
                            if (!empty($user['carrera_egreso'])) {
                              echo $user['carrera_egreso'];
                            }
                          }?>"
      tabindex="18" placeholder="Carrera de Egreso" required>
        <datalist id="car">
          
          <option value="Arquitectura" >Arquitectura</option><option value="Contador Público" >Contador Público</option><option value="Ingeniería Civil" >Ingeniería Civil</option><option value="Ingeniería Eléctrica" >Ingeniería Eléctrica</option><option value="Ingeniería Electromecánica" >Ingeniería Electromecánica</option><option value="Ingeniería En Gestión Empresarial" >Ingeniería En Gestión Empresarial</option><option value="Ingeniería En Sistemas Computacionales" >Ingeniería En Sistemas Computacionales</option><option value="Ingeniería Industrial" >Ingeniería Industrial</option><option value="Ingeniería Informática" >Ingeniería Informática</option><option value="Ingeniería Mecánica" >Ingeniería Mecánica</option><option value="Ingeniería Mecatrónica" >Ingeniería Mecatrónica</option>
        </datalist>
      
     <br>
      <p>Especialidad:</p>

      <input class="resp" onkeypress="return soloLetras(event)" type="text" name="especialidad" maxlength="60" value="<?php echo $user['especialidad'];?>" tabindex="19" placeholder="Especialidad">
    <br>
    <br>

    <P>Fecha de Egreso:<span style="color: #cd6701;">*</span></p></P>

      <input type="date" class="resp3" name="egreso" value="<?php echo $user['fecha_egreso'];?>" placeholder="" value="" tabindex="20" required>

    <br>
    <br>

    <p>Titulado(a):<span style="color: #cd6701;">*</span></p></p>

      <select  class="resp3" name="titulado" tabindex="21" required>
        <option selected><?php echo $user['titulado'];?></option> <option value="Si">Si</option> <option value="No">No</option>
      </select>
      
    <br>
    <br>
    <br>

    <p>Dominio de idioma extranjero:</p>

     <p> Ingles:<span style="color: #cd6701;">*</span></p></p>
    <input class="resp3" type="number" min="0" max="100" name="ingles" maxlength="3" value="<?php echo $user['dominio_idioma_extr'];?>" tabindex="22" placeholder="0% - 100%" required>

    <br>
    <br>

    <p>Otro:</p>

      <input class="resp2" onkeypress="return soloLetras(event)" type="text" name="otroidioma" maxlength="30" value="<?php echo $user['otro_idioma_extr'];?>" tabindex="23" placeholder="En caso de dominar otro(s) idioma(s) especifique">

    <br>
    <br>

    <p>Manejo de paquetes computacionales (Especificar):</p>

      <input class="resp" onkeypress="return soloLetras(event)" type="text" name="paquetes" maxlength="250" value="<?php echo $user['paquetes_comp'];?>" tabindex="24" placeholder="Describa"></input> 

   
    <br>
    <br>

    <?php
        require_once('recursos/conexion.php');

        $id_user=$_SESSION['usuario']['Id'];

        $sql ="SELECT * FROM `perfil_egresado` WHERE `usuario`= $id_user";
          $resultado = $con->query($sql);
          $user = $resultado->fetch_assoc();

          if (empty($user)) {

            echo "
              <div>
              <br>
              <br>
                <input type='hidden'name='perfil' value='1'>
                <input type='hidden' name='usuario' value='$id_user' > 
                <button type='submit' tabindex='25' class='btn btn-primary float-right float-right'>Guardar y continuar</button>
              </div>
            ";
          }
          else{

            $sql ="SELECT perfil_egresado.id, perfil_egresado.usuario, perfiles.Id FROM `perfil_egresado`  INNER JOIN perfiles  ON perfil_egresado.usuario= $id_user";
            $resultado = $con->query($sql);
            $a = $resultado->fetch_assoc(); 
            $ids=$a['id'];

            if (!empty($user)) {

              echo "
                <div>
                <br>
                <br>
                  <input type='hidden' name='editar_up' value='1'>
                  <input type='hidden' name='id_com' value='$ids'> 
                  <button type='submit' tabindex='25' class='btn btn-primary float-right'>Actualizar y continuar</button>
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