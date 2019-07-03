<?php
	if (isset($_POST['agregar_ul'])) {

        $usuario = $_POST['usuario'];
        $actividad = $_POST['actividad'];
        $estudia = $_POST['estudia'];
        $otro_est = $_POST['otro_est'];
        $espe_inst = $_POST['espe_inst'];
        $tiempo = $_POST['tiempo'];
        $medio = $_POST['medio'];
        $otromedio = $_POST['otromedio'];
        $requisitos = $_POST['requisitos'];
        $otrosrequi = $_POST['otrosrequi'];
        $idioma1 = $_POST['idioma1'];
        $otroidioma1 = $_POST['otroidioma1'];
        $hablar = $_POST['hablar'];
        $escribir = $_POST['escribir'];
        $leer = $_POST['leer'];
        $escuchar = $_POST['escuchar'];
        $antiguedad = $_POST['antiguedad'];
        $ingresoem = $_POST['ingresoem'];
        $salario = $_POST['salario'];
        $cargo = $_POST['cargo'];
        $perfil = $_POST['perfil'];
        $condicion = $_POST['condicion'];
        $otroscondi = $_POST['otroscondi'];
        $relacion = $_POST['relacion'];
        $organismo = $_POST['organismo'];
        $giro = $_POST['giro'];
        $razon = $_POST['razon'];
        $calleemp = $_POST['calleemp'];
        $numemp = $_POST['numemp'];
        $coloniaemp = $_POST['coloniaemp'];
        $cpemp = $_POST['cpemp'];
        $ciudad = $_POST['ciudad'];
        $municipio = $_POST['municipio'];
        $estado = $_POST['estado'];
        $telext = $_POST['telext'];
        $Fax = $_POST['Fax'];
        $Email = $_POST['Email'];
        $pagweb = $_POST['pagweb'];
        $nomtpuest = $_POST['nomtpuest'];
        $sector = $_POST['sector'];
        $otrosector = $_POST['otrosector'];
        $tamanioemp = $_POST['tamanioemp'];
        $editado = $_POST['editado'];

  	try {
        include_once'../recursos/conexion.php';
        $dec = $con->prepare("INSERT INTO  `ubicacion_laboral` (`usuario` ,`actividad`,`estudio`,`otro_estudio`,`especialidad_institucion`,`tiempo_empleo`,`medio_empleo`,`otro_empleo`,`requisitos`,`otro_requisitos`,`idioma_trabajo`,`otro_idioma`,`hablar`,`escribir`,`leer`,`escuchar`,`antiguedad`,`anio_ingreso`,`salario`,`cargo`,`perfil`,`condicion`,`otro_condicion`,`relacion`,`organismo`,`giro_empresa`,`razon`,`calle_em`,`no_em`,`colonia_em`,`cp_em`,`ciudad_em`,`municipio_em`,`estado_em`,`telefono_em`,`fax`,`email`,`pag_web`,`nombre_puesto`,`sector_economico`,`otro_economico`,`tamanio_empresa`, `editado`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $dec->bind_param('issssssssssssssssssssssssssssssssssssssssss', $usuario, $actividad,  $estudia, $otro_est, $espe_inst, $tiempo, $medio, $otromedio, $requisitos, $otrosrequi, $idioma1, $otroidioma1, $hablar, $escribir, $leer, $escuchar, $antiguedad, $ingresoem, $salario, $cargo, $perfil, $condicion, $otroscondi, $relacion, $organismo, $giro, $razon, $calleemp, $numemp, $coloniaemp, $cpemp, $ciudad, $municipio, $estado, $telext, $Fax, $Email, $pagweb, $nomtpuest, $sector, $otrosector, $tamanioemp, $editado);
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

if (isset($_POST['agregar_up'])) {

    include_once'../recursos/conexion.php';
        $usuario = $_POST['usuario'];
        $actividad = $_POST['actividad'];
        $estudia = $_POST['estudia'];
        $otro_est = $_POST['otro_est'];
        $espe_inst = $_POST['espe_inst'];
        $tiempo = $_POST['tiempo'];
        $medio = $_POST['medio'];
        $otromedio = $_POST['otromedio'];
        $requisitos = $_POST['requisitos'];
        $otrosrequi = $_POST['otrosrequi'];
        $idioma1 = $_POST['idioma1'];
        $otroidioma1 = $_POST['otroidioma1'];
        $hablar = $_POST['hablar'];
        $escribir = $_POST['escribir'];
        $leer = $_POST['leer'];
        $escuchar = $_POST['escuchar'];
        $antiguedad = $_POST['antiguedad'];
        $ingresoem = $_POST['ingresoem'];
        $salario = $_POST['salario'];
        $cargo = $_POST['cargo'];
        $perfil = $_POST['perfil'];
        $condicion = $_POST['condicion'];
        $otroscondi = $_POST['otroscondi'];
        $relacion = $_POST['relacion'];
        $organismo = $_POST['organismo'];
        $giro = $_POST['giro'];
        $razon = $_POST['razon'];
        $calleemp = $_POST['calleemp'];
        $numemp = $_POST['numemp'];
        $coloniaemp = $_POST['coloniaemp'];
        $cpemp = $_POST['cpemp'];
        $ciudad = $_POST['ciudad'];
        $municipio = $_POST['municipio'];
        $estado = $_POST['estado'];
        $telext = $_POST['telext'];
        $Fax = $_POST['Fax'];
        $Email = $_POST['Email'];
        $pagweb = $_POST['pagweb'];
        $nomtpuest = $_POST['nomtpuest'];
        $sector = $_POST['sector'];
        $otrosector = $_POST['otrosector'];
        $tamanioemp = $_POST['tamanioemp'];
        $id_com = $_POST['id_com'];
    
    try {
        $dec = $con->prepare("UPDATE `ubicacion_laboral` SET  `usuario` = ?, `actividad` = ?, `estudio` = ?, `otro_estudio` = ?, `especialidad_institucion` = ?, `tiempo_empleo` = ?, `medio_empleo` = ?, `otro_empleo` = ?, `requisitos` = ?, `otro_requisitos` = ?, `idioma_trabajo` = ?, `otro_idioma` = ?, `hablar` = ?, `escribir` = ?, `leer` = ?, `escuchar` = ?, `antiguedad` = ?, `anio_ingreso` = ?, `salario` = ?, `cargo` = ?, `perfil` = ?, `condicion` = ?, `otro_condicion` = ?, `relacion` = ?, `organismo` = ?, `giro_empresa` = ?, `razon` = ?, `calle_em` = ?, `no_em` = ?, `colonia_em` = ?, `cp_em` = ?, `ciudad_em` = ?, `municipio_em` = ?, `estado_em` = ?, `telefono_em` = ?, `fax` = ?, `email` = ?, `pag_web` = ?, `nombre_puesto` = ?, `sector_economico` = ?, `otro_economico` = ?, `tamanio_empresa` = ?, `editado` = NOW() WHERE `id` = ?");

        $dec->bind_param('isssssssssssssssssssssssssssssssssssssssssi',  $usuario, $actividad,  $estudia, $otro_est, $espe_inst, $tiempo, $medio, $otromedio, $requisitos, $otrosrequi, $idioma1, $otroidioma1, $hablar, $escribir, $leer, $escuchar, $antiguedad, $ingresoem, $salario, $cargo, $perfil, $condicion, $otroscondi, $relacion, $organismo, $giro, $razon, $calleemp, $numemp, $coloniaemp, $cpemp, $ciudad, $municipio, $estado, $telext, $Fax, $Email, $pagweb, $nomtpuest, $sector, $otrosector, $tamanioemp, $id_com);
       
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