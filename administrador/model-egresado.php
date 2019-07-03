 <?php   
 require_once('../funciones/sesiones.php');
if ($_POST['regis'] == 'actualizar') {
        require_once('../recursos/conexion.php');
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        $id_registro = $_POST['Id'];
    try {
        if (empty($_POST ['clave'])) {
            $dec = $con->prepare("UPDATE `perfiles` SET `Nombre` = ?, `Apellido` = ?, `Usuario` = ?,  `Email` = ?, `editado` = NOW() WHERE `Id` = ?");
            $dec->bind_param("ssssi", $nombre, $apellido, $usuario, $email, $id_registro);
        } else{ 
            $opciones =array(
            'cost' => 12
            );
            $hash_password = password_hash($clave, PASSWORD_BCRYPT, $opciones);
            $dec = $con->prepare('UPDATE `perfiles` SET `Nombre` = ?, `Apellido` = ?, `Usuario` = ?,  `Email` = ?, `Clave` = ?, `editado` = NOW() WHERE `Id` = ?');
            $dec->bind_param("sssssi",  $nombre, $apellido, $usuario, $email, $hash_password, $id_registro);
        }
        $dec->execute();
        if ($dec->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    $dec->close();
    $con->close();  
    }catch (Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessager()     
        );  
   }die(json_encode($respuesta));
}

if ($_POST['regis'] == 'eliminar'){
    $id_borrar = $_POST['id'];
    try {
      
        include_once'../recursos/conexion.php';
        $dec = $con->prepare('DELETE FROM perfiles  WHERE Id = ?');
        $dec->bind_param('i', $id_borrar);
        $dec->execute();
        if ($dec->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        }else{
             $respuesta = array(
            'respuesta' => 'error'
            );
        }      
    }catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessager()
        );
    }die(json_encode($respuesta));
}
    

