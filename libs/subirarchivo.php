<?php
include_once("conexion.php"); //archivo que contiene la conexion
try {
$url = $url . '?' . session_name() . '=' . session_id();
$cn = Conectar();
$arrayreempla=array("/","");

$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';

$archivo= str_replace($arrayreempla," ", $_FILES['Filedata']['name']);

$tempFile = $_FILES['Filedata']['tmp_name'];
$urlarch= time(). "-" . $archivo;
$n_inst= $_REQUEST['des'];
$targetFile = str_replace("//", "/", $targetPath) . $imagen;
$idarch="SELECT AUTO_INCREMENT AS LastId FROM information_schema.tables WHERE TABLE_SCHEMA='notaria' AND TABLE_NAME='expediente';";
$resultado=mysql_query($idarch);
$nuevoid=mysql_fetch_array($resultado);
$idexp=$nuevoid['LastId'];
$resultadoi = mysql_query("INSERT INTO `archivos` ( `Inst` , `Url` , `Estado`, `idexp` )VALUES('$n_inst','$urlarch','1','$idexp')",$cn) or die (mysql_error());

if ($resultadoi) {
echo "1";
move_uploaded_file($tempFile, $targetFile);
} else {
echo "0";
}
} catch (Exception $ex) {

echo "0";
}
?>