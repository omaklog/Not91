<?php
include("conexion.php");
	//Crea la cadena y devuelve el arreglo con los resultados
conectar();
	$rest=mysql_query("SELECT id_acto, acto FROM actos WHERE Tipo = ".$_POST['tipo']);
	while ($reg=mysql_fetch_array($rest))
{
  echo "<option value=".$reg['id_acto'].">".$reg['acto']."</option>";
}
?>