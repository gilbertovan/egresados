<?php 
function usuarioA_autenticado(){
	if (!revisar_ususarioA()) {
		header('location:../loginadmin.php');
		exit();
		# code...
	}

}
function revisar_ususarioA(){
	return isset($_SESSION['usuarioAdmin']);
}
session_start();
usuarioA_autenticado();