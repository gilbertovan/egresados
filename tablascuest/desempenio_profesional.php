<?php
if (isset($_POST['desProf'])) {

    $id_insertado = $_POST['id_registro'];
    $eficiencia = $_POST['eficiencia'];
    $formacion = $_POST['formacion'];
    $utilidad = $_POST['utilidad'];
    $aspectos = $_POST['aspectos'];

    $area = $_POST['area'];
    $Titulacion = $_POST['Titulacion'];
    $Experiencia = $_POST['Experiencia'];
    $Competencia = $_POST['Competencia'];
    $Posicionamiento = $_POST['Posicionamiento'];
    $Conocimiento = $_POST['Conocimiento'];
    $Recomendaciones = $_POST['Recomendaciones'];
    $Personalidad = $_POST['Personalidad'];
    $Capacidad = $_POST['Capacidad'];
    $Otros = $_POST['Otros'];
    $editado = $_POST['editado'];
        
    try {

    	include_once'../recursos/conexion.php';
        $dec = $con->prepare("INSERT INTO  `desempenio_profesional` (`usuario` ,`eficiencia`,`califica`,`utilidad`,`aspectos`,`area_estudio`,`titulacion`,`experiencia_laboral`,`competencia_laboral`,`posicionamiento_egreso`,`conocimientos_idiomas`, `recomendaciones`,`personalidad`,`capacidad_liderazgo`,`otros`, `editado`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
        
        $dec->bind_param('issssiiiiiiiiiis', $id_insertado, $eficiencia,  $formacion, $utilidad, $aspectos, $area, $Titulacion, $Experiencia, $Competencia, $Posicionamiento, $Conocimiento, $Recomendaciones, $Personalidad, $Capacidad, $Otros, $editado);
        $dec->execute();
       
        if ($dec->affected_rows) {
            
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

if (isset($_POST['desProf_up'])) {

    include_once'../recursos/conexion.php';

    $id_insertado = $_POST['id_registro'];
    $eficiencia = $_POST['eficiencia'];
    $formacion = $_POST['formacion'];
    $utilidad = $_POST['utilidad'];
    $aspectos = $_POST['aspectos'];

    $area = $_POST['area'];
    $Titulacion = $_POST['Titulacion'];
    $Experiencia = $_POST['Experiencia'];
    $Competencia = $_POST['Competencia'];
    $Posicionamiento = $_POST['Posicionamiento'];
    $Conocimiento = $_POST['Conocimiento'];
    $Recomendaciones = $_POST['Recomendaciones'];
    $Personalidad = $_POST['Personalidad'];
    $Capacidad = $_POST['Capacidad'];
    $Otros = $_POST['Otros'];

    $id_com = $_POST['id_com'];
    
    try {
        $dec = $con->prepare("UPDATE `desempenio_profesional` SET  `usuario` = ?, `eficiencia` = ?, `califica` = ?, `utilidad` = ?, `aspectos` = ?, `area_estudio` = ?, `titulacion` = ?, `experiencia_laboral` = ?, `competencia_laboral` = ?, `posicionamiento_egreso` = ?, `conocimientos_idiomas` = ?, `recomendaciones` = ?, `personalidad` = ?, `capacidad_liderazgo` = ?, `otros` = ?, `editado` = NOW() WHERE `id` = ?");
         $dec->bind_param('issssiiiiiiiiiii', $id_insertado, $eficiencia,  $formacion, $utilidad, $aspectos, $area, $Titulacion, $Experiencia, $Competencia, $Posicionamiento, $Conocimiento, $Recomendaciones, $Personalidad, $Capacidad, $Otros, $id_com);
       
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