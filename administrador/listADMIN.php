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
          <h1 class="titulosH">Administradores</h1>
          <div class="box">    
            <div class="box-body">
              <table id="registro" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>USUARIO</th>
                    <th>NOMBRE COMPLETO</th>
                    <th>NIVEL</th>
                    <th>ACCIÓN</th>
                 </tr>
                </thead>
                <tbody>
                  <?php
                  try {
                    $sql = "SELECT * FROM admins";
                    $resultado = $con->query($sql);

                  } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                    
                  }while ($admin= $resultado->fetch_assoc()){?>
                    <tr>
                      <td><?php echo $admin['usuarioAdmin']; ?></td>
                      <td><?php echo $admin['nombreAdmin']; ?> <?php echo $admin['apAdmin']; ?></td>
                      <td><?php echo $admin['nivel']; ?></td>
                    
                      <td> 
                       <center> <a href="editar-admin.php?id=<?php echo $admin ['id_admin']?>" class="margin" ><i class="fas fa-user"></i></a>
                        <a href="#" data-id="<?php echo $admin['id_admin'] ?>" data-tipo="admin" class ="borrar_registro" > <i class="fas fa-trash"></i></a></center>
                      </td>
                    </tr>
                    <?php } ?>    
                </tbody>
                <tfoot>
                  <tr>
                     <th>USUARIO</th>
                    <th>NOMBRE COMPLETO</th>
                    <th>NIVEL</th>
                    <th>ACCIÓN</th>
                  </tr>
                </tfoot>
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
