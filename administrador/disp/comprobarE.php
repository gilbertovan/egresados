<?php 
include_once'../../recursos/conexion.php';
sleep(1);
if (isset($_POST)) {
  $usuario = (string)$_POST['usuario'];
      
    
    $result = $con->query(
        'SELECT * FROM perfiles WHERE Usuario = "'.strtolower($usuario).'"'
    );
    
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger">Usuario no disponible.</div>';
    } else {
        echo '<div class="alert alert-success">Usuario disponible.</div>';
    }
}

?>