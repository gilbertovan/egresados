<?php
if (isset($_POST['pertinencia'])) {
 
    $usuario = $_POST['usuario'];
    $calidad = $_POST['calidad'];
    $plan = $_POST['plan'];
    $opor = $_POST['opor'];
    $enfasis = $_POST['enfasis'];
    $satis = $_POST['satis'];
    $expe = $_POST['expe'];
    $editado = $_POST['editado'];
        
    try {
   
        include_once'../recursos/conexion.php';
        $dec = $con->prepare("INSERT INTO  `pertinencia_disponibilidad` (`usuario` ,`calidad_docentes`,`plan_estudios`,`oportunidad_participar`,`enfasis_investigacion`,`satisfaccion_condiciones`,`experiencia_obtenida`, `editado`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");              
        $dec->bind_param('isssssss', $usuario, $calidad,  $plan, $opor, $enfasis, $satis, $expe, $editado);
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

if (isset($_POST['pertinencia_up'])) {

    include_once'../recursos/conexion.php';
    $usuario = $_POST['usuario'];
    $calidad = $_POST['calidad'];
    $plan = $_POST['plan'];
    $opor = $_POST['opor'];
    $enfasis = $_POST['enfasis'];
    $satis = $_POST['satis'];
    $expe = $_POST['expe'];
    $id_com = $_POST['id_com'];

    
    try {
        $dec = $con->prepare("UPDATE `pertinencia_disponibilidad` SET `usuario` = ?, `calidad_docentes`= ?, `plan_estudios`= ?, `oportunidad_participar`= ?, `enfasis_investigacion`= ?, `satisfaccion_condiciones`= ?, `experiencia_obtenida`= ?, `editado` = NOW() WHERE `id` = ?");
         $dec->bind_param('issssssi', $usuario, $calidad,  $plan, $opor, $enfasis, $satis, $expe, $id_com);
       
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