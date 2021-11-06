<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$cui = $_POST['txtcui'];
	$nombre = $_POST['txtNombre'];
	$paterno = $_POST['txtPaterno'];
	$fecha = $_POST['txtfecha'];
	$direccion = $_POST['txtdire'];
	$padre = $_POST['txtpadre'];
	$madre = $_POST['txtmadre'];
	$correo = $_POST['email'];

	$sentencia = $bd->prepare("INSERT INTO alumnos(cui,nombre,ap_paterno, f_nacimiento, direccion, nom_padre,nom_madre,correo) VALUES (?,?,?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$cui,$nombre,$paterno, $fecha, $direccion, $padre, $madre, $correo]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>