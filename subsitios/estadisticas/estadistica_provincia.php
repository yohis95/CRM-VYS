<?php



		
$consulta= "SELECT * FROM tbl_presupuesto";
$resultado = mysqli_query($connection , $consulta);
$cantidad_total = mysqli_num_rows($resultado);

if($cantidad_total > 0)
{

$consulta_cancelado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 1";
$resultado_cancelado = mysqli_query($connection , $consulta_cancelado); 
while($rs_cancelado = mysqli_fetch_array($resultado_cancelado, MYSQL_ASSOC)){

	$id_cliente = $rs_cancelado['idCliente'];
	$tipo_cliente = $rs_cancelado['tipo_cliente'];

	
	$cantidad_cancelado = 0;
	$consulta_cliente = "SELECT * FROM tbl_cliente WHERE idCliente = $id_cliente"; 

	$resultado_cliente = mysqli_query($connection , $consulta_cliente);
	$rs_cliente = mysqli_fetch_array($resultado_cliente, MYSQL_ASSOC);

		if($rs_cliente['idProvincia'] == $provincia){
			$cantidad_cancelado = $cantidad_cancelado + 1;
		}

	}

	if($cantidad_cancelado > 0)
	{
		$porcentaje_cancelado=(($cantidad_cancelado * 100) / $cantidad_total);
	}
	else{
		$porcentaje_cancelado=0;
}

$consulta_espera= "SELECT * FROM tbl_presupuesto WHERE idEstado = 2 ";
$resultado_espera = mysqli_query($connection , $consulta_espera);
while($rs_espera = mysqli_fetch_array($resultado_espera, MYSQL_ASSOC)){

	$id_cliente = $rs_espera['idCliente'];
$cantidad_espera = 0;
	$consulta_cliente = "SELECT * FROM tbl_cliente WHERE idCliente = $id_cliente";

	$resultado_cliente = mysqli_query($connection , $consulta_cliente);
	$rs_cliente = mysqli_fetch_array($resultado_cliente, MYSQL_ASSOC);


		if($rs_cliente['idProvincia'] == $provincia){
			$cantidad_espera = $cantidad_espera + 1;
		}

	}


	if($cantidad_espera > 0)
	{
		$porcentaje_espera=(($cantidad_espera * 100) / $cantidad_total);
	}
	else{
		$porcentaje_espera = 0;
	}



$consulta_confirmado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 3 ";
$resultado_confirmado = mysqli_query($connection , $consulta_confirmado);
while($rs_confirmado = mysqli_fetch_array($resultado_confirmado, MYSQL_ASSOC)){
	$cantidad_confirmado = 0;
	$id_cliente = $rs_confirmado['idCliente'];

	$consulta_cliente = "SELECT * FROM tbl_cliente WHERE idCliente = $id_cliente";

	$resultado_cliente = mysqli_query($connection , $consulta_cliente);
	$rs_cliente = mysqli_fetch_array($resultado_cliente, MYSQL_ASSOC);

		if($rs_cliente['idProvincia'] == $provincia){
			$cantidad_confirmado = $cantidad_confirmado + 1;
		}

	}

	if($cantidad_confirmado > 0)
	{
		$porcentaje_confirmado=(($cantidad_confirmado * 100) / $cantidad_total);
	}
	else{
		$porcentaje_confirmado = 0;
	}

	
}


	

	?>

