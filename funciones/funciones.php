<?php
    function registro(){
        require_once('recursos/conexion.php');
        $errores = duplicacion($con);
        if(!empty($errores)){
            return $errores;
        }
        $nombre = limpiar($_POST['nombre']);
        $apellido = limpiar($_POST['apellido']);
        $usuario = limpiar($_POST['usuario']);
        $email = limpiar($_POST['email']);
        $clave = limpiar($_POST['clave']);
        $clave2 = password_hash($clave, PASSWORD_DEFAULT);
        $editado = limpiar($_POST['editado']);
        $dec = $con -> prepare("INSERT INTO `perfiles` (`Nombre`, `Apellido`, `Usuario`, `Email`, `Clave`, `editado`) VALUES (?, ?, ?, ?, ?, ?)");
        $dec -> bind_param("ssssss", $nombre, $apellido, $usuario, $email, $clave2, $editado);
        $dec -> execute();
        $resultado = $dec -> affected_rows;
        $dec -> free_result();
        $dec -> close();
        $con -> close();
        if($resultado == 1){
            
            header('Location: login.php');
        }
        else{
            $errores[] = 'Error al crear su cuenta, por favor inténtelo más tarde.';
        }
        return $errores;
    }
    function duplicacion($con){
        $errores = [];
        $usuario = limpiar($_POST['usuario']);
        $email = limpiar($_POST['email']);
        $dec = $con -> prepare("SELECT `Usuario`, `Email` FROM `perfiles` WHERE `Usuario` = ? OR `Email` = ?");
        $dec -> bind_param("ss", $usuario, $email);
        $dec -> execute();
        $resultado = $dec -> get_result();
        $cantidad = mysqli_num_rows($resultado);
        $linea = $resultado -> fetch_assoc();
        $dec -> free_result();
        $dec -> close();
        if($cantidad > 0){
            if($_POST['usuario'] == $linea['Usuario']){
                $errores[] = 'El “Nombre de Usuario” no está disponible o ya se encuentra registrado.';
            }
            if($_POST['email'] == $linea['Email']){
                $errores[] = 'El “Correo Electrónico” no está disponible o ya se encuentra registrado.';
            }
        }
        return $errores;
    }
    function login(){
        require_once('recursos/conexion.php');
        $errores = [];
        $usuario = limpiar($_POST['usuarioOEmail']);
        $clave = limpiar($_POST['clave']);
        $dec = $con -> prepare("SELECT `Usuario`, `Clave`, `Intento`, `Id`, `Tiempo` FROM `perfiles` WHERE `Usuario` = ? OR `Email` = ?");
        $dec -> bind_param("ss", $usuario, $usuario);
        $dec -> execute();
        $resultado = $dec -> get_result();
        $cantidad = mysqli_num_rows($resultado);
        $linea = $resultado -> fetch_assoc();
        $dec -> free_result();
        $dec -> close();
        if($cantidad == 1){
            $errores = fuerzaBruta($con, $linea['Intento'], $linea['Id'], $linea['Tiempo']);
            if(!empty($errores)){return $errores;}
            if(password_verify($clave, $linea['Clave'])){
                $intento = 1;
                $tiempo = NULL;
                $id = $linea['Id'];
                $dec = $con -> prepare("UPDATE `perfiles` SET `Intento` = ?, `Tiempo` = ? WHERE `Id` = ?");
                $dec -> bind_param("isi", $intento, $tiempo, $id);
                $dec -> execute();
                $dec -> close();
                $con -> close();
                session_start();
                $_SESSION['usuario'] = $linea; 
                header('Location: index.php');
            }
            else{
                $errores[] = 'La combinación de “Nombre de Usuario” o “Correo electrónico” y “Contraseña” no son válidos.';
            }
        }
        else{
            $errores[] = 'La combinación de “Nombre de Usuario” o “Correo electrónico” y “Contraseña” no son válidos.';
        }
        return $errores;
    }
    function fuerzaBruta($con, $intento, $id, $tiempo){
        $errores = [];
        $intento = $intento + 1;
        $dec = $con -> prepare("UPDATE `perfiles` SET `Intento` = ? WHERE `Id` = ?");
        $dec -> bind_param("ii", $intento, $id);
        $dec -> execute();
        $dec -> close();
        if($intento == 6){
            $ahora = date('Y-m-d H:i:s');
            $dec = $con -> prepare("UPDATE `perfiles` SET `Tiempo` = ? WHERE `Id` = ?");
            $dec -> bind_param("si", $ahora, $id);
            $dec -> execute();
            $dec -> close();
            $con -> close();
            $errores[] = 'Excedió el límite de intentos, esta cuenta ha sido bloqueada por los próximos 15 minutos.';
        }
        elseif($intento > 6){
            $espera = strtotime(date('Y-m-d H:i:s')) - strtotime($tiempo);
            $minutos = ceil((900-$espera)/60);
            if($espera < 900){
                $errores[] = 'Esta cuenta ha sido bloqueada, quedan '.$minutos.' minutos para desbloquear.';
            }
            else{
                $intento = 1;
                $tiempo = NULL;
                $dec = $con -> prepare("UPDATE `perfiles` SET `Intento` = ?, `Tiempo` = ? WHERE `Id` = ?");
                $dec -> bind_param("isi", $intento, $tiempo, $id);
                $dec -> execute();
                $dec -> close();
                $con -> close();
            }
        }
        return $errores;
    }
    function editar(){
        require_once('recursos/conexion.php');
        $errores = [];
        $nombre = limpiar($_POST['nombre']);
        $apellido = limpiar($_POST['apellido']);
        $usuario = limpiar($_POST['usuario']);
        $email = limpiar($_POST['email']);
        $clave = limpiar($_POST['clave']);
        $ids = limpiar($_POST['ids']);
        $dec = $con -> prepare("SELECT `Nombre`, `Apellido`, `Usuario`, `Email`, `Clave`, `Id` FROM `perfiles` WHERE `Id` = ?");
        $dec -> bind_param("i", $ids);
        $dec -> execute();
        $resultado = $dec -> get_result();
        $cantidad = mysqli_num_rows($resultado);
        $linea = $resultado -> fetch_assoc();
        $dec -> free_result();
        $dec -> close();
        if($cantidad == 1){
            $clave2 = password_hash($clave, PASSWORD_DEFAULT);
            $dec = $con -> prepare("UPDATE `perfiles` SET `Nombre` = ?, `Apellido` = ?, `Usuario` = ?, `Email` = ?, `Clave` = ? WHERE `Id` = ?");
            $dec -> bind_param("sssssi", $nombre, $apellido, $usuario, $email, $clave2, $ids);
            $dec -> execute();
            $resultado = $dec -> affected_rows;
            $dec -> free_result();
            $dec -> close();
            $con -> close();
            if($resultado == 1){
                header('Location: index.php');
            }
            else{
                $errores[] = 'El “Nombre de Usuario” o “Correo electrónico” no esta disponible o ya se encuentra registrado.';
            }
        }
        return $errores;
    }
    function limpiar($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }
    function mostrarErrores($errores){
        $resultado = '<div class="alert alert-danger errores"><ul>';
        foreach($errores as $error){
            $resultado .= '<li>' . htmlspecialchars($error) . '</li>';
        }
        $resultado .= '</ul></div>';
        return $resultado;
    }
    function ficha_csrf(){
        $ficha = bin2hex(random_bytes(32));
        return $_SESSION['ficha'] = $ficha;
    }
    function validar_ficha($ficha){
        if(isset($_SESSION['ficha']) && hash_equals($_SESSION['ficha'], $ficha)){
            unset($_SESSION['ficha']);
            return true;
        }
        return false;
    }
    function validar($campos){
        $errores = [];
        foreach($campos as $nombre => $mostrar){
            if(!isset($_POST[$nombre]) || $_POST[$nombre] == NULL){
                $errores[] = $mostrar . ' es un campo requerido.';
            }
            else{
                $valides = campos();
                foreach($valides as $campo => $opcion){
                    if($nombre == $campo){
                        if(!preg_match($opcion['patron'], $_POST[$nombre])){
                            $errores[] = $opcion['error'];
                        }
                    }
                }
            }
        }
        return $errores;
    }
    function campo($nombre){
        echo $_POST[$nombre] ?? '';
    }
    function campos(){
        $validacion = [
            'nombre' => [
                'patron' => '/^[a-záéíóúüÁÉÍÓÚÜ\s]{2,50}$/i',
                'error' => '“Nombre(s)” solo puede usar letras, espacios y debe de tener de 2 a 50 caracteres.'
            ],
            'apellido' => [
                'patron' => '/^[a-záéíóúüÁÉÍÓÚÜ\s]{2,50}$/i',
                'error' => '“Apellidos” solo puede usar letras, espacios y debe de tener de 2 a 50 caracteres.'
            ],
            'usuario' => [
                'patron' => '/^[a-z][\w]{2,30}$/i',
                'error' => '“Nombre de usuario” debe de tener un mínimo de tres caracteres y comenzar con una letra. Solo puede usar letras, guion bajo y números.'
            ],
            'email' => [
                'patron' => '/^[a-z]+[\w-\.]{2,}@([\w-]{2,}\.)+[\w-]{2,4}$/i',
                'error' => '“Correo electrónico” debe de ser en un formato valido, ej. “algo@correo.com”.'
            ],
            'clave' => [
                'patron' => '/^[\w\!@#\$%\^&\*\?a-z A-Z 0-9\s]{8,30}$/i',
                'error' => '“Contraseña” no valida. La contraseña debe ser mayor a 8 caracteres, debe tener únicamente números (0-9), letras minúsculas y mayúsculas sin acentos (a-z, A-Z).'
            ],
            'usuarioOEmail' => [
                'patron' => '/(?=^[a-z]+[\w@\.]{2,50}$)/i',
                'error' => 'Ingrese un “Nombre de usuario” o “Correo electrónico” valido.'
            ]
        ];
        return $validacion;
    }
    function comparadorDeClaves($clave, $reclave){
        $errores = [];
        if($clave !== $reclave){
            $errores[] = 'Las contraseñas proveídas no son iguales.';
        }
        return $errores;
    }
?>