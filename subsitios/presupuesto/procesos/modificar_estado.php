<?php


require('../../../objetos/generales/conexion.php');


		$id_presupuesto = $_GET['id_presupuesto'];
		$id_estado =  $_POST['id_estado'];


$consulta_agregar = "UPDATE tbl_presupuesto SET idEstado= $id_estado WHERE idPresupuesto = $id_presupuesto";
/*Id debe ser automatico - colocar asi en la base de datos*/
$resultado_agregar = mysqli_query($connection , $consulta_agregar);

	
if($resultado_agregar){
	
	$pagina = "../listado.php?resultado_accion=exito";

	
}
else{
	$pagina = "../listado.php?resultado_accion=fracaso";
	
}
		?>


<html>
<head>
<script language="JavaScript">
window.top.location.href="<?=$pagina?>" 
</script>
</head>

<body>
	

</body>


</html>

