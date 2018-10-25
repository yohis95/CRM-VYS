<?php


$consulta_clientes = "SELECT * FROM tbl_cliente WHERE idProvincia = $provincia";
$resultado_clientes = mysqli_query($connection , $consulta_clientes);


$consulta_clientes_esporadicos = "SELECT * FROM tbl_clienteesporadico WHERE idProvincia = $provincia";
$resultado_clientes_esporadicos = mysqli_query($connection , $consulta_clientes_esporadicos);

/*Para calcular cantidad total de presupuestos*/
$cantidad_total = 0;
while($rs_clientes = mysqli_fetch_array($resultado_clientes, MYSQL_ASSOC)){
	$consulta= "SELECT * FROM tbl_presupuesto WHERE tipo_cliente = 1";
	$resultado = mysqli_query($connection , $consulta);
	while($rs = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
		if($rs_clientes['idCliente'] == $rs['idCliente']){
			$cantidad_total = $cantidad_total + 1;
		}
	}
}
while($rs_clientes_esporadicos = mysqli_fetch_array($resultado_clientes_esporadicos, MYSQL_ASSOC)){
	$consulta= "SELECT * FROM tbl_presupuesto WHERE tipo_cliente = 0";
	$resultado = mysqli_query($connection , $consulta);
	while($rs = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
		if($rs_clientes_esporadicos['idClienteEsporadico'] == $rs['idCliente']){
			$cantidad_total = $cantidad_total + 1;
		}
	}
}



/*Consulta cancelado*/
$cantidad_cancelado=0;
$consulta_clientes = "SELECT * FROM tbl_cliente WHERE idProvincia = $provincia";
$resultado_clientes = mysqli_query($connection , $consulta_clientes);


$consulta_clientes_esporadicos = "SELECT * FROM tbl_clienteesporadico WHERE idProvincia = $provincia";
$resultado_clientes_esporadicos = mysqli_query($connection , $consulta_clientes_esporadicos);
/*Clientes existentes*/

while($rs_clientes = mysqli_fetch_array($resultado_clientes, MYSQL_ASSOC)){
	$id_cliente = $rs_clientes['idCliente'];

	$consulta_cancelado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 1 AND tipo_cliente=1";
	$resultado_cancelado = mysqli_query($connection , $consulta_cancelado); 
	while($rs_cancelado= mysqli_fetch_array($resultado_cancelado, MYSQL_ASSOC)){
		if($rs_cancelado['idCliente'] == $id_cliente){
			$cantidad_cancelado = $cantidad_cancelado + 1;
		}
	}
}
/*Clientes esporadicos*/
while($rs_clientes_esporadicos = mysqli_fetch_array($resultado_clientes_esporadicos, MYSQL_ASSOC)){

	$id_cliente = $rs_clientes_esporadicos['idClienteEsporadico'];

	$consulta_cancelado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 1 AND tipo_cliente=0";
	$resultado_cancelado = mysqli_query($connection , $consulta_cancelado); 
	while($rs_cancelado= mysqli_fetch_array($resultado_cancelado, MYSQL_ASSOC)){
		if($rs_cancelado['idCliente'] == $id_cliente){
			$cantidad_cancelado = $cantidad_cancelado + 1;
		}
	}
}

	if($cantidad_cancelado > 0)
	{
		$porcentaje_cancelado=(($cantidad_cancelado * 100) / $cantidad_total);
	}
	else{
		$porcentaje_cancelado=0;
}

/*Consulta en espera*/
$cantidad_espera=0;
$consulta_clientes = "SELECT * FROM tbl_cliente WHERE idProvincia = $provincia";
$resultado_clientes = mysqli_query($connection , $consulta_clientes);

$consulta_clientes_esporadicos = "SELECT * FROM tbl_clienteesporadico WHERE idProvincia = $provincia";
$resultado_clientes_esporadicos = mysqli_query($connection , $consulta_clientes_esporadicos);
/*Clientes existentes*/

while($rs_clientes = mysqli_fetch_array($resultado_clientes, MYSQL_ASSOC)){
	$id_cliente = $rs_clientes['idCliente'];

	$consulta_cancelado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 2 AND tipo_cliente=1";
	$resultado_cancelado = mysqli_query($connection , $consulta_cancelado); 
	while($rs_cancelado= mysqli_fetch_array($resultado_cancelado, MYSQL_ASSOC)){
		if($rs_cancelado['idCliente'] == $id_cliente){
			$cantidad_espera= $cantidad_espera + 1;
		}
	}
}
/*Clientes esporadicos*/
while($rs_clientes_esporadicos = mysqli_fetch_array($resultado_clientes_esporadicos, MYSQL_ASSOC)){

	$id_cliente = $rs_clientes_esporadicos['idClienteEsporadico'];

	$consulta_cancelado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 2 AND tipo_cliente=0";
	$resultado_cancelado = mysqli_query($connection , $consulta_cancelado); 
	while($rs_cancelado= mysqli_fetch_array($resultado_cancelado, MYSQL_ASSOC)){
		if($rs_cancelado['idCliente'] == $id_cliente){
			$cantidad_espera = $cantidad_espera + 1;
		}
	}
}

	if($cantidad_espera > 0)
	{
		$porcentaje_espera=(($cantidad_espera * 100) / $cantidad_total);
	}
	else{
		$porcentaje_espera = 0;
	}

/*Consulta acetados*/
$cantidad_confirmado=0;
$consulta_clientes = "SELECT * FROM tbl_cliente WHERE idProvincia = $provincia";
$resultado_clientes = mysqli_query($connection , $consulta_clientes);

$consulta_clientes_esporadicos = "SELECT * FROM tbl_clienteesporadico WHERE idProvincia = $provincia";
$resultado_clientes_esporadicos = mysqli_query($connection , $consulta_clientes_esporadicos);
/*Clientes existentes*/

while($rs_clientes = mysqli_fetch_array($resultado_clientes, MYSQL_ASSOC)){
	$id_cliente = $rs_clientes['idCliente'];

	$consulta_cancelado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 3 AND tipo_cliente=1";
	$resultado_cancelado = mysqli_query($connection , $consulta_cancelado); 
	while($rs_cancelado= mysqli_fetch_array($resultado_cancelado, MYSQL_ASSOC)){
		if($rs_cancelado['idCliente'] == $id_cliente){
			$cantidad_confirmado= $cantidad_confirmado + 1;
		}
	}
}
/*Clientes esporadicos*/
while($rs_clientes_esporadicos = mysqli_fetch_array($resultado_clientes_esporadicos, MYSQL_ASSOC)){

	$id_cliente = $rs_clientes_esporadicos['idClienteEsporadico'];

	$consulta_cancelado= "SELECT * FROM tbl_presupuesto WHERE idEstado = 3 AND tipo_cliente=0";
	$resultado_cancelado = mysqli_query($connection , $consulta_cancelado); 
	while($rs_cancelado= mysqli_fetch_array($resultado_cancelado, MYSQL_ASSOC)){
		if($rs_cancelado['idCliente'] == $id_cliente){
			$cantidad_confirmado = $cantidad_confirmado + 1;
		}
	}
}
	if($cantidad_confirmado > 0)
	{
		$porcentaje_confirmado=(($cantidad_confirmado * 100) / $cantidad_total);
	}
	else{
		$porcentaje_confirmado = 0;
	}

	


	

	?>

