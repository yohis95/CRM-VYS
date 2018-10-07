<?php


$accion="";/*por_error - eliminar*/
$id_presupuesto="";
foreach ($_GET as $key => $value ) {
   if (isset($_GET[$key]))
   	$$key = $value;
}


require('../../../objetos/generales/conexion.php');


$consulta = "SELECT FROM tbl_itemproducto WHERE idPresupuesto = $id_presupuesto";
$resultado = mysqli_query($connection , $consulta);

if($resultado){

$consulta_item_producto = "DELETE FROM tbl_itemproducto WHERE idPresupuesto = $id_presupuesto";
$resultado_item_producto = mysqli_query($connection , $consulta_item_producto);
		while($rs_item_producto = mysqli_fetch_array($resultado_item_producto, MYSQL_ASSOC)){

			$id_item_producto = $rs_item_producto['idItemproducto'];

			$consulta_eliminar = "DELETE FROM tbl_itemproducto WHERE idItemProducto = $id_item_producto";
			$resultado_eliminar = mysqli_query($connection , $consulta_eliminar);


			if($resultado_eliminar){

				$consulta_eliminar = "DELETE FROM tbl_presupuesto WHERE idPresupuesto = $id_presupuesto";
				$resultado_eliminar = mysqli_query($connection , $consulta_eliminar);

				if($resultado_eliminar){
					if($accion == "por_cancelar"){
						$pagina = "../listado.php";
					}
					if($accion == "por_error"){
						$pagina= "../listado.php";
					}
					if($accion == "eliminar"){

						$pagina= "../listado.php?resultado_accion=exito";
					}
				}
				else{
					if($accion == "por_cancelar"){
						$pagina = "../listado.php";
					}
					if($accion == "por_error"){
						$pagina = "../listado.php?resultado=fracaso";
					}
					if($accion == "eliminar"){

						$pagina= "../listado.php?resultado_accion=fracaso";
					}
					
				}
				
			}
			else{
					if($accion == "por_cancelar"){
						$pagina = "../listado.php";
					}
					if($accion == "por_error"){
						$pagina = "../listado.php?resultado=fracaso";
					}
					if($accion == "eliminar"){

						$pagina= "../listado.php?resultado_accion=fracaso";
					}
				
			}
					

		} /*Fin while*/
	}else{

		$consulta_eliminar = "DELETE FROM tbl_presupuesto WHERE idPresupuesto = $id_presupuesto";
				$resultado_eliminar = mysqli_query($connection , $consulta_eliminar);

				if($resultado_eliminar){
					if($accion == "por_cancelar"){
						$pagina = "../listado.php";
					}
					if($accion == "por_error"){
						$pagina= "../listado.php";
					}
					if($accion == "eliminar"){

						$pagina= "../listado.php?resultado_accion=exito";
					}
				}
				else{
					if($accion == "por_cancelar"){
						$pagina = "../listado.php";
					}
					if($accion == "por_error"){
						$pagina = "../listado.php?resultado=fracaso";
					}
					if($accion == "eliminar"){

						$pagina= "../listado.php?resultado_accion=fracaso";
					}
					
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