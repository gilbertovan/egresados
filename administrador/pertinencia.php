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
           <h1 class="titulosH">II. PERTINENCIA Y DISPONIBILIDAD DE MEDIOS Y RECURSOS PARA EL APRENDIZAJE</h1>

          <div class="box">
            <div class="box-header">
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p>
                <li><b>Calidad </b> de los docentes</li>
                <li> <b>Plan</b> de estudios</li>
                <li><b>Oportunidad</b> de participar en proyectos de investigación y desarrollo</li>
                <li><b>Énfasis</b> que se le prestaba a la investigación dentro del proceso de enseñanza</li>
                <li><b>Satisfacción</b> con las condiciones de estudio (infraestructura)</li>
                <li><b>Experiencia </b> obtenida a través de la residencia profesional</li>
              </p>
              <br>
              
              <table id="registro" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Calidad</th>
                  <th>plan</th>
                  <th>Oportunidad</th>
                  <th>Énfasis</th>
                  <th>Satisfacción</th>
                  <th>Experiencia</th>
                  <th>periodo</th>
                  
                
                 </tr>
                </thead>
                <tbody>
                 
                      <?php
                  try {
                    $sql = "SELECT pertinencia_disponibilidad.calidad_docentes, pertinencia_disponibilidad.plan_estudios, pertinencia_disponibilidad.oportunidad_participar, pertinencia_disponibilidad.enfasis_investigacion, pertinencia_disponibilidad.satisfaccion_condiciones, pertinencia_disponibilidad.experiencia_obtenida, perfil_egresado.nombre, perfil_egresado.apellido_paterno, perfil_egresado.apellido_materno,  perfil_egresado.fecha_egreso FROM pertinencia_disponibilidad INNER JOIN perfiles ON pertinencia_disponibilidad.usuario=perfiles.Id  INNER JOIN perfil_egresado  ON perfil_egresado.usuario=perfiles.Id  ";
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
                      <td><?php echo $perfil['calidad_docentes']; ?></td>
                      <td><?php echo $perfil['plan_estudios']; ?></td>
                      <td><?php echo $perfil['oportunidad_participar']; ?></td>
                      <td><?php echo $perfil['enfasis_investigacion']; ?></td>
                      <td><?php echo $perfil['satisfaccion_condiciones']; ?></td>
                      <td><?php echo $perfil['experiencia_obtenida']; ?></td>
                      <td><?php echo $fecha_egreso; ?></td>
                      
                      
                      
                      
                      
                     
                      
                    
                                            

                     </td>
                  </tr>

                 <?php } ?> 
                         
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                   <th>Calidad</th>
                    <th>plan</th>
                    <th>Oportunidad</th>
                    <th>Énfasis</th>
                    <th>Satisfacción</th>
                    <th>Experiencia</th>
                    <th>periodo</th>
                 
                  
                    
                  </tr>
                         
                </tbody>
                <tfoot>
              </table>
            </div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
       
       

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php

 include_once'templates/footer.php';
?>
