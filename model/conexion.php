<?php  
	$contrasena = 'vG6NbeFrvKKwh8';
	$usuario = 'epiz_30301797';
	$nombrebd= 'epiz_30301797_ExamenDesarrollos';

	try {
		$bd = new PDO(
			'mysql:host=sql206.epizy.com;
			dbname='.$nombrebd,
			$usuario,
			$contrasena,
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);
	} catch (Exception $e) {
		echo "Error de conexión ".$e->getMessage();
	}

?>