<?php


require('../../../objetos/generales/conexion.php');

$id_presupuesto ="";
foreach ($_GET as $key => $value ) {
   if (isset($_GET[$key])){
   	$$key = $value;
   }
}
		
		
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$dni = $_POST['dni'];
		$domicilio = $_POST['domicilio'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
			


$consulta_agregar = "INSERT INTO tbl_clienteesporadico (nombre, apellido, dni, domicilio, email, telefono, localidad, idProvincia) VALUES('$nombre', '$apellido', $dni, '$domicilio', '$email', '$telefono', '$localidad', $provincia)";

$resultado_agregar = mysqli_query($connection , $consulta_agregar);

if($resultado_agregar){

	$consulta_cliente= "SELECT * FROM tbl_clienteesporadico ORDER BY idClienteEsporadico DESC LIMIT 1";
	$resultado_cliente = mysqli_query($connection , $consulta_cliente);
	$rs_cliente = mysqli_fetch_array($resultado_cliente, MYSQL_ASSOC);
	
	$id_cliente= $rs_cliente['idClienteEsporadico'];

	$consulta_agregar_presupuesto = "UPDATE tbl_presupuesto SET idCliente= $id_cliente, tipo_cliente = 0 WHERE idPresupuesto = $id_presupuesto";
	$resultado_agregar_presupuesto = mysqli_query($connection , $consulta_agregar_presupuesto);

	if($resultado_agregar_presupuesto){


	//vuelve a la pagina anterior con exito	
	$consulta_presupuesto = "SELECT * FROM tbl_presupuesto ORDER BY idPresupuesto DESC LIMIT 1";
	$resultado_presupuesto = mysqli_query($connection , $consulta_presupuesto);
	$rs_presupuesto = mysqli_fetch_array($resultado_presupuesto, MYSQL_ASSOC);
	
	$id_presupuesto= $rs_presupuesto['idPresupuesto'];


	$pagina = "../reutilizar.php?id_presupuesto=$id_presupuesto";

	}else{
			$pagina = "../listado.php?resultado=fracaso";
	}
}
else{
	$pagina = "../listado.php?resultado=fracaso";
	
}
		?>


<html>
<head>
<script language="JavaScript">
window.top.location.href="<?=$pagina?>" ;

</script>
</head>

</html>

