<?php
session_start();
require('../../objetos/generales/conexion.php');
$link_error="../../index.php?error_usuario=si";
require_once('../../objetos/generales/validar.php'); 




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
	document.formulario.action = "listado.php";
	document.formulario.submit();
}


function agregar() {

			if(validar_form (document.formulario) == true)
			{
			document.formulario.action = "procesos/agregar_cliente_esporadico.php";
			document.formulario.submit();
		}
	
}

function validar_form(theForm) {
	

	if (theForm.nombre.value == ""){
		alert("El nombre es un dato requerido.");
		theForm.nombre.focus();
		return (false);
	}
	
	if (theForm.apellido.value == ""){
		alert("El apellido es un dato requerido.");
		theForm.apellido.focus();
		return (false);
	}

	if (theForm.dni.value == ""){
		alert("El dni es un dato requerido.");
		theForm.dni.focus();
		return (false);
	}

	if (theForm.domicilio.value == ""){
		alert("El domicilio es un dato requerido.");
		theForm.domicilio.focus();
		return (false);
	}
	
	if (theForm.email.value == ""){
		alert("El email es un dato requerido.");
		theForm.email.focus();
		return (false);
	}

	email = theForm.email.value;
		
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
		
	}
	else{
		alert("La dirección de email es incorrecta.");
		return (false);
	}	

	if (theForm.telefono.value == ""){
		alert("El telefono es un dato requerido.");
		theForm.telefono.focus();
		return (false);
	}

	if (theForm.localidad.value == ""){
		alert("La localidad es un dato requerido.");
		theForm.localidad.focus();
		return (false);
	}

	if (theForm.provincia.value == ""){
		alert("La provincia es un dato requerido.");
		theForm.provincia.focus();
		return (false);
	}


	
	
		
	return (true);
}

function seleccionar_cliente(){

			if(validar_form_seleccion (document.formulario) == true)
			{
			document.formulario.action = "procesos/agregar_seleccion_cliente.php";
			document.formulario.submit();
		}	
}

function validar_form_seleccion(theForm) {
	
	if ( theForm.id_cliente.value == 0){
		alert("Debe seleccionar un cliente");
		theForm.id_cliente.focus();
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


.subtitulo{
	color: #D01262;
	  display: block;
  font-weight: 600;
  padding-top:20px;

  font-size: 23px;
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
				<form  name="formulario" method="POST" id="form">
					<span class="titulo_formulario p-b-49">
				Nuevo Presupuesto - Agregar Cliente
					</span>

					
					<div class="subtitulo">Si tu cliente ya esta registrado</div>
					<br>

					<div class="form-group col-md-6">
 										<label for="id_cliente">Cliente</label>
										<select class="form-control" id="id_cliente" name="id_cliente">
										<option id="id_cliente" value="">Seleccione un Cliente</option>
	   										
 						<?php

 				$consulta_clientes = "SELECT * FROM tbl_cliente ORDER BY idCliente ASC";
				$resultado_clientes = mysqli_query($connection , $consulta_clientes);

				while($rs_clientes = mysqli_fetch_array($resultado_clientes, MYSQL_ASSOC)) {
					?>

			 								<option id="id_cliente" value="<?=$rs_clientes['idCliente']?>"><?=$rs_clientes['nombre']?> <?=$rs_clientes['apellido']?> -  DNI: <?=$rs_clientes['dni']?></option>
	   										

	   									<?php } ?>
   										</select>
   										
					<br>
   										<div class="form-group ">
							                <input type="submit" class="btn btn-primary"   value="Seleccionar Cliente" onClick="seleccionar_cliente()">
							            </div> 

						</div>
					


					<br>
					<div class="subtitulo">Si tu cliente no esta registrado, completa los siguientes campos </div>
						<div class="form-group">
 					<br>					
						
			<div class="form-group col-md-6"> 
				<label for="nombre">Nombre</label> <br>
    			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre del cliente">
    		</div>

    		<div class="form-group col-md-6"> <br>
    			<label for="apellido">Apellido</label><br>
    			<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese apellido del cliente" >
    		</div>

    		<div class="form-group col-md-6"> <br>
    			<label for="dni">Dni</label><br>
    			<input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese dni del cliente" >
			</div>

			<div class="form-group col-md-6"> <br>
    			<label for="domicilio">Domicilio</label> <br>
    			<input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Ingrese domicilio del cliente" >
			</div>

			<div class="form-group col-md-6"> <br>
    			<label for="email">Email</label> <br>
    			<input type="email" class="form-control" name="email" id="email" placeholder="Ingrese email del cliente" >
			</div>

			<div class="form-group col-md-6"> <br>
    			<label for="telefono">Telefono</label> <br>
    			<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese telefono del cliente">
			</div>

			<div class="form-group col-md-6"> <br>
    			<label for="localidad">Localidad</label> <br>
    			<input type="text" class="form-control" name="localidad" id="localidad" placeholder="Ingrese localidad">
			</div>

    		<div class="form-group col-md-6"> <br>
    			<label for="provincia">Provincia</label> <br>
    			<input type="text" class="form-control" name="provincia" id="provincia" placeholder="Ingrese provincia">
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