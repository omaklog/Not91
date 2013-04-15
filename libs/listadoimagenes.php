<?php
require_once("conexion.php");
$cn=Conectarse();

$listar= mysql_query("select * from archivos where ImagenEstado=1",$cn);
if(mysql_num_rows($listar)>0){
	echo"<table class='demoTable'>";
	echo"<caption>LISTADO DE IMAGENES</caption>";
	echo"<tr>";
	echo"<th>Estado</th>";
	echo"<th>Descripcion</th>";
	echo"<th>Miniatura</th>";
	echo"</tr>";
		while($imagen=(mysql_fetch_array($listar))){
			echo"<tr>";
if($imagen['ImagenEstado']==1){
echo"<td><img src='images/001_18.png' width='20'></td>";
}
else
{
echo"<td><img src='images/001_19.png' width='20'></td>";
}
echo"<td>".$imagen['ImagenDescripcion']."</td>";

echo"<td><a href='uploads/".$imagen['ImagenArchivo']."'><img src='uploads/".$imagen['ImagenArchivo']."' width='70' height='50'></a></td>";

echo"</tr>";
}
echo"</table>";
}else
{
echo"<div id='mensajevacio'>no existen imagenes registradas</div>";

}
?>