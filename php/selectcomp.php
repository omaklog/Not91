<?php
include("conexion.php");
	//Crea la cadena y devuelve el arreglo con los resultados
conectar();
	$rest=mysql_query("SELECT id, tipocomp FROM tipocomp WHERE id_acto = ".$_POST['id']);
	while ($reg=mysql_fetch_array($rest))
{
  echo "<option value=".$reg['id'].">".$reg['tipocomp']."</option>";
}
?>