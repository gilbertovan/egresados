<?php

include_once'../funciones/sesiones.php';
include_once'../recursos/conexion.php';


include_once'templates/header.php';
include_once'templates/barra.php';
include_once'templates/navegacion.php';

?>
  <div class="content-wrapper">
     
   
   <section class="content">
      <div class="row">
        <div class="col-xs-8">
           <h1>III. UBICACIÓN LABORAL</h1>

          <div class="box">
            <div class="box-header">
              </div>
              <div class="box-body">
             
              <br>
              
              <table id="registro" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Actividad a la que se dedica actualmente</th>
                  
                  <th>periodo</th>
              
                
                 </tr>
                </thead>
                <tbody>
                 
                      <?php
                  try {
                    $sql = "SELECT ubicacion_laboral.actividad, perfil_egresado.fecha_egreso FROM ubicacion_laboral  INNER JOIN perfiles ON ubicacion_laboral.usuario=perfiles.Id INNER JOIN perfil_egresado ON perfil_egresado.usuario=perfiles.Id";

                    $resultado = $con->query($sql);

                  } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                    
                  }while ($perfil= $resultado->fetch_assoc()){?>
                    <tr>
                                                               
                      
                      <td><?php echo $perfil['actividad']; ?></td>
                      <td><?php echo $perfil['fecha_egreso']; ?></td>
                    
                  </tr>

                 <?php } ?> 
                         
                </tbody>
                <tfoot>
                  <tr>
                  <th>Actividad</th>
                  <th>periodo</th>
                  </tr>
                </tbody>
                <tfoot>
              </table>
            </div>
        </div>
      </div>
    </section>
  </div>
<?php

 include_once'templates/footer.php';
?>
