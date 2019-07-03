<?php 
include_once'../../recursos/conexion.php';
sleep(1);
if (isset($_POST)) {
  $email = (string)$_POST['email'];
      
    
    $result2 = $con->query(
        'SELECT * FROM perfiles WHERE Email = "'.strtolower($email).'"'
    );
    
    if ($result2->num_rows > 0) {
        echo '<div class="alert alert-danger">Email no disponible.</div>';
    } else {
        echo '<div class="alert alert-success">Email disponible.</div>';
    }
}
?>