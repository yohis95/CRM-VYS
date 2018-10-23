<?php


require('../../../objetos/generales/conexion.php');



		
$consulta= "SELECT * FROM tbl_presupuesto WHERE idCliente = 5";
$result = mysqli_query($connection , $consulta);

$filas = mysqli_num_rows($resultado_presupuestos)
echo $filas;


		?>


<html>
<head>
<script language="JavaScript">
window.top.location.href="<?=$pagina?>" ;

</script>
</head>

</html>