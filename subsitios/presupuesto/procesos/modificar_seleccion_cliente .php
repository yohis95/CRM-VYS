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

