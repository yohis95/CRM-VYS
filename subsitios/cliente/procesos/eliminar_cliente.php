<?php



$id_presupuesto="";
foreach ($_GET as $key => $value ) {
   if (isset($_GET[$key]))
   	$$key = $value;
}


require('../../../objetos/generales/conexion.php');


$consulta = "SELECT * FROM tbl_presupuesto WHERE idCliente = $id_cliente";
$resultado = mysqli_query($connection , $consulta);

if($resultado){



			$consulta_eliminar_aca = "DELETE FROM tbl_presupuesto WHERE idCliente = $id_cliente";
			$resultado_eliminar_aca = mysqli_query($connection , $consulta_eliminar_aca);


			if($resultado_eliminar_aca){

				$consulta_eliminar = "DELETE FROM tbl_cliente WHERE idCliente = $id_cliente";
				$resultado_eliminar = mysqli_query($connection , $consulta_eliminar);

				if($resultado_eliminar){

						$pagina= "../listado.php?resultado_accion=exito";
					
				}
				else{
						$pagina= "../listado.php?resultado_accion=fracaso";
					
				}
				
			}
			else{
						$pagina= "../listado.php?resultado_accion=fracaso";
					
				
			}
					

		
	}else{

		$consulta_eliminar = "DELETE FROM tbl_cliente WHERE idCliente = $id_cliente";
				$resultado_eliminar = mysqli_query($connection , $consulta_eliminar);

				if($resultado_eliminar){
						$pagina= "../listado.php?resultado_accion=exito";
					
				}
				else{

						$pagina= "../listado.php?resultado_accion=fracaso";
					}
					
				

	}
?>


<html>
<head>
<script language="JavaScript">
 window.top.location.href="<?=$pagina?>" 
</script>
</head>
<body>

</body>

</html>