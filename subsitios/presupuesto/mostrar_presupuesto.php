<?php
session_start();
require('../../objetos/generales/conexion.php');
$link_error="../../index.php?error_usuario=si";
require_once('../../objetos/generales/validar.php'); 

$id_presupuesto = $_GET["id_presupuesto"];
$emisor = $_GET["emisor"];/*listado - nuevo_presupuesto*/
require_once('../../objetos/generales/obtener_variables_get.php'); 



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
function volver_listado_nuevo() {
	document.formulario.action = "listado.php?resultado=exito";
	document.formulario.submit();
}

function volver_listado() {
	document.formulario.action = "listado.php";
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

.subtitulo{
	color: #D01262;
	  display: block;
  font-weight: 600;
  padding-top:20px;

  font-size: 23px;
  line-height: 1.2;
}

	</style>

</head>
<body>

	<header>
		<nav class="navbar navbar-expand-lg navbar-dark " style="background: white; border-bottom: 1px solid #D01262; margin-top:-50px; ">
			<a href="../../principal.php" class="navbar-brand"><img src="../../images/logo.png" width="50"></a>
			<button class="navbar-toggler" data-target="#navigation" data-control="navigation" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navigation">
				<ul class="nav navbar-nav">

					<li class="nav-item">
						<a href="../../subsitios/cliente/listado.php" class="nav-link" style="color: black; margin-top: 5px; padding: 0px 10px 0px 10px;">Clientes</a>
					</li>
					<li class="nav-item ">
						<a href="../../subsitios/presupuesto/listado.php" class="nav-link" style="color: black; margin-top: 5px; border-left: 1px solid black; padding: 0px 10px 0px 10px;">Presupuestos</a>
					</li>

					<li class="nav-item">
						<a href="../../objetos/generales/salir.php" class="nav-link" style="color: black; margin-top: 5px; border-left: 1px solid black; padding: 0px 10px 0px 10px;">Salir</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	
		<div class="container">
			<div class="contenedor_formulario">
				
				

						<form  name="formulario" method="POST">
					<span class="titulo_formulario ">
				Presupuesto
					</span>

					

					<?php

				$consulta_presupuesto = "SELECT * FROM tbl_presupuesto WHERE idPresupuesto = $id_presupuesto order by idPresupuesto DESC";
				$resultado_presupuesto = mysqli_query($connection , $consulta_presupuesto);
				$rs_presupuesto = mysqli_fetch_array($resultado_presupuesto, MYSQL_ASSOC);
						$id_cliente = $rs_presupuesto['idCliente'];
						$id_estado = $rs_presupuesto['idEstado'];
						$fecha_presupuesto = $rs_presupuesto['fecha'];

						

						?>
							<div class="subtitulo">Fecha de emisión</div>
							<div class="col-md-3 contenedor_producto_existente">
								<?=$fecha_presupuesto?>
							</div>





							<div class="subtitulo">Cliente</div>

							<?php
$consulta_cliente = "SELECT * FROM tbl_cliente WHERE idCliente = $id_cliente order by idCliente DESC";
						$resultado_cliente = mysqli_query($connection , $consulta_cliente);
						$rs_cliente = mysqli_fetch_array($resultado_cliente, MYSQL_ASSOC);

								$nombre = $rs_cliente['nombre'];
								$apellido = $rs_cliente['apellido'];
								$dni = $rs_cliente['dni'];
								$domicilio = $rs_cliente['domicilio'];
								$email = $rs_cliente['email'];
								$telefono = $rs_cliente['telefono'];
								$localidad = $rs_cliente['localidad'];
								$provincia = $rs_cliente['provincia'];
								?>
							<div class=" contenedor_producto_existente">

								<p><span style="font-size: 18px; font-weight: 500;"><?=$nombre?> <?=$apellido?></span>  <strong> - DNI:</strong> <?=$dni?></p>
								<p><strong>Domicilio:</strong> <?=$domicilio?>   <strong>- Localidad:</strong> <?=$localidad?>   <strong>- Provincia:</strong>   <?=$provincia?></p>
								<p><strong>Email:</strong> <?=$email?>     <strong>-  Telefono:</strong> <?=$telefono?></p>
								


							</div>


					




					<div class="subtitulo">Productos</div>

					<?php

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

							
							


						</div>

	<?php } ?>
							<div class="subtitulo">Estado</div>

							<?php

							$consulta_estado= "SELECT * FROM tbl_estado WHERE idEstado = $id_estado LIMIT 1 ";
							$resultado_estado = mysqli_query($connection , $consulta_estado);
							$rs_estado = mysqli_fetch_array($resultado_estado, MYSQL_ASSOC);
							$estado=$rs_estado['nombre'];
							?>

							<div class="col-md-3 contenedor_producto_existente">
								<?=$estado?>
							</div>




				<?php
							if($emisor == "nuevo_presupuesto"){

				?>

						<div class="form-group">
		                <input type="submit" class="btn btn-primary" value="Presupuesto Terminado" onClick="volver_listado_nuevo()">

		            <?php }
		            if($emisor == "listado"){ ?>

		            	<div class="form-group">
		                <input type="submit" class="btn btn-primary" value="Volver al listado" onClick="volver_listado()">


					<?php
		            }


		           ?>		       
		            	</div>    
				</form>
			</div>
		</div>

	


	


</body>
</html>