<?php  
 require_once('../funciones/sesiones.php');
if (isset($_POST['agregar-trabajo'])) {
    $empres = $_POST['empresa'];
    $vacant =$_POST['vacante'];
    $are = $_POST['area'];
    $de = $_POST['des'];
    $contac = $_POST['contacto'];
    $editado = $_POST['editado'];


  try {
        include_once'../recursos/conexion.php';
        $dec = $con->prepare("INSERT INTO  `bolsa_trabajo` ( `empresa`, `vacante`, `area`, `des`, `contacto`,  `editado`) VALUES (?, ?, ?, ?, ?, ?) ");
         $dec->bind_param('ssssss', $empres, $vacant, $are, $de, $contac, $editado);
         $dec->execute();
         $id_insertado = $dec->insert_id;
        if ($id_insertado > 0) {
            
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado
            );
        }else{
            $respuesta = array(
             'respuesta' => 'Error'
            );
        }
        $dec->close();
        $con->close(); 
    

    }catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessager()
        );
    } die(json_encode($respuesta));
}
