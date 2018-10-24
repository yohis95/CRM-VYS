<?php


require('../../objetos/generales/conexion.php');


		
$consulta= "SELECT * FROM tbl_presupuesto";
$result = mysqli_query($connection , $consulta);
$filas = myqsli_num_rows($result);
echo $filas;


		?>


<html>
<head>
<script language="JavaScript">
window.top.location.href="<?=$pagina?>" ;

</script>
</head>

</html>
