<?php
include("conexion.php");
conectar();
session_start();
	$sql="UPDATE  expediente SET  `id_status` =  '".$_POST['av']."' WHERE  `idexp` =".$_POST['idexp'].";";
	mysql_query($sql);
	$arrfecha=explode("/",$_POST['date']);
	$fecha=$arrfecha[2]."-".$arrfecha[1]."-".$arrfecha[0];
	$sql="INSERT INTO  `notaria`.`bitacora` (
`id` ,
`idav` ,
`idexp` ,
`fecha` ,
`id_usr` ,
`comentario`
)
VALUES (
NULL ,  '".$_POST['av']."',  '".$_POST['idexp']."',  '".$fecha."',  '".$_SESSION['id']."',  '".$_POST['com']."'
);";
	mysql_query($sql);
?>