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
           <h1 class="titulosH">Cuenta de egresados</h1>

          <div class="box">
            <div class="box-header">
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registro" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Nombre</th>
                 
                  <th>Usuario</th>
                   <th>Email</th>
                 <th>Núm. C. Registrado</th>

                   <th>Acciones</th>

                  </tr>
                </thead>
                <tbody>
                      <?php
                  try {
    
                   $sql = "SELECT perfiles.Id, perfiles.Nombre, perfiles.Apellido, perfiles.Usuario, perfiles.Email, perfil_egresado.id, perfil_egresado.usuario, perfil_egresado.no_control, perfil_egresado.fecha_egreso FROM perfiles LEFT JOIN
                   perfil_egresado ON   perfiles.Id=perfil_egresado.usuario UNION 
                   SELECT perfiles.Id, perfiles.Nombre, perfiles.Apellido, perfiles.Usuario, perfiles.Email, perfil_egresado.id, perfil_egresado.usuario, perfil_egresado.no_control, perfil_egresado.fecha_egreso FROM perfiles RIGHT JOIN
                   perfil_egresado ON   perfiles.Id=perfil_egresado.usuario where perfil_egresado.id is NULL";     
                      


                    $resultado = $con->query($sql);

                  } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                    
                  }while ($perfil= $resultado->fetch_assoc()){?>
                    <tr>
                                                               
                       
                    <td><?php echo $perfil['Apellido']; ?> <?php echo $perfil['Nombre']; ?> </td> 
                      
                      <td><?php echo $perfil['Usuario']; ?></td>
                     <td><?php echo $perfil['Email']; ?></td>
                      <td><?php echo $perfil['no_control']; ?> </td>
                      
          
                       
                    <td> <center> <a href="editar-egresado.php?id=<?php echo $perfil ['Id'];?>" class="" ><i class="fas fa-user"></i> </a>

                     <a href="#"data-id="<?php echo $perfil['Id'];  ?>" data-tipo="egresado" class ="  borrar_registroE" > <i class="fas fa-trash"></i></a>
                                                          
                     <a href="Realizar.php?id=<?php echo $perfil ['Id'];?>" class="" ><i class="fas fa-edit"></i></a></center>


                     </td>
                  </tr>

                 <?php } ?> 
                         
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    
                    <th>Usuario</th>
                     <th>Email</th>
                    <th>Núm. C. Registrado</th>
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
       

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php

 include_once'templates/footer.php';
?>
