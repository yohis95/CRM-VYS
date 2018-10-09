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
			document.formulario.action = "procesos/agregar.php";
			document.formulario.submit();
		}
	
}

function validar_form(theForm) {
	
	if ( theForm.id_cliente.value == 0){
		alert("Debe seleccionar un cliente");
		theForm.id_cliente.focus();
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



</head>
<body>

	<header>
		<?php 
		$direccion_imagen ="../../images/logo.png";
		require('../../objetos/especificos/menu.php') ?>
	</header>



	
		<div class="container">
			<div class="contenedor_formulario">
				<form  name="formulario" method="POST" onSubmit="return validar_form(this)">
					<span class="titulo_formulario p-b-49">
				Nuevo Presupuesto - Agregar Cliente
					</span>

					
						

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