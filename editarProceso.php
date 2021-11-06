<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$id2 = $_POST['id2'];
	$cui2 = $_POST['txtcui2'];
	$nombre2 = $_POST['txtnom2'];
	$paterno2 = $_POST['txtPaterno2'];
	$fecha2 = $_POST['txtfecha2'];
	$direccion2 = $_POST['txtdire2'];
	$padre2 = $_POST['txtpadre2'];
	$madre2 = $_POST['txtmadre2'];
	$correo2 = $_POST['email2'];

	$sentencia = $bd->prepare("UPDATE alumnos SET cui = ?, nombre = ?, ap_paterno = ?, 
												f_nacimiento = ?, direccion = ?, nom_padre = ?, nom_madre = ?, correo = ? WHERE id_alumno = ?;");
	$resultado = $sentencia->execute([$cui2, $nombre2, $paterno2, $fecha2, $direccion2, $padre2, $madre2, $correo2, $id2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>