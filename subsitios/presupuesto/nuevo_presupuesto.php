<?php
require('../../objetos/generales/inicializacion.php');
$titulo_sitio='crm - vys';
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOLA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
<!--===============================================================================================-->
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
	</style>
}
</head>
<body>

	<header>
		<?php 
		$direccion_imagen ="../../images/logo.png";
		require('../../objetos/especificos/menu.php') ?>
	</header>

	<div class="contenedor_formulario">
		<div class="container-login100" style="background-image: url('../../images/fondo.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<!--Action y method lo agregue para enlazarlo al archivo de php-->
				<form class="login100-form validate-form" action="procesos/agregar.php" method="POST">
					<span class="login100-form-title p-b-49">
				Nuevo Presupuesto
					</span>

					<div class="wrap-input100 validate-input m-b-23">
						
						<i class="fa fa-user-circle-o"></i>
						<span class="label-input100">Nombre Cliente</span>	
						<input class="input100" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" required=""><!--Siempre poner id y name para referenciar-->
	
					</div>

					<br>

					<div class="wrap-input100 validate-input">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<span class="label-input100">Estado</span>	
						<input class="input100" type="text" name="estado" id="estado" placeholder="Ingrese su apellido" required="">
				
					</div>

					<div class="wrap-input100 validate-input">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<span class="label-input100">Estado</span>	
						<input class="input100" type="text" name="apellido" id="estado" placeholder="Ingrese su apellido" required="">
				
					</div>

					<div class="wrap-input100 validate-input">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<span class="label-input100">Estado</span>	
						<input class="input100" type="text" name="apellido" id="estado" placeholder="Ingrese su apellido" required="">
				
					</div>

					<div class="wrap-input100 validate-input">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<span class="label-input100">Estado</span>	
						<input class="input100" type="text" name="apellido" id="estado" placeholder="Ingrese su apellido" required="">
				
					</div>

					<div class="wrap-input100 validate-input">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<span class="label-input100">Estado</span>	
						<input class="input100" type="text" name="apellido" id="estado" placeholder="Ingrese su apellido" required="">
				
					</div>
					<div class="wrap-input100 validate-input">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<span class="label-input100">Estado</span>	
						<input class="input100" type="text" name="apellido" id="estado" placeholder="Ingrese su apellido" required="">
				
					</div><div class="wrap-input100 validate-input">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<span class="label-input100">Estado</span>	
						<input class="input100" type="text" name="apellido" id="estado" placeholder="Ingrese su apellido" required="">
				
					</div>



					
					
					
					<input type="submit" name="" value="Registrar">

						
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/bootstrap/js/popper.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/daterangepicker/moment.min.js"></script>
	<script src="../../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../../js/main.js"></script>

</body>
</html>