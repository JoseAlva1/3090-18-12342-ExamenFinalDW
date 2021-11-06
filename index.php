<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM alumnos;");
		$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
	}else{
		echo "Error en el sistema";
	}


	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de Pacientes</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h1>Bienvenido: <?php echo $_SESSION['nombre'] ?></h1>
		<a href="cerrar.php">Cerrar Sesión</a>
		<h3>Lista de Pacientes</h3>
		<table>
			<tr>
				<td>Código</td>
				<td>Cui</td>
				<td>Nombre Completo</td>
				<td>Apellido Completo </td>
				<td>Fecha de Nacimiento</td>
				<td>Direccion</td>
				<td>Nombre del Padre</td>
				<td>NOmbr de la Madre</td>
				<td>CORREO ELECTRONICO</td>
				
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>

			<?php 
				foreach ($alumnos as $dato) {
					?>
					<tr>
						<td><?php echo $dato->id_alumno; ?></td>
						<td><?php echo $dato->cui; ?></td>
						<td><?php echo $dato->nombre; ?></td>
						<td><?php echo $dato->ap_paterno; ?></td>
						<td><?php echo $dato->f_nacimiento; ?></td>
						<td><?php echo $dato->direccion; ?></td>
						<td><?php echo $dato->nom_padre; ?></td>
						<td><?php echo $dato->nom_madre; ?></td>
						<td><?php echo $dato->correo; ?></td>
						
						
						
						
						<td><a href="editar.php?id=<?php echo $dato->id_alumno; ?>">Editar</a></td>
						<td><a href="eliminar.php?id=<?php echo $dato->id_alumno; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

		<!-- inicio insert -->
		<hr>
		<h3>Ingresar Pacientes:</h3>
		<form method="POST" action="insertar.php">
			<table>
			<tr>
					<td>CUI: </td>
					<td><input type="text" name="txtcui"></td>
				</tr>

				<tr>
					<td>NOMBRE COMPLETO : </td>
					<td><input type="text" name="txtNombre"></td>
				</tr>
				<tr>
					<td> APELLIDO COMPLETO: </td>
					<td><input type="text" name="txtPaterno"></td>
				</tr>
				<tr>
					<td>FECHA NACIMIENTO: </td>
					<td><input type="text" name="txtfecha"></td>
				</tr>
				<tr>
					<td>DIRECCION : </td>
					<td><input type="text" name="txtdire"></td>
				</tr>
				<tr>
					<td>NOMBRE DEL PADRE: </td>
					<td><input type="text" name="txtpadre"></td>
				</tr>
				<tr>
					<td>NOMBRE DE LA MADRE : </td>
					<td><input type="text" name="txtmadre"></td>
				</tr>
				<tr>
					<td>CORREO ELECTRONICO : </td>
					<td><input type="email" name="email"></td>
				</tr>

				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="INGRESAR PACIENTE"></td>
				</tr>
			</table>
		</form>
		<!-- fin insert-->

	</center>
</body>
</html>