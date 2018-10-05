<?php
require('../../objetos/generales/conexion.php');




?>

<!DOCTYPE html>
<html>
<head>
	<title>HOLA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../images/icons/favicon.ico"/>
<!--===============================================================================================-->
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
</style>


<script type="text/javascript">
function volver_listado() {
	document.formulario.action = "";
	document.formulario.submit();
}


</script>



	<style type="text/css">
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
  padding-bottom:20px;

  font-size: 23px;
  line-height: 1.2;
}

	</style>
}
}
</head>
<body>

	<header>
		<?php 
		$direccion_imagen ="../../images/logo.png";
		require('../../objetos/especificos/menu.php') ?>
	</header>
	
		<div class="container">
			<div class="contenedor_formulario p-l-55 p-r-55 p-t-65 p-b-54">
				
				

						<form  name="formulario" method="POST">
					<span class="titulo_formulario p-b-49">
				
					</span>

					<div class="subtitulo">Cliente</div>

					<?php

				
						$ultimoQR = "SELECT MAX(idCliente) FROM tbl_cliente"; 
						$resultado = mysqli_query($connection,$ultimoQR);
						/*$ultimo = mysql_result($ultimoQR, 0);*/
						$consulta_cliente = "SELECT * FROM tbl_cliente WHERE idCliente = $ultimoQR order by idCliente DESC";
						$resultado_cliente = mysqli_query($connection , $consulta_cliente);
						$res = mysqli_result($resultado_cliente, $ultimoQR)
						$rs_cliente = mysqli_fetch_array($res);

								$nombre = $res['nombre'];
								$apellido = $res['apellido'];
								$dni = $res['dni'];
								$domicilio = $res['domicilio'];
								$email = $res['email'];
								$telefono = $res['telefono'];
								$localidad = $res['localidad'];
								$provincia = $res['provincia'];

						?>

							<div class=" contenedor_producto_existente">

								<p><span style="font-size: 18px; font-weight: 500;"><?=$nombre?> <?=$apellido?></span>  <strong> - DNI:</strong> <?=$dni?></p>
								<p><strong>Domicilio:</strong> <?=$domicilio?>   <strong>- Localidad:</strong> <?=$localidad?>   <strong>- Provincia:</strong>   <?=$provincia?></p>
								<p><strong>Email:</strong> <?=$email?>     <strong>-  Telefono:</strong> <?=$telefono?></p>
								


							</div>


					




					

				

						<div class="form-group">
		                <input type="submit" class="btn btn-primary" value="Cliente registrado" onClick="volver_listado()">
		       
		            	</div>    
				</form>
			</div>
		</div>

	

	
	


</body>
</html>