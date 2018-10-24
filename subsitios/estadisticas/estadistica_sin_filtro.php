<?php


require('../../objetos/generales/conexion.php');
		
$consulta= "SELECT * FROM tbl_presupuesto";
$resultado = mysqli_query($connection , $consulta);
$cantidad_total = mysqli_num_rows($resultado);

if($cantidad_total > 0)
{

$consulta_cancelado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 1";
$resultado_cancelado = mysqli_query($connection , $consulta_cancelado);
$cantidad_cancelado = mysqli_num_rows($resultado_cancelado);

	if($cantidad_cancelado > 0)
	{
		$porcentaje_cancelado=(($cantidad_cancelado * 100) / $cantidad_total);
	}
	else{
		$porcentaje_cancelado=0;
}

$consulta_espera= "SELECT * FROM tbl_presupuesto WHERE idEstado = 2 ";
$resultado_espera = mysqli_query($connection , $consulta_espera);
$cantidad_espera = mysqli_num_rows($resultado_espera);

	if($cantidad_espera > 0)
	{
		$porcentaje_espera=(($cantidad_espera * 100) / $cantidad_total);
	}
	else{
		$porcentaje_espera = 0;
	}



$consulta_confirmado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 3 ";
$resultado_confirmado = mysqli_query($connection , $consulta_confirmado);
$cantidad_confirmado = mysqli_num_rows($resultado_confirmado);

	if($cantidad_confirmado > 0)
	{
		$porcentaje_confirmado=(($cantidad_confirmado * 100) / $cantidad_total);
	}
	else{
		$porcentaje_confirmado = 0;
	}

	
}


	

	?>

<html>
<head>
<script language="JavaScript">
window.top.location.href="<?=$pagina?>" ;

</script>
</head>

</html>
