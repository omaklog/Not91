<!DOCTYPE HTML><head>
<meta charset="UTF-8">
<html lang="es">
<title >Formulario de Ingreso
</title><hr>


<link type="text/css" href="css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet"/>
<link type="text/css" href="css/login.css" rel="stylesheet"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jqueryui.js"></script>
<script type="text/javascript">
	//var x;
	//x=$(document);
	//x.ready(inicio);
	//function inicio(){
	//		var x=$("#login");
	//		x.dialog({height:300,width:300});
	//		x=$("#boton");
	//		x.button();
	//	}
</script>
</head>
<body>
<?php
	session_start();
	//validamos que el usuario tenga una session iniciada si ya la inicio y no es valido el usuario
	//muestra el mensaje
	if(isset($_SESSION['valido'])){
		if($_SESSION['valido']=="falso")
			{
			echo "<label>Usuario y contraseña no valido</label>";
			session_destroy();
			}
		//el usuario es valido por lo tanto lo redireccionamos a la pagina principal
		else
			{
			header("location:principal.php");
			}
	}
?>

	<div id="login" title="Ingresar" class="redondo">
		<div id="mensaje">
		</div>
    	<h4>INGRESAR AL SISTEMA</h4>
    	<div id="recuadro" >
    		<div id="encabezado">
    			<img src="img/logo.png" alt="Form Login">
    		</div>	
    		<div id="centro">
	    		<form id="form-login" action="php/login.php" method="POST">
	    			<p class="mb10">
						<input type="text" id="usuario" name="usuario" placeholder="Usuario" autofocus required>
					</p>
					<p class="mb10">
						<input type="password" id="pass" name="clave" placeholder="Clave" required>
					</p>
					<p>
					<input type="submit" value="Ingresar" id="submit" class="boton">
					</p>
				</form>
			
			</div>
			<div id="pie">
			</div>
		
		<div id="nota"></div>
	</div>
	</div>

</body>
</html>
