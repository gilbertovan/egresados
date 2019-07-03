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
          <h1 class="titulosH"> ofertas de trabajo</h1>
          <div class="box">    
            <div class="box-body">
              <table id="registro" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>EMPRESA</th>
                    <th>VACANTE</th>
                     <th>ÁREA</th>
                     <th>ACCIÓN</th>
                 </tr>
                </thead>
                <tbody>
                  <?php
                  try {
                     $sql = "SELECT * FROM bolsa_trabajo";
                  $resultado = $con->query($sql);
                    
                  } catch (Exception $e) {
                       $error = $e->getMessage();
                    echo $error; 
                    
                  }
                 

                 while ($trabajo= $resultado->fetch_assoc()){?>
                    <tr>
                      <td><?php echo $trabajo['empresa']; ?></td>
                      <td><?php echo $trabajo['vacante']; ?></td>
                      <td><?php echo $trabajo['area']; ?></td>
                                                             
                      <td> 
                        <a href="editar-trabajo.php?id=<?php echo $trabajo ['id_trabajo']?>" class="margin" ><i class="fas fa-edit"></i></a>
                          <a href="#" data-id="<?php echo $trabajo['id_trabajo'] ?>" data-tipo="trabajo" class ="borrar_registroT" > <i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>    
                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>EMPRESA</th>
                    <th>VACANTE</th>
                     <th>ÁREA</th>
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
