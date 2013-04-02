<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/alta.css">
<script type="text/javascript">
	var x;
	x=$(document);
	x.ready(inicializar);
</script>
</head>
<body>
	<?php 
		session_start()
	?>
	<form action="insertins.php" method="POST" id="formInst">
		<div id="inst">
			<fieldset>
			<legend>Datos de Instrumento</legend>
					<select id="cmbTipo" placeholder="Selecciona un tipo de acto">
						<<option >Selecciona un Tipo de Acto</option>
						<option value="0">TRASLATIVO</option>
						<option value="1">NO TRASLATIVO</option>
					</select>
					<select id="acto">
						<option value="">Seleccione el acto Jurídico</option>
					</select>
				<input type="number" id="instrumento" name="instrumento" placeholder="Numero de Instrumento" required>
				<input type="number" id="volumen" name="volumen" placeholder="Numero de Volumen" required>
				<label> Fecha de Celebración: </label><input type="date" id="fechacel" name="fechacel" required>
				<p></p>
				<div id="gridcomp" >
					<div id="gridcuerpo">
						<input type="text"  name="compareciente" placeholder="compareciente" id="txtComp">
						<select id="tipocom">
							<option value="">Tipo de Compareciente</option>
						</select>
						<input id="btnAgregar" type="button" value="Agregar" class="button"><br>
					</div>
						<div id="gridheader">
							<p></p>
							<table role="grid" cellspacing="0">
								<colgroup>
									<col>
									<col id="name">
									<col>
									<col></col>
								</colgroup>
								<thead>
									<tr>
										<th id="chkbx">Seleccionar</th>
										<th id="name">Nombre</th>
										<th id="tipe">Tipo</th>
										<th id="del">Eliminar</th>
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
				</div>
			</fieldset>
		</div>
			<div id="segunda">
				<fieldset id="contacto" class="contacto">
					<legend>Contacto</legend>
					<p><input id="Cnombre"type="text" name="nombre" placeholder="Nombre" required></p>
					<p><input id="Ctel" type="tel" name="acto" placeholder="Teléfono" required></p>
					<p><input id="Cmail" type="mail" name="E-mail" placeholder="E-mail"></p>
				</fieldset>
				<fieldset id="responsable">
					<legend>Responsables</legend>
					<p><label>Redactor</label><?php echo " ".$_SESSION["nombre"]."" ?></p>
					<p>Gestiona: <select id="gestor"></p>
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
						</select></p>
					<label>Archivo: </label>
					<div id="upload_button">Cargar Archivo</div>
					<ul id="lista">
					</ul>
				</fieldset>
				<fieldset id="comentarios">
					<legend>Comentarios</legend>
					<textarea id="comentario" name="comentario" rows="8" cols="30"></textarea>
					<input id ="btnCancelar" type="button" value="Cancelar" class="button"><br>
					<input id ="btnGuardar" type="submit" value="Guardar" class="button"><br>
				</fieldset>
			</div>
<?php

?>
</form>

</body>
</html>