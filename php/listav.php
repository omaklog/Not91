<meta charset="UTF-8">
<?php
	include("conexion.php");
	conectar();
	//function loadav($idexp){
		$sql="SELECT a.avance, b.fecha, u.nombre
	FROM bitacora AS b
	JOIN avance AS a ON b.idav = a.id
	JOIN usuarios AS u ON u.id = b.id_usr
	WHERE idexp =".$_POST['idexp'];
	$respuesta=mysql_query($sql);
	$cad="<table><tr><th >Avance</th><th id='thfecha'>Fecha</th><th>Realizó</th></tr>";
		while ($arrtabla=mysql_fetch_array($respuesta)) {
			$arrfecha=explode('-', $arrtabla['fecha']);

			$cad.="<tr><td>".$arrtabla['avance']."</td><td id='tdfecha'>".$arrfecha[2]."-".$arrfecha[1]."-".$arrfecha[0]."</td><td>".$arrtabla['nombre']."</td></tr></table";
		}
	echo "$cad";
//	return $cad;
//	}
?>

<tr><td></td></tr>
