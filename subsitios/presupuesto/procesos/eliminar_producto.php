<?php


require('../../../objetos/generales/conexion.php');


		
		$id_presupuesto = $_GET["id_presupuesto"];
		$id_item_producto = $_GET["id_item_producto"];
		$destino = $_GET["destino"];


$consulta_eliminar = "DELETE FROM tbl_itemproducto WHERE idItemProducto = $id_item_producto";
$resultado_eliminar = mysqli_query($connection , $consulta_eliminar);
	
if($resultado_eliminar){

	if($destino == "seleccion"){
		$pagina = "../seleccion_producto.php?id_presupuesto=$id_presupuesto&accion=otro";
	}

	if($destino == "mostrar"){
		$pagina = "../mostrar_presupuesto.php?id_presupuesto=$id_presupuesto";
	}

	
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
<body>
	<?=$consulta_eliminar?>
</body>
</html>