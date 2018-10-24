<?php
session_start();
require('../../objetos/generales/conexion.php');
$link_error="../../index.php?error_usuario=si";
require_once('../../objetos/generales/validar.php'); 

$id_cliente = $_GET["id_cliente"];
$emisor = $_GET["emisor"];


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
					<li class="nav-item ">
						<a href="../../subsitios/estadisticas/seleccion_estadisticas.php" class="nav-link" style="color: black; margin-top: 5px; border-left: 1px solid black; padding: 0px 10px 0px 10px;">Estadisticas</a>
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
				Nuevo Cliente
					</span>

					

					<?php

				$consulta_cliente = "SELECT * FROM tbl_cliente WHERE idCliente = $id_cliente order by idCliente DESC";
				$resultado_cliente = mysqli_query($connection , $consulta_cliente);
				$rs_cliente = mysqli_fetch_array($resultado_cliente, MYSQL_ASSOC);
						$nombre = $rs_cliente['nombre'];
						$apellido = $rs_cliente['apellido'];
						$dni = $rs_cliente['dni'];
						$domicilio = $rs_cliente['domicilio'];
						$localidad = $rs_cliente['localidad'];
						$email= $rs_cliente['email'];
						$telefono= $rs_cliente['telefono'];
						$provincia= $rs_cliente['idProvincia'];

						

						?>
							<div class="subtitulo">Nombre y Apellido</div>
							<div class="col-md-3 contenedor_producto_existente">
								<?=$nombre?> <?=$apellido?>
							</div>





							<div class="subtitulo">DNI</div>
							<div class="col-md-3 contenedor_producto_existente">
								<?=$dni?>
							</div>
							




					<div class="subtitulo">Ubicación</div>
					<div class="col-md-6 contenedor_producto_existente">
						<?php
							$consulta= "SELECT * FROM tbl_provincias WHERE idProvincia = $provincia";
							$resultado = mysqli_query($connection , $consulta);
							$rs_resultado = mysqli_fetch_array($resultado, MYSQL_ASSOC);
							$provincia = $rs_resultado['provincia'];

						 ?>
								<p><strong>Domicilio:</strong> <?=$domicilio?>   <strong>- Localidad:</strong> <?=$localidad?>   <strong>- Provincia:</strong>   <?=$provincia?></p>
							</div>


							<div class="subtitulo">Contacto</div>
					<div class="col-md-6 contenedor_producto_existente">
								<p><strong>Teléfono:</strong> <?=$telefono?>   <strong>- Email:</strong> <?=$email?> </p>
							</div>


							

							<?php

							$consulta_presupuestos = "SELECT * FROM tbl_presupuesto WHERE idCliente = $id_cliente ORDER BY idPresupuesto ASC";
							$resultado_presupuestos = mysqli_query($connection , $consulta_presupuestos);
							
							if(mysqli_num_rows($resultado_presupuestos) != 0){
								?>

							<div class="subtitulo">Presupuestos</div>
							<?php
							$i=0;
							while ($rs_presupuestos = mysqli_fetch_array($resultado_presupuestos, MYSQL_ASSOC)){

								$id_presupuesto = $rs_presupuestos['idPresupuesto'];
								$fecha = $rs_presupuestos['fecha'];
								$i=$i +1;

							

							?>



					<div class="contenedor_producto_existente">
								<p><strong>Presupuesto <?=$i?></strong> de la fecha  <strong><?=$fecha?></strong>.    </p>
								<p> <a target="_blanck"  href="../presupuesto/mostrar_presupuesto.php?id_presupuesto=<?=$id_presupuesto?>&emisor=listado" style="color:black; text-align: left;">Mostrar</a> </p>
							</div>

							<?php

						}

					}

							?>

				

					<?php
							if($emisor == "nuevo_presupuesto"){

				?>

						<div class="form-group">
		                <input type="submit" class="btn btn-primary" value="Cliente agregado" onClick="volver_listado_nuevo()">

		            <?php }
		            if($emisor == "listado"){ ?>

		            	<div class="form-group">
		                <input type="submit" class="btn btn-primary" value="Volver al listado" onClick="volver_listado()">


					<?php
		            }


		           ?>	
				</form>
			</div>
		</div>

	


	


</body>
</html>
