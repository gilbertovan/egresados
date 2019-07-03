 <?php  
 require_once('../funciones/sesiones.php');
if ($_POST['registro'] == 'actualizar') {
   
include_once'../recursos/conexion.php';
    $usuarioAdmin = $_POST['usuarioAdmin'];
    $nombreAdmin = $_POST['nombreAdmin'];
    $apAdmin = $_POST['apAdmin'];
    $password = $_POST['password'];
    $nivel = $_POST['nivel'];
    $id_registro = $_POST['id_registro'];
    try {

     
        if (empty($_POST ['password'])) {
            $dec = $con->prepare("UPDATE `admins` SET `usuarioAdmin` = ?, `nombreAdmin` = ?, `apAdmin` = ?,  `nivel` = ?, `editado` = NOW() WHERE `id_admin` = ?");
            $dec->bind_param("sssii", $usuarioAdmin, $nombreAdmin, $apAdmin, $nivel, $id_registro);
        } else{ 
            $opciones =array(
            'cost' => 12
            );
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            $dec = $con->prepare('UPDATE `admins` SET `usuarioAdmin` = ?, `nombreAdmin` = ?,  `apAdmin` = ?, `password` = ?, `nivel` = ?, `editado` = NOW() WHERE `id_admin` = ?');
            $dec->bind_param("sssii", $usuarioAdmin, $nombreAdmin, $apAdmin, $hash_password, $nivel, $id_registro);
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



if ($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];
    try {
        include_once'../recursos/conexion.php';
        $dec = $con->prepare('DELETE  FROM `admins` WHERE `id_admin` = ? ');
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


