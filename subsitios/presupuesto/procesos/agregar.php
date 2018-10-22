<?php


require('../../../objetos/generales/conexion.php');

		
		$origen = $_GET['origen'];
		$id_presupuesto = $_GET['id_presupuesto'];

	if($origen == "seleccion"){
		$consulta = "UPDATE tbl_presupuesto SET tipo_cliente = 1 WHERE idPresupuesto= $id_presupuesto ";
	} if($origen == "esporadico"){
		$consulta = "UPDATE tbl_presupuesto SET tipo_cliente = 0 WHERE idPresupuesto = $id_presupuesto ";
	}
$resultado = mysqli_query($connection , $consulta);
	
if($resultado){

	$pagina = "../seleccion_producto.php?id_presupuesto=$id_presupuesto&accion=primero";
}
else{
	$pagina = "eliminar_presupuesto.php?id_presupuesto=$id_presupuesto&accion=por_error";
	
}
		?>


<html>
<head>
<script language="JavaScript">
window.top.location.href="<?=$pagina?>" ;
</script>
</head>
</html>

