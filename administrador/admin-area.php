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
      <div class="col-lg-6 col-xs-6">
        <?php $sql = "SELECT COUNT(Id)as registros FROM perfiles";
        $resultado = $con->query($sql);
        $perfiles = $resultado->fetch_assoc(); ?>        
        <div class="small-box bg-yellow">
          <div class="inner">
            <h4>EGRESADOS REGISTRADOS:</h4> 
            <h2>
            <?php echo $perfiles['registros']; ?>
            <span> Egresados</span></h2>
          </div>
          <div class="icon" >
            <i class="fas fa-users"></i>
          </div>
          <center class="mas"><a href="listREGISTRADOS.php">  <br> Ver Detalles <br></a></center> 
        </div>
      </div>
      <div class="col-lg-6 col-xs-6">
        <?php $sql = "SELECT COUNT(Id)as registros2 FROM perfil_egresado";
        $resultado = $con->query($sql);
        $perfilegresado = $resultado->fetch_assoc();?>
        <div class="small-box bg-yellow">
            <div class="inner">
              <h4> CUESTIONARIOS RESPONDIDOS:</h4> 
              <h2><?php   echo $perfilegresado['registros2'];?>
              <span> Respondidos</span></h2>       
            </div>
            <div class="icon">
              <i class="fas fa-edit"></i>
            </div>
            <center class="mas"><a href="listE.php"  >  <br> Ver Detalles <br></a></center> 
        </div>
      </div>
    </div>
  </section>
</div>
<?php
 include_once'templates/footer.php';
?>