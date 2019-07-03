<?php
    require_once('funciones/sesionesE.php');
    require_once('recursos/conexion.php');

    $titulo = 'Plataforma de Egresados | Cuestionario de Seguimiento de Egresados';
    require_once('parciales/arriba.php');
    require_once('parciales/nav.php');
    
    require_once('parciales/logo.php');
?>

  <div class="container1" id="pagina-principio1">

    <?php
        if(isset($_SESSION['usuario'])){
      
            require_once('tablascuest/codigoCuestionario.php');
        }
        else{
          header('Location: index.php');
        }
    ?>
  </div>
  
<?php
    require_once('parciales/abajo.php');
?>