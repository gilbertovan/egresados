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
  <div class="row">
    <div class="col-md-10">
      <section class="content">
         <div class="box">
          <div class="box-body">   
            <form role="form" method="post">
              <div class="form-group datosT " >
                  
                     <?php
                      $sql ="SELECT * FROM `ubicacion_laboral` WHERE usuario= $id";
                      $resultado = $con->query($sql);
                      $trabajoA = $resultado->fetch_assoc();
                    ?>
                       <h5> ACTIVIDAD A LA QUE SE DEDICA ACTUALMENTE  </h5>
                       <p class="resp"><?php echo $trabajoA['actividad']; ?></p>
                       <br>
                                          
                     <h5>TIEMPO TRANSCURRIDO PARA OBTENER EL PRIMER EMPLEO:</h5>
                      <p class="resp"><?php echo $trabajoA['tiempo_empleo']; ?></p>
                      <br>
                      <h5> MEDIO PARA OBTENER EMPLEO:</h5>
                      <p class="resp"><?php echo $trabajoA['medio_empleo']; ?></p>
                      <br>
                      <h5> IDIOMA QUE UTILIZA EN SU TRABAJO:</h5>    
                      <p class="resp"><?php echo $trabajoA['idioma_trabajo']; ?></p>
                      <br>
                      <h5>ANTIGÜEDAD EN EL EMPLEO:</h5>    
                      <p class="resp"><?php echo $trabajoA['antiguedad']; ?></p>
                      <br>
                      <h5>INGRESO (SALARIO MÍNIMO DIARIO):</h5> 
                      <p class="resp"><?php echo $trabajoA['salario']; ?></p>
                      <br>
                      <h5>NIVEL JERÁRQUICO EN EL TRABAJO:</h5>  
                      <p class="resp"><?php echo $trabajoA['cargo']; ?></p>
                      <br>
                      <h5>CONDICIÓN DE TRABAJO:</h5> 
                      <p class="resp"><?php echo $trabajoA['condicion']; ?></p> 
                      <br>
                      <h5> RELACIÓN DEL TRABAJO CON SU ÁREA DE FORMACIÓN:</h5> 
                      <p class="resp"><?php echo $trabajoA['relacion']; ?></p>
                      <br>
                      <h5> SECTOR ECONÓMICO DE LA EMPRESA U ORGANIZACIÓN:</h5>  
                      <p class="resp"><?php echo $trabajoA['sector_economico']; ?></p>
                      <br>
                      <h5>TAMAÑO DE LA EMPRESA U ORGANIZACIÓN:</h5> 
                      <p class="resp"><?php echo $trabajoA['tamanio_empresa']; ?></p> 
                     </div>
              </div>
            </form>
          </div>
        </div>
      </section> 
    </div>
  </div>
</div>
<?php
 include_once'templates/footer.php';
?>
