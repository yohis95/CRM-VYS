<?php




?>

<!DOCTYPE html>
<html>
<head>
	<title>CRM VYS</title>
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



function validar() {		
	
			document.formulario.action = "validacion.php";
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

body{
			background: url(images/fondo.jpg);
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

	<nav class="navbar navbar-expand-lg navbar-dark " style="background: white; border-bottom: 1px solid #D01262">
			<a href="#" class="navbar-brand"><img src="images/logo.png" width="50"></a>
			
		</nav>



	
		<div class="container">
			<div class="contenedor_formulario p-l-55 p-r-55 p-t-65 p-b-54">
				<!--Action y method lo agregue para enlazarlo al archivo de php-->
				<form name="formulario" method="post">
					<span class="titulo_formulario p-b-49">
					</span>

					<div class="wrap-input100 validate-input m-b-23">
						

						<div class="form-group">
 										
						
			<div class="form-group col-md-6"> 
				<label for="usuario">Usuario</label> <br>
    			<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese su usuario">
    		</div>

    		<div class="form-group col-md-6"> <br>
    			<label for="clave">Clave</label><br>
    			<input type="text" class="form-control" name="clave" id="clave" placeholder="Ingrese su clave">
    		</div>

    		


    	<!--	<div class="form-group ">
 										<label for="email">Nombre y apellido</label>
 									   <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese aquí su nombre">

						</div>-->


					<div class="form-group "> <br>
		                
		                <input type="submit" class="btn btn-primary"   value="Ingresar" onClick="validar()">
		            </div>    

				

						
				</form>
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