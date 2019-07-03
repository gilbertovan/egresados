<?php
require('fpdf.php');

class PDF extends FPDF{
	// Cabecera de página
	function Header(){
	    // Logo
	    $this->Image('../imgenes/Lo3.png', '10', '10', '190');
	    // Arial bold 15
	    $this->SetFont('Arial', 'B', '15');
	    // Movernos a la derecha
	    $this->Cell('80');
	    // Título
	    //$this->Cell(30,10,'Title',1,0,'C');
	    // Salto de línea
	    $this->Ln('20');
	}

	// Pie de página
	function Footer(){
	    // Posición: a 1,5 cm del final
	    $this->SetY('-15');
	    // Arial italic 8
	    $this->SetFont('Arial', 'I', '8');
	    // Número de página
	    $this->Cell('0', '10', utf8_decode('Página '.$this->PageNo().'/{nb}'), '0', '0', 'C');
	}
}

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', '12');

date_default_timezone_set("America/Mexico_City");
$fecha = date('d-m-Y');
$dia = date("d");
$mes = date("m"); 
$anio = date("Y"); 
$m="";
switch ($mes) {
	case 1:$m="Enero"; break;
	case 2:$m="Febrero"; break;
	case 3:$m="Marzo"; break;
	case 4:$m="Abril"; break;
	case 5:$m="Mayo"; break;
	case 6:$m="Junio"; break;
	case 7:$m="Julio"; break;
	case 8:$m="Agosto"; break;
	case 9:$m="Septiembre"; break;
	case 10:$m="Octubre"; break;
	case 11:$m="Noviembre"; break;
	case 12:$m="Diciembre"; break;
}

$pdf->Cell('190', '15', '', '0', '1', 'R');
$pdf->Cell('190', '5', utf8_decode('H. Cd. de Juchitán, Oax., '.$dia. ' de '.$m. ' de '.$anio), '0', '1', 'R');
$pdf->Cell('190', '10', '', '0', '1', 'R');

$pdf->Cell('138', '5','DEPTO.: ', '0', '0', 'R');
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell('52', '5', utf8_decode('GESTIÓN TECNOLÓGICA'), '0', '1', 'R');
$pdf->Cell('190', '5', utf8_decode('Y VINCULACIÓN'), '0', '1', 'R');
$pdf->Cell('190', '10', '', '0', '1', 'R');

$pdf->SetFont('Arial', '', '12');
$pdf->Cell('143', '5', 'ASUNTO: ', '0', '0', 'R');
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell('47', '5', 'Acuse de Cuestionario', '0' ,'1' ,'R');
$pdf->Cell('190', '5', 'de Seguimiento de Egresados', '0', '1', 'R');
$pdf->Cell('190', '15','', '0','1','R');

$pdf->SetFont('Arial', '', '12');
$pdf->Cell('31', '5','El sistema de la ', '0', '0', 'L');
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell('95', '5','Plataforma Web de Seguimiento de Egresados ', '0', '0', 'L');
$pdf->SetFont('Arial', '', '12');
$pdf->Cell('7', '5','del ', '0', '0', 'L');
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell('53', '5',utf8_decode('Instituto Tecnológico del '), '0', '1', 'L');
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell('13', '5',utf8_decode('Istmo '), '0', '0', 'L');
$pdf->SetFont('Arial', '', '12');
$pdf->Cell('97', '5','ha registrado al egresado con los siguientes datos:', '0', '1', 'L');
$pdf->Cell('190', '10','', '0', '1', 'R');

session_start();
require('../recursos/conexion.php');

