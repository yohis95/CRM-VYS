<?php


require('../../../objetos/generales/conexion.php');


		$id_presupuesto = $_GET['id_presupuesto'];
		$id_estado =  $_POST['id_estado'];

$fecha =date("d/m/Y");

$consulta_agregar = "UPDATE tbl_presupuesto SET idEstado= $id_estado,fecha='$fecha' WHERE idPresupuesto = $id_presupuesto";
/*Id debe ser automatico - colocar asi en la base de datos*/
$resultado_agregar = mysqli_query($connection , $consulta_agregar);

	
if($resultado_agregar){
	
	$pagina = "../mostrar_presupuesto.php?id_presupuesto=$id_presupuesto&emisor=nuevo_presupuesto";

	
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
	<?=$consulta_agregar?>
</body>


</html>

