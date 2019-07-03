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
           <h1 class="titulosH">perfil del egresado</h1>

          <div class="box">
            <div class="box-header">
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registro" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>NOMBRE</th>
                   <th>SEXO</th>
                  <th>TITULADO</th>
                  <th>PERIODO</th>
                  
                
                 </tr>
                </thead>
                <tbody>
                      <?php
                  try {
                    $sql = "SELECT * FROM perfil_egresado";
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
                      <td><?php echo $perfil['sexo']; ?></td>
                       <td><?php echo $perfil['titulado']; ?></td> 
                       <td><?php echo $fecha_egreso; ?></td>
                     
                      
                    
                                            

                     </td>
                  </tr>

                 <?php } ?> 
                         
                </tbody>
                <tfoot>
                  <tr>
                  <th>NOMBRE</th>
                  <th>SEXO</th>
                  <th>TITULADO</th>
                  <th>PERIODO</th>
                 
                  
                    
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
