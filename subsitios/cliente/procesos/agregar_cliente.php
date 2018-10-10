<?php


require('../../../objetos/generales/conexion.php');


		
		
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$dni = $_POST['dni'];
		$domicilio = $_POST['domicilio'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
			


$consulta_agregar = "INSERT INTO tbl_cliente (nombre, apellido, dni, domicilio, email, telefono, localidad, provincia) VALUES('$nombre', '$apellido', $dni, '$domicilio', '$email', '$telefono', '$localidad', '$provincia')";

$resultado_agregar = mysqli_query($connection , $consulta_agregar);

if($resultado_agregar){
	//vuelve a la pagina anterior con exito	
	$consulta_cliente = "SELECT * FROM tbl_cliente ORDER BY idCliente DESC LIMIT 1";
	$resultado_cliente = mysqli_query($connection , $consulta_cliente);
	$rs_cliente = mysqli_fetch_array($resultado_cliente, MYSQL_ASSOC);
	
	$id_cliente= $rs_cliente['idCliente'];

	$pagina = "../mostrar_cliente.php?id_cliente=$id_cliente&emisor=nuevo_presupuesto";
}
else{
	$pagina = "../listado.php?resultado=fracaso";
	
}
		?>


<html>
<head>
<script language="JavaScript">

window.top.location.href="<?=$pagina?>" 
</script>
</head>


</html>

