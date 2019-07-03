<?php 
include_once'../../recursos/conexion.php';
sleep(1);
if (isset($_POST)) {
    $usuarioAdmin = (string)$_POST['usuarioAdmin'];
    
    $result = $con->query(
        'SELECT * FROM admins WHERE usuarioAdmin = "'.strtolower($usuarioAdmin).'"'
    );
    
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger">Usuario no disponible.</div>';
    } else {
        echo '<div class="alert alert-success">Usuario disponible.</div>';
    }
}


?>