<?php
	
require('objetos/generales/conexion.php');
$usuario = $_POST['usuario']; 
$clave = $_POST['clave']; 

$consulta = "SELECT * FROM tbl_usuario WHERE nick = '$usuario' AND clave = '$clave'";

$resultado = mysqli_query($connection , $consulta);

if($resultado){ 
    echo "Bienvenido"; 
} 
else{ 
    echo "usuario no registrado";
} 
?>
