<!DOCTYPE html>
<html>
<head>
	<title>Conectar a base de datos</title>
</head>
<body>

<?php 
			
		$servidor="localhost";
		$usuario="Yoha95";
		$contrasena="yohasofivale";
		$basedatos="vys";

		$connection = mysqli_connect($servidor, $usuario,$contrasena) or die ("Error de conexion al servidor");
		$db = mysqli_select_db($connection,$basedatos) or die ("Error de conexion a la base de datos");
		
		//De aca para abajo no funciona. 
		$nombre_usuario=$_POST['nombre'];
		$apellido_usuario=$_POST['apellido'];
		$nick_usuario=$_POST['usuario'];
		$clave_usuario=$_POST['clave'];
		$clave_rep_usuario=$_POST['clave_repetida'];

		if($clave_usuario!=$clave_rep_usuario)
		{
			die('Las claves no coinciden');
		}

		$clave_encriptada = md5($clave_usuario);

		
		$registro=mysql_query("INSERT INTO usuario VALUES('', '$nombre_usuario', '$apellido_usuario' , '$nick_usuario', '$clave_encriptada')",$connection) or die ("<h2> Error de registro </h2>");

		echo "Usuario registrado correctamente";


 ?>

</body>
</html>
<?php

$cierro = mysqli_close($connection);

?>