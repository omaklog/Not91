<?php
session_start();
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
$sqlidarch="SELECT AUTO_INCREMENT AS LastId FROM information_schema.tables WHERE TABLE_SCHEMA='notaria' AND TABLE_NAME='archivos';";
$resultadoarch=mysql_query($sqlidarch);
$resultadoi = mysql_query("INSERT INTO `archivos` ( `Inst` , `Url` , `Estado` )VALUES('$n_inst','$urlarch','1')",$cn) or die (mysql_error());
$arrid=mysql_fetch_array($resultadoarch);
$_SESSION['id_arch']=$arrid['LastId'];
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