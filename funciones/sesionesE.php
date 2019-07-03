<?php 
function usuarioA_autenticado(){
	if (!revisar_ususarioA()) {
		header('location:index.php');
		exit();
		# code...
	}

}
function revisar_ususarioA(){
	return isset($_SESSION['usuario']);
}
session_start();
usuarioA_autenticado();