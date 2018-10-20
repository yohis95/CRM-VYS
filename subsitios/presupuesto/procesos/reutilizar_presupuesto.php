<?php


	$consulta_presupuesto = "SELECT * FROM tbl_presupuesto WHERE idPresupuesto = $id_presupuesto_anterior order by idPresupuesto DESC";
	$resultado_presupuesto = mysqli_query($connection , $consulta_presupuesto);
	$rs_presupuesto = mysqli_fetch_array($resultado_presupuesto, MYSQL_ASSOC);
						$id_cliente = $rs_presupuesto['idCliente'];
						$id_estado = $rs_presupuesto['idEstado'];
						$fecha = date("d/m/Y");



						/*Creo el nuevo presupuesto*/

	$consulta_agregar_presupuesto = "INSERT INTO tbl_presupuesto (idCliente, idEstado, fecha) VALUES($id_cliente, $id_estado, '$fecha')";
	
	$resultado_agregar_presupuesto = mysqli_query($connection , $consulta_agregar_presupuesto);
	
	if($resultado_agregar_presupuesto){
		$consulta_presupuesto = "SELECT * FROM tbl_presupuesto ORDER BY idPresupuesto DESC LIMIT 1";
		$resultado_presupuesto = mysqli_query($connection , $consulta_presupuesto);
		$rs_presupuesto = mysqli_fetch_array($resultado_presupuesto, MYSQL_ASSOC);
		
		$id_presupuesto= $rs_presupuesto['idPresupuesto'];
	}else{
		$pagina = "listado.php?resultado=error";
	}

	$consulta_itemproductos = "SELECT * FROM tbl_itemproducto WHERE idPresupuesto = $id_presupuesto_anterior order by idItemProducto DESC";
	$resultado_itemproductos = mysqli_query($connection , $consulta_itemproductos);

	while($rs_itemproductos = mysqli_fetch_array($resultado_itemproductos, MYSQL_ASSOC)) {

					$id_item_producto = $rs_itemproductos['idItemProducto'];
					$id_producto = $rs_itemproductos['idProducto'];
					$cantidad = $rs_itemproductos['cantidad'];

					$consulta_agregar = "INSERT INTO tbl_itemproducto (idPresupuesto, idProducto, cantidad) VALUES($id_presupuesto, $id_producto, $cantidad)"; /*Id debe ser automatico - colocar asi en la base de datos*/
					$resultado_agregar = mysqli_query($connection , $consulta_agregar);

					if(!$resultado_agregar){
						$pagina = "eliminar_presupuesto.php?id_presupuesto=$id_presupuesto&accion=por_error";
					}

		}

?>