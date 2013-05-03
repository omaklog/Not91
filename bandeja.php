<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset="UTF-8">
<script type="text/javascript">
$("#selav").hide();
</script>
</head>
<body>
	<div id="tbandeja">
		<table cellspacing="0">
				<tr class="tahead">
					<th class="hlist">No.Exp.</th>
					<th class="hinst">Instrumento</th>
					<th class="hvol">volumen</th>
					<th class="haj">Acto Jurídico</th>
					<th class="hcomp">Compareciente</th>
					<th class="hav">Avance</th>
					<th class="hEditar">Editar</th>
					<th class="hfc">Celebración</th>
					<th class="hges">Gestor</th>
					<th class="hstat">Movimientos</th>
					<th class="hsir">Folio SIR</th>
				</tr>
				
					<?php
						session_start();
						$row="impar";
						include("libs/conexion.php");
							//Crea la cadena y devuelve el arreglo con los resultados
						conectar();
							$rest=mysql_query("SELECT * FROM expediente WHERE id_red = ".$_SESSION['id']." OR id_gestor = ".$_SESSION['id']);
							while ($reg=mysql_fetch_array($rest))
						{
						  echo "<tr class=".$row."><td class='tdlist'>".$reg['idexp']."</td>
								<td class='tdinst'>".$reg['instrumento']."</td>
								<td class='tdvol'>".$reg['volumen']."</td>
								<td class='tdaj'>";
									$rest1=mysql_query("SELECT acto FROM actos WHERE id_acto = ".$reg['id_acto']);
								while ($reg1=mysql_fetch_array($rest1)){
									echo "".$reg1['acto'];
								}
								echo "</td>
								<td class='tdcomp'>";
								$rest2=mysql_query("SELECT nombre FROM compareciente WHERE id_exp = ".$reg['idexp']." AND contacto = 1");
								while ($reg2=mysql_fetch_array($rest2)){
									echo "".$reg2['nombre'];
								}
								echo "</td>
								<td class='tdav' value =".$reg['idexp']." onclick=mostrarav(".$reg['idexp'].") alt='ver historial'>";
								$rest3=mysql_query("SELECT avance FROM avance WHERE id=".$reg['id_status']);
								while ($reg3=mysql_fetch_array($rest3)){
									echo $reg3['avance'];
									echo "<span class='ui-icon ui-icon-triangle-1-s' style='float: right; margin-right: .3em;''></span>";
								}
								echo "</td>
								<td class='tdEditar'><img src='img/b_edit.png' id=".$reg['idexp']." onclick=editarav(".$reg['idexp'].",".$reg['id_tacto'].") alt='Editar' class='iconoEdit'></td>
								<td class='tdfc'> ".$reg['fecha_cel']."</td>
								<td class='tdges'>";
								$rest4=mysql_query("SELECT nombre FROM usuarios WHERE id = ".$reg['id_gestor']);
								while ($reg4=mysql_fetch_array($rest4)){
									echo "".$reg4['nombre'];
								}
								echo "</td>
								<td class='tdstat'> ".$reg['id_status']."</td>
								<td class='tdsir'> ".$reg['Folio_RPP']."</td></tr>";
								if($row=="impar"){
									$row="par";
								}
								else{
									$row="impar";
								}
						}
					?>
					
			<div id="avances" title="Lista de Avances"></div>
			</thead>
		</table>
	</div>
	<div id="selav" title="Seleccione el avance del trámite">
				<?php
					$rest5=mysql_query("SELECT * FROM actos");
								while ($reg5=mysql_fetch_array($rest5)){
									echo "".$reg5['id_acto'];
								}
				?></div>
</body>
</html>