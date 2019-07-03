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
	<form autocomplete="off" role="form" name="agregar_c" id="agregar_c" method="POST"  action="../tablascuest/perfil_egresado.php">
	

   <div class="caja colorcues">


        <h2 class="titulosH">I.- Perfil del Egresado</h2>


      <p>Nombre:<span style="color: #cd6701;">*</span></p>

        <?php  $sql ="SELECT * FROM `perfiles` WHERE `Id` = $id";
              $resultado = $con->query($sql);
              $user = $resultado->fetch_assoc();?>  
     

     <?php  $sql ="SELECT * FROM `perfil_egresado` WHERE `usuario` = $id";
              $resultado = $con->query($sql);
              $user1 = $resultado->fetch_assoc();?>  
        <input class="resp" type="text" name="apellidopa" id="apellidopa" value="<?php echo $user1['apellido_paterno'];?>" tabindex="1" placeholder="Apellido paterno" required>

        <input class="resp" type="text" name="apellidoma" id="apellidoma" value="<?php echo $user1['apellido_materno'];?>" tabindex="2" placeholder="Apellido materno" required>

        <input class="resp" type="text" name="nombret" id="nombret" value="<?php echo $user1['nombre'];?>" tabindex="3" placeholder="Nombre(s)" required>

      <br>
      <br>

      <p>No. de control:<span style="color: #cd6701;">*</span></p></p>

        <input class="resp2" type="text" min="1" name="control" value="<?php echo $user1['no_control'];?>" tabindex="4" placeholder="No. ctrl" maxlength="15" required>

      <br>
      <br>

      <p>Fecha de nacimiento:<span style="color: #cd6701;">*</span></p></p>

        <input class="resp3" type="date" name="fechanacimiento" value="<?php echo $user1['fecha_nacimiento'];?>" tabindex="5" required>
        
      <br>
      <br>

      <p>CURP:<span style="color: #cd6701;">*</span></p>

        <input class="resp may" type="text" name="curp" value="<?php echo $user1['curp'];?>" tabindex="6" placeholder="CURP" required>
      
      <br>
      <br>

      <p>Sexo:<span style="color: #cd6701;">*</span></p></p>
          <select class="resp3" name="sexo" tabindex="7" required>
          <option selected><?php echo $user1['sexo'];?></option><option value="Hombre">Hombre</option> <option value="Mujer"/>Mujer</option>
          </select>
          

      <br>
      <br>

      <p>Estado civil:<span style="color: #cd6701;">*</span></p></p>

      
          <select class="resp3" name="civil" tabindex="8" required>
            <option selected><?php echo $user1['estado_civil'];?></option> <option value="Soltero(a)">Soltero(a)</option> <option value="Casado(a)">Casado(a)</option> <option value="Otro" >Otro</option>
           </select>
      

        <br>
        <input class="resp2" type="text" name="otrocivil" value="<?php echo $user1['otro_civil'];?>" tabindex="9" placeholder="En caso de no estar soltero o casado especifique">

      <br> 
      <br>

      <p>Domicilio:<span style="color: #cd6701;">*</span></p></p>

        <input class="resp2" type="text" name="calle" value="<?php echo $user1['calle'];?>" tabindex="10" placeholder="Calle"   required>

        <input class="resp3" type="text" name="no" value="<?php echo $user1['no'];?>" tabindex="11" placeholder="No. de calle (s/n)" required>

        <input class="resp2" type="text" name="colonia" value="<?php echo $user1['colonia'];?>" tabindex="12" placeholder="Colonia" required>

        <input class="resp3" type="text" name="postal" value="<?php echo $user1['postal'];?>" tabindex="13" placeholder="C.P." required>

      <br>
      <br>

      <p>Ciudad:<span style="color: #cd6701;">*</span></p></p>
            
        <input class="resp" type="text" name="ciudad" value="<?php echo $user1['ciudad'];?>" tabindex="14" placeholder="Ciudad" maxlength="60" required>

      <br>
      <br>

      <p>Municipio:<span style="color: #cd6701;">*</span></p></p>
          
        <input class="resp" type="text" name="municipio" value="<?php echo $user1['municipio'];?>" tabindex="15" placeholder="Municipio" maxlength="60" required>

      <br>
      <br>

      <p>Teléfono(s):<span style="color: #cd6701;">*</span></p></p>

        <input class="resp2" type="text" name="telefono" value="<?php echo $user1['telefono'];?>" tabindex="16" placeholder="Tel./ Cel." maxlength="10" required>

      <br>
      <br>

      <p>Correo electrónico:<span style="color: #cd6701;">*</span></p></p>
              
        <input class="resp2" type="email" name="correot" value="<?php echo $user1['correo'];?>" tabindex="17" placeholder="Correo electrónico" maxlength="50" required>

      <br>
      <br>
      <br>

      <p>Carrera de Egreso:<span style="color: #cd6701;">*</span></p></p>

         <input type="text" class="resp" name="carrera" list="car" value="<?php echo $user1['carrera_egreso'];?>" tabindex="18" placeholder="Carrera de Egreso" required>
        <datalist id="car">
          <option value="arquitectura" >arquitectura</option><option value="contador público" >contador público</option><option value="ingeniería civil" >ingeniería civil</option><option value="ingeniería eléctrica" >ingeniería eléctrica</option><option value="ingeniería electromecánica" >ingeniería electromecánica</option><option value="ingeniería en gestión empresarial" >ingeniería en gestión empresarial</option><option value="ingeniería en sistemas computacionales" >ingeniería en sistemas computacionales</option><option value="ingeniería industrial" >ingeniería industrial</option><option value="ingeniería informática" >ingeniería informática</option><option value="ingeniería mecánica" >ingeniería mecánica</option><option value="ingeniería mecatrónica" >ingeniería mecatrónica</option>
        </datalist>

        
       <br>
        <p>Especialidad:</p>

        <input class="resp" type="text" name="especialidad" value="<?php echo $user1['especialidad'];?>" tabindex="19" placeholder="Especialidad">
      <br>
      <br>

      <P>Fecha de Egreso:<span style="color: #cd6701;">*</span></p></P>

        <input type="date" class="resp3" name="egreso" value="<?php echo $user1['fecha_egreso'];?>" placeholder="" value="" tabindex="20" required>

      <br>
      <br>

      <p>Titulado(a):<span style="color: #cd6701;">*</span></p></p>

        
          <select  class="resp3" name="titulado" tabindex="21" required>
          <option selected><?php echo $user1['titulado'];?></option> <option value="Si">Si</option> <option value="No">No</option>
          </select>
        
      <br>
      <br>
      <br>

      <p>Dominio de idioma extranjero:</p>

       <p> Ingles:<span style="color: #cd6701;">*</span></p></p>
      <input class="resp3" type="number" min="0" max="100"  name="ingles" value="<?php echo $user1['dominio_idioma_extr'];?>" tabindex="22" placeholder="0% - 100%" required>

      <br>
      <br>

      <p>Otro:</p>

        <input class="resp2" type="text" name="otroidioma" value="<?php echo $user1['otro_idioma_extr'];?>" tabindex="23" placeholder="En caso de dominar otro(s) idioma(s) especifique" maxlength="30">

      <br>
      <br>

      <p>Manejo de paquetes computacionales (Especificar):</p>

        <input class="resp" type="text" name="paquetes" value="<?php echo $user1['paquetes_comp'];?>" tabindex="24" placeholder="Describa"></input> 
        <input type="hidden" name="editado" value="2019-05-08 13:36:37">
                

      <br>
      <br>
      <br>
      
    		<hr>
        <?php  if (empty($user1)) {

              echo "

                <div>
                  <input type='hidden'name='perfil' value='1'>
                  <input type='hidden' name='usuario' value='$id' > 
                   <button type='submit' class='btn btn-primary '>GUARDAR</button>
               
                </div>

                
                "; ?>
                 <a href="cuesPer.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>

             <?php }  else{

              if (!empty($user1)) {  ?>
                <a href="cuesPer.php?id=<?php echo $id?>" class="btn btn-primary float-right" >SIGUIENTE</a>
      

             <?php  }

            }
          ?> 
      <br>
    

  </div>
</section>
</form>
</div>
<?php
 include_once'templates/footer.php';
?>