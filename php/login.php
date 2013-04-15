<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset="UTF-8">
</head>
<body>
<?php
require_once("conexion.php");
conectar();
session_start();
$user=$_POST['usuario'];
$pass=$_POST['clave'];
$SQL="SELECT * FROM usuarios WHERE usuario='$user' AND clave='$pass';";
$RESULT=mysql_query($SQL);
$coin=mysql_num_rows($RESULT);
$_SESSION['valido']="";
if($coin==1)
{
	$_SESSION['valido']="valido";
	$datos=mysql_fetch_assoc($RESULT);
	$_SESSION["id"]=$datos['id'];	
	$_SESSION["nombre"]=$datos['nombre'];
	$_SESSION["user"]=$datos['usuario'];
	$_SESSION["clave"]=$datos['clave'];
	$_SESSION["puesto"]=$datos['puesto'];
	$_SESSION["tipo"]=$datos['tipo'];
	header("location:../principal.php");
	
}
else{
	$_SESSION['valido']="falso";
	header("location:../index.php");
}
?>

</body>

</html>

