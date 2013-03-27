<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset="UTF-8">
<link type="text/css" href="../../css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet"/>
<link type="text/css" href="../../css/style1.css" rel="stylesheet"/>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jqueryui.js"></script>
<script type="text/javascript">
//Javascript para realizar un cuadro de dialogo con los estilos de Jqueryui
	var x;
	x=$(document);
	x.ready(inicio);
		function inicio(){
			var x;
			x=$("#usuarios");
			x.dialog({height:300,width:300});
		}
</script>
</head>
<body>
	<?php
	session_start();
		require_once("../session.php");
		//mandamos a llamar a la funcion para validar si el usuario es administrador
		$admin=iniciarsesionadmin();
		//si el usuario es administrador le mostramos el formulario para dar de alta
		if($admin==true){
			echo "<div id='usuarios' title='Nuevo Usuario'>
					<form id='us' action='procesoalta.php' method='post'>
						<input type='text' name='nombre' placeholder='nombre' required><br>
						<input type='text' name='usr' placeholder='Usuario' required><br>
						<input type='text' name='clv' placeholder='Clave' required><br>
						<input type='text' name='clv2' placeholder='Confirma clave' required><br>
						<input type='text' name='puesto' placeholder='puesto' required><br>
						<select name='tipo' id='tipo'><br>
     					<option value='0' selected>Restringido</option>
						<option value='1'>Administrador</option><br><br>
						<br><input type='submit' value='Registrar'>
    					</select>
						</form></div>";
		}
		//si no es administrador se lo informamos.
		else{
			echo "Usted no tiene permisos para dar de alta usuarios, por favor solicitelo a un administrador";
		}
?>
</body>
</html>