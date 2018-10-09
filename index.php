<?php
session_start();
require_once('/objetos/generales/conexion.php'); 

$error_usuario = "";
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

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="favicon.ico"/>
<!--===============================================================================================-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script language="javascript" type="text/javascript">

function validar_logueo(theForm) {
	
	if (theForm.usuario.value == ""){
		alert("El usuario es un dato requerido.");
		theForm.usuario.focus();
		return (false);
	}
	
	if (theForm.clave.value == ""){
		alert("La clave es un dato requerido.");
		theForm.clave.focus();
		return (false);
	}
	
	
		
	return (true);
}

</script>

<style type="">
	
	.contenedor_formulario {
 
  padding: 20px;

  background: #fff;
  border-radius: 1px;
  overflow: hidden;


}

.contenedor_formulario_web{
	padding: 20px;

  background: #fff;
  border-radius: 1px;
  overflow: hidden;

}

.titulo_logueo{
  font-weight: 600;
  padding-bottom:20px;
  font-size: 22px;
  color: #EE8A12;
  line-height: 1.2;

}

.texto_logueo{
	display: inline-block;
	font-size: 22px;
  	color: #EE8A12;
  	padding-left: 15px;
}


body{	
	background: url(images/fondo.jpg);
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

	



	
		<div class="container">
			<div class="col-xs-12 col-md-6 contenedor_formulario">


				<div class="titulo_logueo"> <img src="images/logo.png" width="20%"><div class="texto_logueo"> Acceso a VYS</div></div>
				<?php
				if  ($error_usuario == "si") {
				?>
					 <div class="alert alert-dismissible alert-danger">
				  		<strong>Ooops!</strong> Acceso denegado.
					 </div>


				<?php
				}  
				?>
				
				<!--Action y method lo agregue para enlazarlo al archivo de php-->
				<form name="formulario" action="principal.php" method="POST" onSubmit="return validar_logueo(this)">
					
			
 										
						
					<div class="form-group "> 
						<label for="usuario">Usuario</label> 
		    			<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese su usuario">
		    		</div>

		    		<div class="form-group "> <br>
		    			<label for="clave">Clave</label>
		    			<input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese su clave">
		    		</div>

    		
					<br>



					<div class="form-group "> 
		                
		                <input type="submit" class="btn btn-primary"   value="Ingresar" onClick="validar()">
		            </div>    

				

						
				</form>
			</div>
		</div>
		

	



</body>
</html>