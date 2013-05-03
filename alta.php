<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset="UTF-8">
<script type="text/javascript">
	var x;
	x=$(document);
	x.ready(inicializar);
</script>
<script language=javascript type=text/javascript>
function stopRKey(evt) {
var evt = (evt) ? evt : ((event) ? event : null);
var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
if ((evt.keyCode == 13) && (node.type=="text")) {return false;}
}
document.onkeypress = stopRKey; 
</script>
</head>
<body>
	<?php 
		session_start()
	?>
	<form action="php/insertins.php" method="POST" id="formInst">
		<div id="inst">
			<fieldset id="primera">
			<legend>Datos de Instrumento</legend>
					<select id="cmbTipo" placeholder="Selecciona un tipo de acto">
						<option >Selecciona un Tipo de Acto</option>
						<option value="0">TRASLATIVO</option>
						<option value="1">NO TRASLATIVO</option>
					</select>
					<select id="acto">
						<option value="">Seleccione el acto Jurídico</option>
					</select>
				<input type="number" min="1" id="instrumento" name="instrumento" placeholder="Numero de Instrumento" required>
				<input type="number" min="1" id="volumen" name="volumen" placeholder="Numero de Volumen" required>
				<label> Fecha de Celebración: </label><input type="text"  class="datepicker" id="fechacel" name="fechacel" required>
				<p></p>
				<div id="gridcomp" >
					<div id="gridcuerpo">
						<input type="text"  name="compareciente" placeholder="compareciente" id="txtComp">
						<select id="tipocom">
							<option value="">Tipo de Compareciente</option>
						</select>
						<input id="btnAgregar" class="botones" type="button" value="Agregar" class="button"><br>
					</div>
						<div id="gridheader">
							<p></p>
							<table role="grid" cellspacing="0">
								<colgroup>
									<col>
									<col>
									<col>
								</colgroup>
								<thead>
									<tr>
	
										<th class="name">Nombre</th>
										<th class="tipe">Tipo</th>
										<th class="del">Eliminar</th>
									</tr>
								</thead>
							</table>
						</div>
					<div id="gridrow">
						<table cellspacing="0" role="grid" style="height: auto;">
							<colgroup>
								<col>
								<col>
								<col>
								<col>
							</colgroup>
							<tbody id="cuerpotabla">
							</tbody>
						</table>
					</div>
					<h5 id="not">Haz clic sobre el nombre del cliente que será notificado sobre el avance del trámite</h5>
				</div>
			</fieldset>
		</div>
			<div id="segunda">
				<fieldset id="contacto" >
					<legend>Contacto</legend>
					<p><input id="Cnombre"type="text" readonly="readonly" 	name="nombre" placeholder="Nombre" required></p>
					<p><input id="Ctel" type="tel" name="tel" placeholder="Teléfono" required></p>
					<p><input id="Cmail" type="mail" name="E-mail" placeholder="E-mail"></p>
					Gestiona: <select id="gestor">
						<?php 
							include("php/conexion.php");
								//Crea la cadena y devuelve el arreglo con los resultados
							conectar();
								$rest=mysql_query("SELECT id, nombre FROM usuarios");
								while ($reg=mysql_fetch_array($rest))
							{
							  echo "<option value=".$reg['id'].">".$reg['nombre']."</option>";
							}
						?>
						</select>
				</fieldset>
				<fieldset id="uparchivos">
					<legend>Datos</legend>
					<div id="nuevaimagen">
					</div>
				</fieldset>
				<fieldset id="comentarios">
					<legend>Comentarios</legend>
					<textarea id="comentario" name="comentario" rows="8" cols="30"></textarea>
					<input class="botones" id ="btnCancelar" type="button" value="Cancelar" class="button"><br>
					<input class="botones" id ="btnGuardar" onclick="javascript:startUpload('file_upload', document.getElementById('instrumento'))" type="submit" value="Guardar" class="button"><br>
				</fieldset>
				
			</div>
	<div id="resultados"></div>
	</form>
<?php

?>
</body>
</html>