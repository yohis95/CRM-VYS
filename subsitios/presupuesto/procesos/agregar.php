<?php
/*
//De aca para abajo no funciona. 
		$nombre_usuario=$_POST['nombre'];
		$apellido_usuario=$_POST['apellido'];
		$nick_usuario=$_POST['usuario'];
		$clave_usuario=$_POST['clave'];
		$clave_rep_usuario=$_POST['clave_repetida'];
//Compruebo que las claves sean las mismas
		if($clave_usuario!=$clave_rep_usuario)
		{
			die('Las claves no coinciden');
		}
//me encripta la clave para que aparezca asi en la base de datos
		$clave_encriptada = md5($clave_usuario);

		
		$registro=mysql_query("INSERT INTO usuario VALUES('', '$nombre_usuario', '$apellido_usuario' , '$nick_usuario', '$clave_encriptada')",$connection) or die ("<h2> Error de registro </h2>");

		echo "Usuario registrado correctamente";


*/ 

require('../../../objetos/generales/conexion.php');


		$id_presupuesto=17;
		$nombre="prueba";
		$estado="prueba";



		/*Para definir el id_presupuesto
		//se busca el ultimo id registrado para sumarle uno y obtener el nuevo id	
			$consulta_ultimo_id = "SELECT id_presupuesto FROM tbl_presupuesto ORDER BY id_presupuesto DESC";
			$resultado_ultimo_id = mysql_query($consulta_ultimo_id);

			$rs_ultimo_id = mysql_fetch_array($resultado_ultimo_id, MYSQL_ASSOC);

			//Si hay resultados, le sumo 1 caso contrario coloco 1 al id actual
			if (mysql_num_rows($resultado_ultimo_id) != 0) {
				$id_presupuesto = $rs_ultimo_id["id_npresupuesto"] + 1;
			}
			else{
				$id_presupuesto= 1;
			} 
			*/


$consulta_agregar = "INSERT INTO tbl_presupuesto (id_presupuesto, nombre, estado) VALUES($id_presupuesto, '$nombre', '$estado')";
$resultado_agregar = mysqli_query($connection , $consulta_agregar);
	
if($resultado_agregar){
	//vuelve a la pagina anterior con exito	
	$pagina = "../nuevo_presupuesto.php";
}
else{
	die("SE HA PRODUCIDO UN ERROR. ");
}
		?>


<html>
<head>
<script language="JavaScript">
window.top.location.href="<?=$pagina ?>" 
</script>
</head>
</html>

