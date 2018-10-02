<!DOCTYPE html>
<html>
<head>
	<title>Conectar a base de datos</title>
</head>
<body>

<?php 
			
		$servidor="localhost";
		$usuario="crm_vys";
		$contrasena="yohasofivale";
		$basedatos="crm_vys";

		$connection = mysqli_connect($servidor, $usuario,$contrasena) or die ("Error de conexion al servidor");
		$db = mysqli_select_db($connection,$basedatos) or die ("Error de conexion a la base de datos");
	
		


 ?>

</body>
</html>
