<?php
session_start();
require('../../objetos/generales/conexion.php');
$link_error="../../index.php?error_usuario=si";
require_once('../../objetos/generales/validar.php'); 

$resultado = "";
$resultado_accion = "";

foreach ($_GET as $key => $value ) {
   if (isset($_GET[$key]))
   	$$key = $value;
}


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

.contenedor_nuevo {

	border:1px solid #F1EEF0 ;
	background: #F1EEF0 ;
	padding: 5px;
	padding-right: 20px;
	text-align: right;
	font-size: 15px;
	margin-bottom: 15px;
	border-radius: 14px;
	color: black;
		font-weight:500;


	}

a:hover .contenedor_nuevo{
	text-decoration: none;
	font-weight:600;	
	border:1px solid #F1EEF0 ;
	background: #F1EEF0 ;
	padding: 5px;
	padding-right: 20px;
	text-align: right;
	font-size: 15px;
	margin-bottom: 15px;
	border-radius: 14px;
	color: black;
	}

table{
	border-radius:14px;

	background: #F1EEF0 ;
	
}

td{
	width: 300px;
	padding: 10px;
	color: black;

}

tr:hover{
	background: #E0E2E8;

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
						<a href="subsitios/estadisticas/seleccion_estadisticas.php" class="nav-link" style="color: black; margin-top: 5px; border-left: 1px solid black; padding: 0px 10px 0px 10px;">Estadisticas</a>
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
				<span class="titulo_formulario">
					Listado de Presupuestos
				</span>


			<?php	if  ($resultado == "fracaso") {
				?>
					 <div class="alert alert-dismissible alert-danger">
				  		<strong>Ooops!</strong> El presupuesto no se cargo correctamente. Vuelva a intentarlo.
					 </div>

				<?php 

			}if($resultado == "exito"){
				?>

					  <div class="alert alert-dismissible alert-success">
				  		<strong></strong> El presupuesto se cargo correctamente.
					 </div>


				<?php
				}  
				?>

				<?php	if  ($resultado_accion == "fracaso") {
				?>
					 <div class="alert alert-dismissible alert-danger">
				  		<strong>Ooops!</strong> No se pudo realizar su petición. Vuelva a intentarlo.
					 </div>

				<?php 

			}if($resultado_accion == "exito"){
				?>

					  <div class="alert alert-dismissible alert-success">
				  		<strong></strong> Su petición se relizo correctamente.
					 </div>


				<?php
				}  
				?>


				<a href="agregar_cliente.php"> <div class="contenedor_nuevo">
					Nuevo presupuesto
				</div></a>

				<table >
					
					<?php

					$consulta_presupuestos="SELECT * FROM tbl_presupuesto ORDER BY idPresupuesto DESC";
					$resultado_presupuestos = mysqli_query($connection , $consulta_presupuestos);
					while($rs_presupuestos = mysqli_fetch_array($resultado_presupuestos, MYSQL_ASSOC)){

						$id_presupuesto=$rs_presupuestos['idPresupuesto'];
						$id_cliente=$rs_presupuestos['idCliente'];
						$id_estado=$rs_presupuestos['idEstado'];
						$fecha=$rs_presupuestos['fecha'];
						$tipo_cliente = $rs_presupuestos['tipo_cliente'];

							if($tipo_cliente == 1){
								$consulta_cliente= "SELECT * FROM tbl_cliente WHERE idCliente = $id_cliente";
							}if ($tipo_cliente == 0){
								$consulta_cliente= "SELECT * FROM tbl_clienteesporadico WHERE idClienteEsporadico = $id_cliente";
							}
						$resultado_cliente = mysqli_query($connection , $consulta_cliente);
						$rs_cliente = mysqli_fetch_array($resultado_cliente, MYSQL_ASSOC);
						$nombre_cliente=$rs_cliente['nombre'];
						$apellido_cliente=$rs_cliente['apellido'];

						$consulta_estado= "SELECT * FROM tbl_estado WHERE idEstado = $id_estado";
						$resultado_estado = mysqli_query($connection , $consulta_estado);
						$rs_estado = mysqli_fetch_array($resultado_estado, MYSQL_ASSOC);
						$nombre_estado=$rs_estado['nombre'];
						

					?>
					

						<tr>
							<td><?=$fecha?></td>
							<td><?=$nombre_cliente?> <?=$apellido_cliente?></td>
							<td><?=$nombre_estado?> </td>
							<td><a href="modificar_estado.php?id_presupuesto=<?=$id_presupuesto?>&emisor=listado" style="color:black; font-size: 13px; ">Cambiar Estado</a></td>
							<td><a href="mostrar_presupuesto.php?id_presupuesto=<?=$id_presupuesto?>&emisor=listado" style="color:black; font-size: 13px; ">Mostrar </a></td>
							<td><a href="reutilizar.php?id_presupuesto_anterior=<?=$id_presupuesto?>" style="color:black; font-size: 13px; ">Reutilizar</a></td>
							<td><a href="procesos/eliminar_presupuesto.php?id_presupuesto=<?=$id_presupuesto?>&accion=eliminar" style="color:black; font-size: 13px; ">Eliminar</a></td>

						</tr>

						<?php 

					}
						?>
					
				</table>


				
			</div>
		</div>
		
</body>
</html>