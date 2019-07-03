<?php
    require_once('funciones/sesionesE.php');
    require_once('recursos/conexion.php');
   
    $titulo = 'Plataforma de Egresados | Bolsa de trabajo';
    require_once('parciales/arriba.php');
    require_once('parciales/nav.php');
    
    require_once('parciales/logo.php');
    
?>

<section class="cuerpo ">
  <h1>Bolsa de trabajo</h1>
  <br>
  <br>

  <?php 
  try {
    require_once('recursos/conexion.php');
    $sql = " SELECT id_trabajo, empresa, vacante, area, des, contacto FROM bolsa_trabajo";
    $resultado = $con->query($sql);
      
  } catch (\Exception $e) {
    echo $e->getMessage();
  }
  ?>
  <div class="calendario ">
    <?php 
    $calendario = array();
    while ($trabajos = $resultado->fetch_assoc()) {
      $titulo = $trabajos ['empresa'];
      $trabajo = array(

        'titulo' => $trabajos ['empresa'],
        'vac' => $trabajos ['vacante'],
        'ar' => $trabajos ['area'],
        'de' => $trabajos ['des'],
        'con' => $trabajos ['contacto']
      );

      $calendario[$titulo][] = $trabajo;
    
    }?><!-- fin del while-->

    <?php 

        foreach ($calendario as $tit => $lista_trabajo) {?>

      
      <h3>
        
        <?php echo $tit; ?>
      </h3>

  
     
      <?php foreach ($lista_trabajo as $trabajo) {?>
        <div class="dia">
           <p class="titulo"><i class="fa fa-building"></i><?php echo $trabajo['titulo'] ?></p> 
          <p class="titulo"><i class="fa fa-briefcase"></i><?php echo $trabajo['vac'] ?></p>
          <p class="titulo"><i class="fa fa-id-card "></i><?php echo $trabajo['ar'] ?></p>
          <p class="titulo"><i class="fa fa-align-justify"></i><?php echo $trabajo['de'] ?></p>
          <p class="titulo"><i class="fa fa-phone"></i><?php echo $trabajo['con'] ?></p>
          <hr class="sep">  
          
        </div> 
      <?php }  ?>
      <?php }  ?>

    </div>
   <?php $con->close(); ?>
 </section>
  <?php
  require_once('parciales/abajo.php');
?>