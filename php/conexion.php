<?php
$host="localhost"; // nombre del Servidor
$username="root"; // Usuario mysql
$password=""; // Mysql password 
$db_name="notaria"; // nombre de la base de datos
function conectar(){
	global $host,$username,$password,$db_name;
	mysql_connect("$host", "$username", "$password")or die("Imposible conectar"); 
	mysql_select_db("$db_name")or die("base de datos no seleccionada");
}
?>