<?php

$usuario = "";
$clave = "";
require_once('obtener_variables_get.php'); 
require_once('obtener_variables_post.php'); 


//si usuario esta vacio, se crean las variables
if ($usuario == ""){

	//si esta definido el usuario global se establecen las variables de session
	if (isset($_SESSION['usuario_global'])){
		$usuario = $_SESSION['usuario_global'];
		$clave = $_SESSION['password_global'];
	}
}



$consulta = "SELECT * FROM tbl_usuario WHERE nick = '$usuario' AND clave = '$clave'";

$resultado = mysqli_query($connection , $consulta);

if (mysqli_num_rows($resultado) != 0) {

	$rs_usuario  = mysqli_fetch_array($resultado, MYSQL_ASSOC);

	
//si no esta definida la variable de session, se definen usando las variables de la consulta
	if (!isset($_SESSION['usuario_global']) or ($_SESSION['usuario_global'] != $usuario or $_SESSION['password_global'] != $clave)){

		$_SESSION['usuario_global'] = $usuario;
		$_SESSION['password_global'] = $clave;
		
	
	}
}


//si no se encontro el usuario y contraseña, se vuelve al index y se emite un error
else { 
?>
<html>
<head>
<script language="JavaScript">
window.top.location.href="<?=$link_error?>"
</script>
</head>
<body>

</body>
</html>
<?php
	die();
}
?>


?>