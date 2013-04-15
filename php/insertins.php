<?php
include("conexion.php");
conectar();
session_start();
$sql = "SET AUTOCOMMIT=0;";
$resultado = mysql_query($sql);
$sql = "BEGIN;";
$resultado = mysql_query($sql);
$idsql="SELECT AUTO_INCREMENT AS LastId FROM information_schema.tables WHERE TABLE_SCHEMA='notaria' AND TABLE_NAME='expediente';";
$resultado=mysql_query($idsql);
$nuevoid=mysql_fetch_array($resultado);
	echo $nuevoid['LastId'];
	$cadcomp=explode('*',$_POST['cadcomp']);
		$ciclos=(count($cadcomp)-2);
		for($i=0;$i<$ciclos;$i++){
			if($cadcomp[$i]==$_POST['name']){
				$sql="INSERT INTO `notaria`.`compareciente` (`id`, `nombre`, `telefono`, `mail`, `id_exp`, `tc`, `contacto`) VALUES (NULL, '".$cadcomp[$i]."', '".$_POST['telcontacto']."', '".$_POST['mailcontacto']."', '".$nuevoid['LastId']."', '".$cadcomp[$i+1]."', '1');";
				$resultado=mysql_query($sql);
				validarc($resultado,"");
			}
		else{
			$sql="INSERT INTO `notaria`.`compareciente` (`id`, `nombre`, `telefono`, `mail`, `id_exp`, `tc`, `contacto`) VALUES (NULL, '".$cadcomp[$i]."', '', '', '".$nuevoid['LastId']."', '".$cadcomp[$i+1]."', '0');";
			$resultado=mysql_query($sql);
			validarc($resultado);
			}
		$i++;
		}
	$cad="INSERT INTO `notaria`.`expediente` (`idexp`, `id_tacto`, `id_acto`, `instrumento`, `volumen`, `fecha_cel`, `id_red`, `id_status`, `Folio_RPP`, `id_gestor`, `comentario`) VALUES (NULL, '".$_POST['idta']."', '".$_POST['idaj']."', '".$_POST['inst']."', '".$_POST['vol']."', '".$_POST['fechacel']."', '".$_SESSION['id']."', '', '', '".$_POST['gestor']."' ,'".$_POST['com']."');";
	$resultado=mysql_query($cad);
	validarc($resultado);
function validarc($resultado){
	if ($resultado) {
		$sql = "COMMIT";
		$resultado = mysql_query($sql);
	}
	else{
		echo 'ERROR: NO SE GUARDARON LOS DATOS';
		echo '
		';
		echo 'SE EJECUTA EL ROOLBACK';
		echo '
		';

		$sql = "ROLLBACK;";
		$resultado = mysql_query($sql);
	}
}
?>	