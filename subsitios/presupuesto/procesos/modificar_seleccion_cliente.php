<?php



require('../../../objetos/generales/conexion.php');

	$id_presupuesto ="";
foreach ($_GET as $key => $value ) {
   if (isset($_GET[$key])){
   	$$key = $value;
   }
}	

		$id_cliente = $_POST['id_cliente'];

$consulta_agregar = "UPDATE tbl_presupuesto SET idCliente= $id_cliente, tipo_cliente = 1 WHERE idPresupuesto = $id_presupuesto";
$resultado_agregar = mysqli_query($connection , $consulta_agregar);
	
if($resultado_agregar){
	
	$consulta_presupuesto = "SELECT * FROM tbl_presupuesto ORDER BY idPresupuesto DESC LIMIT 1";
	$resultado_presupuesto = mysqli_query($connection , $consulta_presupuesto);
	$rs_presupuesto = mysqli_fetch_array($resultado_presupuesto, MYSQL_ASSOC);
	
	$id_presupuesto= $rs_presupuesto['idPresupuesto'];

	$pagina = "../reutilizar.php?id_presupuesto=$id_presupuesto";
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

