<?php


require('../../../objetos/generales/conexion.php');

		

		$id_cliente = $_POST['id_cliente'];

$consulta_agregar = "INSERT INTO tbl_presupuesto (idCliente) VALUES($id_cliente)";
$resultado_agregar = mysqli_query($connection , $consulta_agregar);
	
if($resultado_agregar){
	
	$consulta_presupuesto = "SELECT * FROM tbl_presupuesto ORDER BY idPresupuesto DESC LIMIT 1";
	$resultado_presupuesto = mysqli_query($connection , $consulta_presupuesto);
	$rs_presupuesto = mysqli_fetch_array($resultado_presupuesto, MYSQL_ASSOC);
	
	$id_presupuesto= $rs_presupuesto['idPresupuesto'];

	$pagina = "../seleccion_producto.php?id_presupuesto=$id_presupuesto&accion=primero";
}
else{
	$pagina = "eliminar_presupuesto.php?id_presupuesto=$id_presupuesto&accion=por_error";
	
}
		?>


<html>
<head>
<script language="JavaScript">
window.top.location.href="<?=$pagina?>" 
</script>
</head>
</html>

