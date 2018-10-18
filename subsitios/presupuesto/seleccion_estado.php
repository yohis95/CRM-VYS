<?php
session_start();
require('../../objetos/generales/conexion.php');
$link_error="../../index.php?error_usuario=si";
require_once('../../objetos/generales/validar.php'); 

$id_presupuesto = $_GET["id_presupuesto"];

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
	document.formulario.action = "procesos/eliminar_presupuesto.php?id_presupuesto=<?=$id_presupuesto?>&accion=por_cancelar";
	document.formulario.submit();
}


function agregar() {
			
			if(validar_form (document.formulario) == true)		
		{
			document.formulario.action = "procesos/agregar_estado.php?id_presupuesto=<?=$id_presupuesto?>";
			document.formulario.submit();
		}
}

function validar_form(theForm) {
	
	if ( theForm.id_estado.value == 0){
		alert("Debe seleccionar un estado");
		theForm.id_estado.focus();
		return (false);
	}

		
	return (true);
}

$(function() {
		  $('#form').on('submit', function (event) {
   	          	event.preventDefault();
		  });
		});


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
				<form  name="formulario" method="POST" id="form">
					<span class="titulo_formulario p-b-49">
				Nuevo Presupuesto - Estado
					</span>

					
						

						<div class="form-group col-md-6">
 										<label for="id_estado">Estado del presupesto</label>
										<select class="form-control" id="id_estado"  name="id_estado">
										<option id="id_estado" value="">Seleccione un estado</option>
	   										
 						<?php

 				$consulta_estados = "SELECT * FROM tbl_estado ORDER BY idEstado ASC";
				$resultado_estados = mysqli_query($connection , $consulta_estados);

				while($rs_estados = mysqli_fetch_array($resultado_estados, MYSQL_ASSOC)) {
					?>

			 								<option id="id_estado" value="<?=$rs_estados['idEstado']?>"><?=$rs_estados['nombre']?> </option>
	   										

	   									<?php } ?>
   										</select>

						</div>

					<div class="form-group ">
		                <input type="submit" class="btn btn-primary" value="Cancelar" onClick="cancelar()">
		                <input type="submit" class="btn btn-primary"   value="Continuar" onClick="agregar()">
		            </div>    

				

						
				</form>
			</div>
		</div>
		
</body>
</html>