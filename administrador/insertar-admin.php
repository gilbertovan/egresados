 <?php  
 require_once('../funciones/sesiones.php');
if (isset($_POST['agregar-admin'])) {
	$usuarioAdmin = $_POST['usuarioAdmin'];
	$nombreAdmin = $_POST['nombreAdmin'];
    $apAdmin = $_POST['apAdmin'];
	$password = $_POST['password'];
    $editado = $_POST['editado'];
    $nivel = $_POST['nivel']; 
    $opciones =array(
 	  'cost' => 12
    );

	$password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    try {
        include_once'../recursos/conexion.php';
	    $dec = $con->prepare("INSERT INTO `admins` (`usuarioAdmin`, `nombreAdmin`,  `apAdmin`, `password`,`editado`, `nivel`) VALUES (?, ?, ?, ?, ?, ? )");
	    $dec->bind_param("sssssi",  $usuarioAdmin, $nombreAdmin, $apAdmin, $password_hashed, $editado, $nivel);
        $dec->execute(); 


        $id_registro = $dec->insert_id;
        if ($id_registro > 0) {
        	$respuesta = array(
        		'respuesta' => 'exito',
        		'id_admin' => $id_registro
        	);
        }else{
        	$respuesta = array(
        	 'respuesta' => 'Error'
        	);
        }
	  	$dec->close();
  	   	$con->close(); 
        

	}catch (Exception $e) {
 		echo "Eror: " . $e->getMessager();
 	}
 	die(json_encode($respuesta));
}




// egresado
if (isset($_POST['agregar_egresado'])) {
    require_once('../recursos/conexion.php');
        $nombre = limpiar($_POST['nombre']);
        $apellido = limpiar($_POST['apellido']);
        $usuario = limpiar($_POST['usuario']);
        $email = limpiar($_POST['email']);
        $clave = limpiar($_POST['clave']);
        $editado = $_POST['editado'];
            $opciones =array(
      'cost' => 12
    );

    $clave_hashed = password_hash($clave, PASSWORD_BCRYPT, $opciones);

    try {
            
        $dec = $con -> prepare("INSERT INTO `perfiles` (`Nombre`, `Apellido`, `Usuario`, `Email`, `Clave`, `editado`) VALUES (?, ?, ?, ?, ?, ?)");
        $dec -> bind_param("ssssss", $nombre, $apellido, $usuario, $email, $clave_hashed, $editado);
        $dec -> execute();
        $id_registro = $dec->insert_id;
        if ($id_registro > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'Id' => $id_registro
            );
        }else{
            $respuesta = array(
             'respuesta' => 'Error'
            );
        }
        $dec->close();
        $con->close(); 
            
      
    }catch (Exception $e) {
        echo "Eror: " . $e->getMessager();
    }die(json_encode($respuesta));
      
}
   function limpiar($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }