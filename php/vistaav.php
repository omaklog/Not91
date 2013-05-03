<meta charset="UTF-8">
<?php
	include("conexion.php");
	conectar();
	//function loadav($idexp){
		$sql="SELECT * FROM  `avance`";
	$respuesta=mysql_query($sql);
	$cad="<script language=javascript type=text/javascript>
	$('.datepicker').datepicker();</script><label>Avance: </label><select id='cmbav' title='selecciones el avance'>";
		while ($arrtabla=mysql_fetch_array($respuesta)) {
			$cad.="<option value=".$arrtabla['id'].">".$arrtabla['avance']."</option>";
		}
	echo "</select>".$cad."<p></p><label> fecha: </label><p></p>
		<input type='text' id='dtav' placeholder='Fecha' style='width:100%;'  class='datepicker' required>
		<p></p>
		<label>Comentario:</label>
		<textarea  required id='txtcom' rows='6'cols='28'></textarea>
		<input id='btncerrar' type='button' onclick=actualizaav(".$_POST['exp'].") value='Guardar'>";
//	return $cad;
//	}
?>

<tr><td></td></tr>
