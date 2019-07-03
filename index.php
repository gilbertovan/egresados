<?php
    session_start();
    
    $titulo = 'Plataforma de Egresados | Inicio';
    require_once('parciales/arriba.php');
    require_once('parciales/nav.php');
?>
<body oncontextmenu="return false" onkeydown="return false">
    <div class="container1" id="pagina-principio1">
            <?php
            if(isset($_SESSION['usuario'])){
                // echo 
                 require_once('principal.php');             
             }
            else{
                  require_once('imag.php'); 
            }
        ?>
    </div>

<?php
       require_once('parciales/abajo.php');
?>