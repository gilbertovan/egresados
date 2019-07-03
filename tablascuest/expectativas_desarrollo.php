<?php
if (isset($_POST['expectativa'])) {
 
    $id_insertado = $_POST['id_registro'];
    $curso = $_POST['curso'];
    $cualescur = $_POST['cualescur'];
    $posgrado = $_POST['posgrado'];
    $cualespos = $_POST['cualespos'];
    $editado = $_POST['editado'];

    try {

    	include_once'../recursos/conexion.php';
        $dec = $con->prepare("INSERT INTO  `expectativas_desarrollo` (`usuario` ,`cursos_actualizacion`,  `cuales_actualizacion`,`iniciar_posgrado`,`cual_posgrado`, `editado`) VALUES (?, ?, ?, ?, ?, ?)");
        
        $dec->bind_param('isssss', $id_insertado, $curso,  $cualescur, $posgrado, $cualespos, $editado);
        $dec->execute();
        
        $id_insertado = $dec->insert_id;
        if ($id_insertado > 0) {
        	$respuesta = array(
                'respuesta' => 'exito',
                'id' => $id_insertado
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

if (isset($_POST['expectativa_up'])) {

    include_once'../recursos/conexion.php';
	    $id_insertado = $_POST['id_registro'];
	    $curso = $_POST['curso'];
	    $cualescur = $_POST['cualescur'];
	    $posgrado = $_POST['posgrado'];
	    $cualespos = $_POST['cualespos'];
	    $id_com = $_POST['id_com'];
    
    try {
        $dec = $con->prepare("UPDATE `expectativas_desarrollo` SET  `usuario` = ?, `cursos_actualizacion` = ?, `cuales_actualizacion` = ?, `iniciar_posgrado` = ?, `cual_posgrado` = ?, `editado` = NOW() WHERE `id` = ?");
         $dec->bind_param('issssi', $id_insertado, $curso,  $cualescur, $posgrado, $cualespos, $id_com);
       
        $dec->execute();
        if ($dec->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_com
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
?>