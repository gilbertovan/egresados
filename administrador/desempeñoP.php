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
        <div class="col-xs-12">
           <h1 class="titulosH">IV. DESEMPEÑO PROFESIONAL DE LOS EGRESADOS</h1>

          <div class="box">
            <div class="box-header">
              </div>
              <div class="box-body">
              <p>
                <li><b> Eficiencia</b> para realizar las actividades laborales en relación con su formación académica</li>
                <li> Cómo califica su <b> formación académica</b> con respecto a su desempeño laboral</li>
                <li><b>Utilidad de las residencias </b> profesionales o prácticas profesionales para su desarrollo laboral y profesional</li>
                
              </p>
              <br>
              
              <table id="registro" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Eficiencia</th>
                    <th>formación académica</th>
                    <th>Utilidad de las residencias</th>
                    <th>periodo</th>
                    
                  
                   </tr>
                </thead> 
                <tbody>
                 
                  <?php
                  try {
                    $sql = "SELECT desempenio_profesional.eficiencia, desempenio_profesional.califica, desempenio_profesional.utilidad, perfil_egresado.nombre, perfil_egresado.apellido_paterno, perfil_egresado.apellido_materno, perfil_egresado.fecha_egreso FROM desempenio_profesional INNER JOIN perfiles ON desempenio_profesional.usuario=perfiles.Id  INNER JOIN perfil_egresado  ON perfil_egresado.usuario=perfiles.Id";
                    $resultado = $con->query($sql);

                  } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                    
                  }while ($perfil= $resultado->fetch_assoc()){?>
                    <tr>
                        <?php
                      if (!empty($perfil['fecha_egreso'])) {
                        $fecha_egreso = $perfil['fecha_egreso'];
                        $fecha_egreso."<br>";
                        $fecha_egreso = strtotime($fecha_egreso);
                        $fecha_egreso = date ('d-m-Y', $fecha_egreso);
                        $fecha_egreso;
                      }
                      ?>
                                                               
                      <td><?php echo $perfil['nombre']; ?> <?php echo $perfil['apellido_paterno']; ?> <?php echo $perfil['apellido_materno']; ?></td>
                      <td><?php echo $perfil['eficiencia']; ?></td>
                      <td><?php echo $perfil['califica']; ?></td>
                      <td><?php echo $perfil['utilidad']; ?></td>
                      
                      <td><?php echo $fecha_egreso; ?></td>
      
                     </td>
                  </tr>

                 <?php } ?> 
                         
                </tbody>
                <tfoot>
                    <tr>
                    <th>Nombre</th>
                    <th>Eficiencia</th>
                    <th>formación académica</th>
                    <th>Utilidad de las residencias</th>
                    <th>periodo</th>
                    </tr>
                  </tbody>
                <tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

<?php

 include_once'templates/footer.php';
?>
