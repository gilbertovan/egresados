<?php
    $con = new mysqli('localhost', 'root', '', 'egresadositi');
    if($con -> connect_error){
        die('Conexion no establecida: ' . $con -> connect_error);
    }
 ?>