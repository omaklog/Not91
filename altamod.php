<?php 
echo "<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset='UTF-8'>
<link rel='stylesheet' type='text/css' href='css/alta.css'>
</head>
<body>";
		session_start();
		echo $_GET['tipoacto'];
	echo "<form>
		<div id="inst">
			<fieldset>
			<legend>Datos de Instrumento</legend>
				<p>
					<select id="acto">
						<option value="">Seleccione el acto Jurídico</option>
					</select>
					
				</p>		
				<input type="number" id="instrumento" name="instrumento" placeholder="Numero de Instrumento" required>
				<input type="number" id="volumen" name="volumen" placeholder="Numero de Volumen" required>
				<label> Fecha de Celebración: </label><input type="date" id="fechacel" name="fechacel">
				<input type="text" name="adquiriente" placeholder="compareciente" required>
				<select id="tipocom">
					<option value="">Tipo de Compareciente</option>
				</select>
				<input id="btnAgregar" type="button" value="Agregar" class="button">
				<input id ="btnQuitar" type="button" value="Quitar" class="button"><br>
				<div id="comparecientes">
					<p>Hola soy el div de comparecientes</p>
					<p>Hola soy el div de comparecientes</p>
					<p>Hola soy el div de comparecientes</p>
					<p>Hola soy el div de comparecientes</p>
				</div>
				
				
			</fieldset>
			<div id="segunda">
				<fieldset id="contacto" class="contacto">
					<legend>Contacto</legend>
					<p><input type="text" name="nombre" placeholder="Nombre" required></p>
					<p><input type="tel" name="acto" placeholder="Teléfono" required></p>
					<p><input type="mail" name="E-mail" placeholder="E-mail"></p>
				</fieldset>
				<fieldset id="responsable">
					<legend>Otros Datos</legend>
					<p><label>Redactor</label><?php echo " ".$_SESSION["nombre"]."" ?></p>
					<p>Gestiona: <select id="gestor"></p>
						<option value="">Selecciona el Gestor del trámite</option>
						<?php 

						?>
						</select></p>
					<label>Archivo: </label> 
					<input name="archivo" type="file"> 
					<p></p>
					</fieldset>
				<fieldset id="comentarios">
					<legend>Comentarios</legend>
					<textarea id="comentario" name="comentario" rows="8" cols="30"></textarea>
				</fieldset>
				<fieldset id="guardar">
					<legend>Guardar</legend>
					<input id ="btnCancelar" type="button" value="Cancelar" class="button"><br>
					<input id ="btnGuardar" type="button" value="Guardar" class="button"><br>
				</fieldset>
			</div>
		</div>
<?php

?>
</form>

</body>
</html>"