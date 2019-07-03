<?php
	if (isset($_POST['participacion'])) {

    $usuario = $_POST['usuario'];
    $orgasoci = $_POST['orgasoci'];
    $cualesorg = $_POST['cualesorg'];
    $orgprof = $_POST['orgprof'];
    $cualesprof = $_POST['cualesprof']; 
    $asocegresados = $_POST['asocegresados'];
    $cualesE = $_POST['cualesE'];
    $editado = $_POST['editado'];

    try {
        include_once'../recursos/conexion.php';
        $dec = $con->prepare("INSERT INTO  `participacion_social` ( `usuario` ,`sociales`,  `cual_sociales`,`profesionistas`,`cual_profesionistas` ,`egresados`,`cual_egresados`, `editado`) VALUES (?, ?, ?, ?, ?, ? ,? ,?)");
        $dec->bind_param('isssssss', $usuario, $orgasoci, $cualesorg, $orgprof, $cualesprof, $asocegresados, $cualesE, $editado);
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

if (isset($_POST['participacion_up'])) {

    include_once'../recursos/conexion.php';
    $usuario = $_POST['usuario'];
    $orgasoci = $_POST['orgasoci'];
    $cualesorg = $_POST['cualesorg'];
    $orgprof = $_POST['orgprof'];
	$cualesprof = $_POST['cualesprof']; 
	$asocegresados = $_POST['asocegresados'];
	$cualesE = $_POST['cualesE'];
    
    $id_com = $_POST['id_par'];

    
    try {
        $dec = $con->prepare("UPDATE `participacion_social` SET  `usuario` = ?, `sociales` = ?, `cual_sociales` = ?, `profesionistas` = ?, `cual_profesionistas` = ?, `egresados` = ?, `cual_egresados` = ?, `editado` = NOW() WHERE `id` = ?");
         $dec->bind_param('issssssi', $usuario,  $orgasoci, $cualesorg, $orgprof, $cualesprof, $asocegresados, $cualesE, $id_com);
       
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