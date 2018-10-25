<?php
session_start();
require('../../objetos/generales/conexion.php');
$link_error="../../index.php?error_usuario=si";
require_once('../../objetos/generales/validar.php'); 

$filtro = "";
$provincia = "";

foreach ($_GET as $key => $value ) {
   if (isset($_GET[$key])){
   	$$key = $value;
}
}
foreach ($_POST as $key => $value ) {
   if (isset($_POST[$key])){
   	$$key = $value;
}
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
						<a href="../../subsitios/estadisticas/seleccion_estadisticas.php" class="nav-link" style="color: black; margin-top: 5px; border-left: 1px solid black; padding: 0px 10px 0px 10px;">Estadisticas</a>
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
				<form  name="formulario" method="POST" action="seleccion_estadisticas.php?filtro=si">
					<span class="titulo_formulario p-b-49">
				Estadisticas sobre estados de presupuestos
					</span>

					
					<div class="subtitulo">Filtro por provincia</div>
					<br>

							<div class="form-group col-md-6">
										<select class="form-control" id="provincia" name="provincia">
						<option name="provincia" id="provincia" value="">Selecciona una provincia</option>
    			<?php
    			$consulta_provincias = "SELECT * FROM tbl_provincias";
    			$resultado_provincias = mysqli_query($connection , $consulta_provincias);
				while($rs_provincias = mysqli_fetch_array($resultado_provincias, MYSQL_ASSOC)){
					if($provincia == $rs_provincias['idProvincia'] ){
    			?>
    			<option name="provincia" id="provincia" selected value="<?=$rs_provincias['idProvincia']?>"><?=$rs_provincias['provincia']?> </option>
    			<?php
    			}else{
    				?>
    				<option name="provincia" id="provincia"  value="<?=$rs_provincias['idProvincia']?>"><?=$rs_provincias['provincia']?> </option>
    				<?php
    			}
}
    			?>
    		</select>
								</div>
								

							<div class="form-group ">
		                	<input type="submit" class="btn btn-primary" value="Aplicar filtro" >
		            		</div>
			
		            			


		            <?php

		            if($filtro == 'si'){
		            		require_once('procesos/estadistica_provincia.php'); 
		            }else{
		            		require_once('procesos/estadistica_sin_filtro.php'); 
		            }

		            ?>
		            <div class="subtitulo">Resultado - Hay <?=$cantidad_total?> presupuestos registrados</div>
		            			<br>

		            		<?php
		            		if($cantidad_total != 0){
		            		?>
		      
		        	<div class="descripcion" style="color: red; padding-left: 5px; padding-top: 5px; font-weight: 500;"><?=$cantidad_cancelado?> presupuestos cancelados -<?=$porcentaje_cancelado?>%</div> 
		        	<div class="cancelado" style="background: red; height: 35px; width: <?=$porcentaje_cancelado?>%; "></div>
		        	<br>
		        	<div class="descripcion" style="color: orange; padding-left: 5px; padding-top: 5px; font-weight: 500;"><?=$cantidad_espera?> presupuestos en espera - <?=$porcentaje_espera?>% </div>
		        	<div class="en_espera" style="background: orange; height: 35px; width: <?=$porcentaje_espera?>%; "></div>
		        	<br>
		        	<div class="descripcion" style="color: green; padding-left: 5px; padding-top: 5px; font-weight: 500;"><?=$cantidad_confirmado?> presupuestos Aceptados - <?=$porcentaje_confirmado?>%</div>
		        	<div class="aceptado" style="background: green; height: 35px; width: <?=$porcentaje_confirmado?>%; "> </div>

		        <?php } ?>

		    </div>
		        </form>
		    </div>
		</div>
				

						
				
</body>
</html>