<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	


	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM alumnos WHERE id_alumno = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Paciente</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h3>Editar Paciente:</h3>
		<form method="POST" action="editarProceso.php">
			<table>
			<tr>
					<td>Cui : </td>
					<td><input type="text" name="txtcui2" value="<?php echo $persona->cui; ?>"></td>
				</tr>
				<tr>
					<td>NOMBRE COMPELTO : </td>
					<td><input type="text" name="txtnom2" value="<?php echo $persona->nombre; ?>"></td>
				</tr>
				<tr>
					<td>Apellido Completo : </td>
					<td><input type="text" name="txtPaterno2" value="<?php echo $persona->ap_paterno; ?>"></td>
				</tr>
				<tr>
					<td>Fecha de Nacimiento :</td>
					<td><input type="text" name="txtfecha2" value="<?php echo $persona->f_nacimiento; ?>"></td>
				</tr>
				<tr>
					<td>Direccion : </td>
					<td><input type="text" name="txtdire2" value="<?php echo $persona->direccion; ?>"></td>
				</tr>
				<tr>
					<td>Nombre del Padre: </td>
					<td><input type="text" name="txtpadre2" value="<?php echo $persona->nom_padre; ?>"></td>
				</tr>
				<tr>
					<td>Nombre del la Madre: </td>
					<td><input type="text" name="txtmadre2" value="<?php echo $persona->nom_madre; ?>"></td>
				</tr>
				<tr>
					<td>Correo: </td>
					<td><input type="email" name="email2" value="<?php echo $persona->correo; ?>"></td>
				</tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona->id_alumno; ?>">
					<td colspan="2"><input type="submit" value="EDITAR ALUMNO"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>