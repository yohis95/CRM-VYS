<?php


require('../../../objetos/generales/conexion.php');


		$otro = $_GET['otro'];
		$id_presupuesto = $_GET['id_presupuesto'];
		$id_producto =  $_POST['id_producto'];
		$cantidad = $_POST['cantidad'];



$consulta_agregar = "INSERT INTO tbl_itemproducto (idPresupuesto, idProducto, cantidad) VALUES($id_presupuesto, $id_producto, $cantidad)"; /*Id debe ser automatico - colocar asi en la base de datos*/
$resultado_agregar = mysqli_query($connection , $consulta_agregar);

	
if($resultado_agregar){
	
	if($otro == "si"){

	$pagina = "../seleccion_producto.php?id_presupuesto=$id_presupuesto&accion=otro";

		}

	if($otro == "no"){

	$pagina = "../seleccion_estado.php?id_presupuesto=$id_presupuesto";

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


</html>

