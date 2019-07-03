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
           <h1 class="titulosH">III. UBICACIÓN LABORAL</h1>

          <div class="box">
            <div class="box-header">
              </div>
            <!-- /.box-header -->
            <div class="box-body">
            <p>
                <li><b> Actividad</b> a la que se dedica actualmente</li>
                <li>En caso de trabajar: <b>tiempo </b> transcurrido para obtener el primer empleo</li>
                
              </p>
              <br>
              
              <table id="registro" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Actividad</th>
                  <th>Tiempo</th>
                  <th>periodo</th>
                  <th>Ver todo</th>
                 
                 </tr>
                </thead>
                <tbody>
                 
                      <?php 
                  try {


                   $sql = "SELECT ubicacion_laboral.id, ubicacion_laboral.actividad,  ubicacion_laboral.tiempo_empleo, perfil_egresado.nombre, perfil_egresado.apellido_paterno, perfil_egresado.apellido_materno, perfil_egresado.fecha_egreso, perfiles.Id FROM ubicacion_laboral  LEFT JOIN  perfiles  ON ubicacion_laboral.usuario=perfiles.Id INNER JOIN perfil_egresado ON perfil_egresado.usuario=perfiles.Id
                      UNION 
                      SELECT ubicacion_laboral.id, ubicacion_laboral.actividad,  ubicacion_laboral.tiempo_empleo, perfil_egresado.nombre, perfil_egresado.apellido_paterno, perfil_egresado.apellido_materno, perfil_egresado.fecha_egreso, perfiles.Id FROM ubicacion_laboral  RIGHT JOIN  perfiles  ON ubicacion_laboral.usuario=perfiles.Id INNER JOIN perfil_egresado ON perfil_egresado.usuario=perfiles.Id
                      ";
                    
                     $resultado = $con->query($sql);

                  } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                    
                  }while ($perfil= $resultado->fetch_assoc()){?>
                    <tr>
                          <?php    if (!empty($perfil['fecha_egreso'])) {
                        $fecha_egreso = $perfil['fecha_egreso'];
                        $fecha_egreso."<br>";
                        $fecha_egreso = strtotime($fecha_egreso);
                        $fecha_egreso = date ('d-m-Y', $fecha_egreso);
                        $fecha_egreso;
                      }
                       ?>
                                                               
                       <td><?php echo $perfil['nombre']; ?> <?php echo $perfil['apellido_paterno']; ?> <?php echo $perfil['apellido_materno']; ?></td>
                      <td><?php echo $perfil['actividad']; ?></td>
                      <td><?php echo $perfil['tiempo_empleo']; ?></td>
                      
                      <td><?php echo $fecha_egreso; ?></td>

                      <td> <center><a href="verT.php?id=<?php echo $perfil['Id'];?>"  ><i class="fas fa-edit"></i></a></center> 
                    
                  </tr>

                 <?php } ?> 
                         
                </tbody>
                <tfoot>
                  <tr>
                  <th>Nombre</th>
                  <th>Actividad</th>
                  <th>Tiempo</th>
                  <th>periodo</th>
                  <th>Ver todo</th>
                
                 
                  
                    
                  </tr>
                         
                </tbody>
                <tfoot>
              </table>

            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
       
  </div>

<?php

 include_once'templates/footer.php';
?>
