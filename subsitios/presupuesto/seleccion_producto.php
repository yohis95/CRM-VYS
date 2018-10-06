<?php
session_start();
require('../../objetos/generales/conexion.php');
$link_error="../../index.php?error_usuario=si";
require_once('../../objetos/generales/validar.php'); 

$id_presupuesto = $_GET["id_presupuesto"];
$accion = $_GET["accion"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRM VYS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../favicon.ico"/>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">
function cancelar() {
	document.formulario.action = "";
	document.formulario.submit();
}


function agregar() {		
	
			document.formulario.action = "procesos/agregar_producto.php?id_presupuesto=<?=$id_presupuesto?>&otro=no";
			document.formulario.submit();
	
}

function agregar_producto() {		
	
			document.formulario.action = "procesos/agregar_producto.php?id_presupuesto=<?=$id_presupuesto?>&otro=si";
			document.formulario.submit();
	
}
</script>

<style type="">
	
	.contenedor_formulario {
 
  padding: 20px;
  margin-left:150px;
  margin: 20px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
}

.titulo_formulario {
  display: block;
  font-weight: 600;
  padding-bottom:20px;

  font-size: 30px;
  color: #EE8A12;
  line-height: 1.2;

}

.logo{
 
  width: 30%;
  align-content: left;
  }

body{
 background: url(../../images/fondo.jpg);	
}

header {
  background: rgba(0,0,0,0.9);
  width: 100%;
  position: fixed;
  z-index: 100;
  margin-top:-25px;

}

.contenedor_formulario{

margin-top: 70px;

	}

.btn-primary{
	background: #EE8A12 !important;
	 border:1px solid #EE8A12 !important;
}

.contenedor_producto_existente{

	border:1px solid #F1EEF0 ;
	background: #F1EEF0 ;
	padding: 10px;
	margin-top:15px;
	margin-bottom: 15px;
	border-radius: 14px;
	}

</style>

</head>
<body>

	<header>
		<?php 
		$direccion_imagen ="../../images/logo.png";
		require('../../objetos/especificos/menu.php') ?>
	</header>
	
		<div class="container">
			<div class="contenedor_formulario p-l-55 p-r-55 p-t-65 p-b-54">
				
				<?php

			if($accion == "otro"){


				$consulta_itemproductos = "SELECT * FROM tbl_itemproducto WHERE idPresupuesto = $id_presupuesto order by idItemProducto DESC";
				$resultado_itemproductos = mysqli_query($connection , $consulta_itemproductos);

				while($rs_itemproductos = mysqli_fetch_array($resultado_itemproductos, MYSQL_ASSOC)) {

					$id_item_producto = $rs_itemproductos['idItemProducto'];
					$id_producto = $rs_itemproductos['idProducto'];
					$cantidad = $rs_itemproductos['cantidad'];

						$consulta_productos = "SELECT * FROM tbl_producto WHERE idProducto = $id_producto LIMIT 1 ";
						$resultado_productos = mysqli_query($connection , $consulta_productos);
						

						$rs_productos = mysqli_fetch_array($resultado_productos, MYSQL_ASSOC);
						$nombre_producto = $rs_productos['nombre'];
						$precioUnitario = $rs_productos['precioUnitario'];

						$precioTotal=$cantidad * $precioUnitario;



					?>
						<div class="col-md-6 contenedor_producto_existente">

					

							<p><strong>Producto:</strong> <?=$nombre_producto?></p> 
							<p><strong>Cantidad:</strong> <?=$cantidad?></p>
							<p><strong>Precio total:</strong> $<?=$precioTotal?></p>

							<a href="procesos/eliminar_prodcuto.php?id_item_producto=$id_item_producto"><p style="font-weight: 600; text-align: right; text-decoration: none; color: red;">Eliminar</p></a>
							


						</div>




					<?php


				}

			}

				?>


				<form  name="formulario" method="POST">
					<span class="titulo_formulario p-b-49">
				Nuevo Presupuesto - Agregar Producto
					</span>

					<div class="wrap-input100 validate-input m-b-23">
						

						<div class="form-group col-md-6">
 										<label for="id_cliente">Producto</label>
										<select class="form-control" id="id_producto" name="id_producto">
										<option id="id_producto" value="">Seleccione un Producto</option>
	   										
 						<?php

 				$consulta_productos = "SELECT * FROM tbl_producto ORDER BY idProducto ASC";
				$resultado_productos = mysqli_query($connection , $consulta_productos);

				while($rs_productos = mysqli_fetch_array($resultado_productos, MYSQL_ASSOC)) {
					?>

			 								<option id="id_producto" value="<?=$rs_productos['idProducto']?>"><?=$rs_productos['nombre']?> - Precio: $<?=$rs_productos['precioUnitario']?></option>
	   										

	   									<?php } ?>
   										</select>

						</div>

						<div class="form-group col-md-2">
 										<label for="cantidad">Cantidad</label>
 									   <input type="text" class="form-control" id="cantidad" name="cantidad">

						</div>
	
					
					
				
					</div>
</br>

					<div class="form-group col-md-6">
		                <input type="submit" class="btn btn-primary" value="Cancelar" onClick="cancelar()">
		                <input type="submit" class="btn btn-primary" value="Agregar otro Producto" onClick="agregar_producto()">
		                <input type="submit" class="btn btn-primary"   value="Continuar" onClick="agregar()">
		            </div>    

				

						
				</form>
			</div>
		</div>

	


	


</body>
</html>