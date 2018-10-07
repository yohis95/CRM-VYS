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
	
			document.formulario.action = "procesos/agregar_estado.php?id_presupuesto=<?=$id_presupuesto?>";
			document.formulario.submit();
	
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
				<form  name="formulario" method="POST">
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