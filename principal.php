<?php
session_start();
require_once('objetos/generales/conexion.php'); 
$link_error="index.php?error_usuario=si";
require_once('objetos/generales/validar.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRM VYS</title>
	<style type="text/css">
		body{
			background: url(images/fondo.jpg);
		}
	</style>
</head>
<body>

	<header>

		<?php
		$direccion_imagen="images/logo.png";
		 require('objetos/especificos/menu.php') ?>
	</header>

	<?php

	if (isset($_SESSION['usuario_global'])){
		$usuario = $_SESSION['usuario_global'];
		$clave = $_SESSION['password_global'];
	}

	echo $usuario;
	echo $clave;
	?>

</body>
</html>