if (!isset($_SESSION['usuario'])) {
	header('Location: ../login.php');
}
				
	$id_user=$_SESSION['usuario']['Id'];

	$sql ="SELECT * FROM `perfil_egresado` WHERE `usuario`= $id_user";
		$resultado = $con->query($sql);
		$user = $resultado->fetch_assoc();
				
	$sql ="SELECT * FROM `pertinencia_disponibilidad` WHERE `usuario`= $id_user";
		$resultado = $con->query($sql);
		$userpd = $resultado->fetch_assoc();

	$sql ="SELECT * FROM `ubicacion_laboral` WHERE `usuario`= $id_user";
		$resultado = $con->query($sql);
		$userul = $resultado->fetch_assoc();

	$sql ="SELECT * FROM `desempenio_profesional` WHERE `usuario`= $id_user";
		$resultado = $con->query($sql);
		$userdp = $resultado->fetch_assoc();

	$sql ="SELECT * FROM `expectativas_desarrollo` WHERE `usuario`= $id_user";
		$resultado = $con->query($sql);
		$usered = $resultado->fetch_assoc();

	$sql ="SELECT * FROM `participacion_social` WHERE `usuario`= $id_user";
		$resultado = $con->query($sql);
		$userps = $resultado->fetch_assoc();

	$sql ="SELECT * FROM `comentarios_sugerencias` WHERE `usuario`= $id_user";
		$resultado = $con->query($sql);
		$usercs = $resultado->fetch_assoc();

	if (!empty($user['usuario']) && !empty($userpd['usuario']) && !empty($userul['usuario']) && !empty($userdp['usuario']) && !empty($usered['usuario']) && !empty($userps['usuario']) && !empty($usercs['usuario'])) {

		if (!empty($user['usuario']) && !empty($userpd['usuario']) && !empty($userul['usuario']) && !empty($userdp['usuario']) && !empty($usered['usuario']) && !empty($userps['usuario']) && !empty($usercs['usuario'])){

			$pdf->SetFont('Arial', '', '12');
			$pdf-> Cell ('36', '5', 'Nombre completo: ', '0', '0', 'L');
			$pdf->SetFont('Arial', 'B', '12');	
			$pdf-> Cell ('154', '5', utf8_decode($user['nombre'].' '.$user['apellido_paterno'].' '.$user['apellido_materno']) , '0', '1', 'L');
			$pdf->Cell('190', '10', '', '0', '1', 'L');

		}
		else{
			$pdf-> Cell ('0', '1', '¡ERROR! Su acuse no se puede generar por que no constestó todas las partes del cuestionario', '0', '1', 'L');
			$pdf->Cell('190', '20', '', '0', '1', 'L');
		}

		if (!empty($user['usuario']) && !empty($userpd['usuario']) && !empty($userul['usuario']) && !empty($userdp['usuario']) && !empty($usered['usuario']) && !empty($userps['usuario']) && !empty($usercs['usuario'])) {

			$pdf->SetFont('Arial', '', '12');
			$pdf-> Cell ('20', '5', utf8_decode('Matrícula: '), '0', '0', 'L');
			$pdf->SetFont('Arial', 'B', '12');
			$pdf-> Cell ('170', '5', utf8_decode($user['no_control']), '0', '1', 'L');
			$pdf->Cell('190', '10', '', '0', '1', 'L');

		} 
		else{
			$pdf-> Cell ('0', '1', '¡ERROR! Su acuse no se puede generar por que no constestó todas las partes del cuestionario', '0', '0', 'L');
			$pdf->Cell('190', '20', '', '0', '1', 'L');
		}

		if (!empty($user['usuario']) && !empty($userpd['usuario']) && !empty($userul['usuario']) && !empty($userdp['usuario']) && !empty($usered['usuario']) && !empty($userps['usuario']) && !empty($usercs['usuario'])) {

			$pdf->SetFont('Arial', '', '12');
			$pdf-> Cell ('17', '5', 'Carrera:', '0', '0', 'L');
			$pdf->SetFont('Arial', 'B', '12');	
			$pdf-> Cell ('173','5', utf8_decode($user['carrera_egreso']), '0', '1', 'L');
			$pdf->Cell('190', '10', '', '0', '1', 'L');

		}
		else{
			$pdf-> Cell ('0', '1', '¡ERROR! Su acuse no se puede generar por que no constestó todas las partes del cuestionario', '0', '0', 'L');
			$pdf->Cell('190', '20', '', '0', '1', 'L');
		}

		if (!empty($user['usuario']) && !empty($userpd['usuario']) && !empty($userul['usuario']) && !empty($userdp['usuario']) && !empty($usered['usuario']) && !empty($userps['usuario']) && !empty($usercs['usuario'])) {

			$pdf->SetFont('Arial', '', '12');
			$pdf-> Cell ('35', '5', 'Fecha de egreso: ', '0', '0', 'L');
			$pdf->SetFont('Arial', 'B', '12');
			if (!empty($user['fecha_egreso'])){
				$fecha_egreso = $user['fecha_egreso'];
				$fecha_egreso."<br>";
				$fecha_egreso = strtotime($fecha_egreso);
				$fecha_egreso = date ('d-m-Y', $fecha_egreso);
				$fecha_egreso;
			}	
			$pdf-> Cell ('155', '5', $fecha_egreso, '0', '1', 'L');
			$pdf->Cell('190', '10', '', '0', '1', 'L');

		}
		else{
			$pdf-> Cell ('0', '1', '¡ERROR! Su acuse no se puede generar por que no constestó todas las partes del cuestionario', '0', '1', 'L');
			$pdf->Cell('190', '20', '', '0', '1', 'L');
		}

		$sql ="SELECT * FROM `perfiles` WHERE `Id`= $id_user";
			$resultado = $con->query($sql);
			$user = $resultado->fetch_assoc();

		$pdf->SetFont('Arial', '', '12');
		$pdf-> Cell ('17', '5', 'Usuario: ', '0', '0', 'L');
		$pdf->SetFont('Arial', 'B', '12');	
		$pdf-> Cell ('173', '5', utf8_decode($user['Usuario']), '0', '1', 'L');
		$pdf->Cell('190', '10', '', '0', '1', 'L');

		$pdf->SetFont('Arial', '', '12');
		$pdf-> Cell ('35', '5', utf8_decode('Correo eletrónico: '), '0', '0', 'L');
		$pdf->SetFont('Arial', 'B', '12');	
		$pdf-> Cell ('155', '5', utf8_decode($user['Email']), '0', '1', 'L');
		$pdf->Cell('190', '20', '', '0', '1', 'L');
			
		}
	else{
		$pdf-> Cell ('0', '1', '¡ERROR! Su acuse no se puede generar por que no constestó todas las partes del cuestionario', '0', '1', 'L');
		$pdf->Cell('190', '20', '', '0', '1', 'L');
	}

	$pdf->SetFont('Arial', '', '12');
	$pdf-> Cell ('190', '7', utf8_decode('A T E N T A M E N T E'), '0', '1', 'C');

	$pdf->SetFont('Arial', 'B', '12');
	$pdf-> Cell ('190', '7', utf8_decode('Excelencia en Educación Tecnológica®'), '0', '1', 'C');

	$pdf->SetFont('Arial', '', '12');
	$pdf-> Cell ('190', '7', utf8_decode('Por una tecnología propia como principio de libertad' ), '0', '1', 'C');

$pdf->Output();
?>