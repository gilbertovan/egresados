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
           <h1 class="titulosH">Cuestionario de egresados</h1>

          <div class="box">
            <div class="box-header">
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registro" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Nombre</th>
                    <th>N.control</th>
                    <th>Especialidad</th>
                    <th>Actividad actualmente</th>
                    <th>Fecha de egreso </th>
                    <th>Acciones</th>
                 </tr>
                </thead>
                <tbody>

                  <?php
                  try {
                    $sql = "SELECT perfiles.Id, perfil_egresado.apellido_paterno, perfil_egresado.apellido_materno, perfil_egresado.nombre, perfil_egresado.no_control, perfil_egresado.carrera_egreso, ubicacion_laboral.actividad, perfil_egresado.fecha_egreso FROM perfiles INNER JOIN perfil_egresado ON perfiles.Id=perfil_egresado.usuario INNER JOIN ubicacion_laboral ON perfiles.Id=ubicacion_laboral.usuario";
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
                      <td><?php echo $perfil['apellido_paterno']; ?> <?php echo $perfil['apellido_materno']; ?> <?php echo $perfil['nombre']; ?> </td> 
                      <td><?php echo $perfil['no_control']; ?></td>
                      <td><?php echo $perfil['carrera_egreso']; ?></td>
                      <td><?php echo $perfil['actividad']; ?></td>
                      <td><?php echo $fecha_egreso; ?></td>                  
        
                    
                    <td> <center> <a href="editar-egresado.php?id=<?php echo $perfil ['Id'];?>" ><i class="fas fa-user"></i></a>

                          <a href="#"data-id="<?php echo $perfil['Id'];  ?>" data-tipo="egresado" class ="  borrar_registroE" > <i class="fas fa-trash"></i></a>

                         <a href="cuestionario.php?id=<?php echo $perfil ['Id'];?>" ><i class="fas fa-eye"></i></a></center>
                          

                     </td>
                  </tr>

                 <?php } ?> 
                         
                </tbody>
                <tfoot>
                  <tr>
                     <th>Nombre</th>
                    <th>N.control</th>
                    <th>Especialidad</th>
                    <th>Actividad actualmente</th>
                    <th>Fecha de egreso </th>
                    <th>Acciones</th>
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
  </div>
<?php

 include_once'templates/footer.php';
?>
