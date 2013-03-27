<meta charset="UTF-8">
<?php
	require_once("../conexion.php");
conectar();
	$nombre=$_POST['nombre'];
	$usuario=$_POST['usr'];
	$clave1=$_POST['clv'];
	$clave2=$_POST['clv2'];
	$puesto=$_POST['puesto'];
	$tipo=$_POST['tipo'];
	$SQL= "INSERT INTO usuarios (id,nombre,usuario,clave,puesto,tipo) VALUES ( null, '".$nombre."','".$usuario."','".$clave1."','".$puesto."','".$tipo."');";
	mysql_query($SQL);
	echo"El usuario ".$nombre." ha sido registrado con éxito";
?>