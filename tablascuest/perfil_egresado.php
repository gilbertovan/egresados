<?php
if (isset($_POST['perfil'])) {
        
        $usuario = $_POST['usuario'];
        $apellidopa = $_POST['apellidopa'];
        $apellidoma = $_POST['apellidoma'];
        $nombret = $_POST['nombret'];
        $control = $_POST['control'];
        $fechanacimiento = $_POST['fechanacimiento'];
        $curp = $_POST['curp'];
        $sexo = $_POST['sexo'];
        $civil = $_POST['civil'];
        $otrocivil = $_POST['otrocivil'];
        $calle = $_POST['calle'];
        $no = $_POST['no'];
        $colonia = $_POST['colonia'];
        $postal = $_POST['postal'];
        $ciudad = $_POST['ciudad'];
        $municipio = $_POST['municipio'];
        $telefono = $_POST['telefono'];
        $correot = $_POST['correot'];
        $carrera = $_POST['carrera'];
        $especialidad = $_POST['especialidad'];
        $egreso = $_POST['egreso'];
        $titulado = $_POST['titulado'];
        $ingles = $_POST['ingles'];
        $otroidioma = $_POST['otroidioma'];
        $paquetes = $_POST['paquetes'];
        $editado = $_POST['editado'];

  try {
        include_once'../recursos/conexion.php';
        $dec = $con->prepare("INSERT INTO  `perfil_egresado` (`usuario` ,`apellido_paterno`,`apellido_materno`,`nombre`,`no_control`,`fecha_nacimiento`,`curp`,`sexo`,`estado_civil`,`otro_civil`,`calle`,`no`,`colonia`,`postal`,`ciudad`,`municipio`,`telefono`,`correo`,`carrera_egreso`,`especialidad`,`fecha_egreso`,`titulado`, `dominio_idioma_extr`, `otro_idioma_extr`, `paquetes_comp`, `editado`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

         $dec->bind_param('isssssssssssssssssssssisss', $usuario, $apellidopa,  $apellidoma, $nombret, $control, $fechanacimiento, $curp, $sexo, $civil, $otrocivil, $calle, $no, $colonia, $postal, $ciudad, $municipio, $telefono, $correot, $carrera, $especialidad, $egreso, $titulado, $ingles, $otroidioma, $paquetes, $editado);
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

if (isset($_POST['editar_up'])) {

    include_once'../recursos/conexion.php';
        $usuario = $_POST['usuario'];
        $apellidopa = $_POST['apellidopa'];
        $apellidoma = $_POST['apellidoma'];
        $nombret = $_POST['nombret'];
        $control = $_POST['control'];
        $fechanacimiento = $_POST['fechanacimiento'];
        $curp = $_POST['curp'];
        $sexo = $_POST['sexo'];
        $civil = $_POST['civil'];
        $otrocivil = $_POST['otrocivil'];
        $calle = $_POST['calle'];
        $no = $_POST['no'];
        $colonia = $_POST['colonia'];
        $postal = $_POST['postal'];
        $ciudad = $_POST['ciudad'];
        $municipio = $_POST['municipio'];
        $telefono = $_POST['telefono'];
        $correot = $_POST['correot'];
        $carrera = $_POST['carrera'];
        $especialidad = $_POST['especialidad'];
        $egreso = $_POST['egreso'];
        $titulado = $_POST['titulado'];
        $ingles = $_POST['ingles'];
        $otroidioma = $_POST['otroidioma'];
        $paquetes = $_POST['paquetes'];
        $id_com = $_POST['id_com'];
    
    try {
        $dec = $con->prepare("UPDATE `perfil_egresado` SET  `usuario` = ?, `apellido_paterno` = ?, `apellido_materno` = ?, `nombre` = ?, `no_control` = ?, `fecha_nacimiento` = ?, `curp` = ?, `sexo` = ?, `estado_civil` = ?, `otro_civil` = ?, `calle` = ?, `no` = ?, `colonia` = ?, `postal` = ?, `ciudad` = ?, `municipio` = ?, `telefono` = ?, `correo` = ?, `carrera_egreso` = ?, `especialidad` = ?, `fecha_egreso` = ?, `titulado` = ?, `dominio_idioma_extr` = ?, `otro_idioma_extr` = ?, `paquetes_comp` = ?, `editado` = NOW() WHERE `id` = ?");
         $dec->bind_param('isssssssssssssssssssssissi', $usuario, $apellidopa,  $apellidoma, $nombret, $control, $fechanacimiento, $curp, $sexo, $civil, $otrocivil, $calle, $no, $colonia, $postal, $ciudad, $municipio, $telefono, $correot, $carrera, $especialidad, $egreso, $titulado, $ingles, $otroidioma, $paquetes, $id_com);
       
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