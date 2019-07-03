 <?php  
  require_once('../funciones/sesiones.php');
if ($_POST['registr'] == 'actualiza') {
        include_once'../recursos/conexion.php';

        
        $empresa = $_POST['empresa'];
        $vacante = $_POST['vacante'];
        $area = $_POST['area'];
        $des = $_POST['des'];
        $contacto = $_POST['contacto'];
        $id_registro = $_POST['id_trabajo'];
        try {         
            $dec = $con->prepare("UPDATE `bolsa_trabajo` SET `empresa` = ?, `vacante` = ?, `area` = ?, `des` = ?, `contacto` = ?, `editado` = NOW()  WHERE `id_trabajo` = ?");
            $dec->bind_param("sssssi", $empresa, $vacante, $area, $des, $contacto, $id_registro);       
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
if ($_POST['registr'] == 'eliminar'){
    include_once'../recursos/conexion.php';
    $id_borrar = $_POST['id'];
    try {
        
        $dec = $con->prepare('DELETE  FROM `bolsa_trabajo` WHERE `id_trabajo` = ? ');
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

