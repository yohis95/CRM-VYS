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
	document.formulario.action = "";
	document.formulario.submit();
}


function agregar() {		
	
			document.formulario.action = "procesos/agregar_cliente.php";
			document.formulario.submit();
	
}

function validar_form(theForm) {
	
	if (theForm.nombre.value == ""){
		alert("El nombre es un dato requerido.");
		theForm.nombre.focus();
		return (false);
	}
	
	if (theForm.apellido.value == ""){
		alert("La apellido es un dato requerido.");
		theForm.apellido.focus();
		return (false);
	}
	
	
		
	return (true);
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
	</style>
}
</head>
<body>

	<header>
		<?php 
		$direccion_imagen ="../../images/logo.png";
		require('../../objetos/especificos/menu.php') ?>
	</header>



	
		<div class="container">
			<div class="contenedor_formulario">
				<!--Action y method lo agregue para enlazarlo al archivo de php-->
				<form  name="formulario" method="post" onSubmit="return validar_form(this)">
					<span class="titulo_formulario ">
				Nuevo Cliente
					</span>

						

						<div class="form-group">
 										
						
			<div class="form-group col-md-6"> 
				<label for="nombre">Nombre</label> <br>
    			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre del cliente">
    		</div>

    		<div class="form-group col-md-6"> <br>
    			<label for="apellido">Apellido</label><br>
    			<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese apellido del cliente">
    		</div>

    		<div class="form-group col-md-6"> <br>
    			<label for="dni">Dni</label><br>
    			<input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese dni del cliente">
			</div>

			<div class="form-group col-md-6"> <br>
    			<label for="domicilio">Domicilio</label> <br>
    			<input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Ingrese domicilio del cliente">
			</div>

			<div class="form-group col-md-6"> <br>
    			<label for="email">Email</label> <br>
    			<input type="email" class="form-control" name="email" id="email" placeholder="Ingrese email del cliente">
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


    	<!--	<div class="form-group ">
 										<label for="email">Nombre y apellido</label>
 									   <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese aquí su nombre">

						</div>-->


					<div class="form-group "> <br>
		                <input type="submit" class="btn btn-primary" value="Volver al listado" onClick="cancelar()">
		                <input type="submit" class="btn btn-primary"   value="Guardar cliente" onClick="agregar()">
		            </div>    

				

						
				</form>
			</div>
		</div>
		

	

</body>
</html>