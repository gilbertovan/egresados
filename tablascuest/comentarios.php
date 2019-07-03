<?php 
if (isset($_POST['Comentarios'])) {

    $usuario = $_POST['usuario'];
    $comentario = $_POST['comentario'];
    $editado = $_POST['editado'];
        
    try {
   
        include_once'../recursos/conexion.php';
        $dec = $con->prepare("INSERT INTO  `comentarios_sugerencias` ( `usuario`, `opinion_recomendaciones`, `editado`) VALUES (?, ?, ?)");              
        $dec->bind_param('iss', $usuario, $comentario, $editado);
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

if (isset($_POST['editar_up'])) {

    include_once'../recursos/conexion.php';
    $usuario = $_POST['usuario'];
    $comentario = $_POST['comentario'];
    $id_com = $_POST['id_com'];

    
    try {
        $dec = $con->prepare("UPDATE `comentarios_sugerencias` SET  `usuario` = ?, `opinion_recomendaciones` = ?, `editado` = NOW() WHERE `id` = ?");
         $dec->bind_param('isi', $usuario,  $comentario, $id_com);
       
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