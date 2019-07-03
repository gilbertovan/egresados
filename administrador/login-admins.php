 <?php 
if (isset($_POST['login-admin'])) {
    $usuarioAdmin = $_POST['usuarioAdmin'];
    $password = $_POST['password'];
    try {
        include_once'../recursos/conexion.php';

        $dec = $con->prepare("SELECT * FROM `admins` WHERE `usuarioAdmin` = ?;");
        $dec->bind_param("s",  $usuarioAdmin);
        $dec->execute(); 
        $dec->bind_result($id_A, $usuarioA, $nombreA, $apA, $passwordA, $editado, $nivels);
        if ($dec->affected_rows) {
            $existe = $dec->fetch();
            if ($existe) {
                if (password_verify($password, $passwordA)){ session_start();
                    $_SESSION['usuarioAdmin'] = $usuarioA;
                    $_SESSION['nombreAdmin'] = $nombreA;
                    $_SESSION['apAdmin'] = $apA;
                    $_SESSION['nivel'] = $nivels;
                    
                    

                    $respuesta = array(
                    'respuesta'=> 'exitoso',
                    'usuarioAdmin' => $nombreA

                    );
                }   
                else{
                    $respuesta = array(
                    'respuesta' => 'error'

                    );
                }
            } 
            else{
                $respuesta = array(
                    'respuesta' => 'error'

                );
            }
        }

       $dec->close();
       $con->close();  
    } 
    catch (Exception $e) {
        echo "Eror: " . $e->getMessager();
    }
    die(json_encode($respuesta));
}
?>