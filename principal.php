<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>
</title>
</head>
<link type="text/css" href="css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet"/>
<link type="text/css" href="css/style.css" rel="stylesheet"/>
<link href="css/kendoblue.css" rel="stylesheet">
<link href="css/kendo.common.min.css" rel="stylesheet">
<link href="css/kendo.default.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jqueryui.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
    <script src="js/kendo.web.min.js"></script>
    <script src="js/console.js"></script>

<script type="text/javascript">
	var x;
	x=$(document);
	x.ready(inicializar);
</script>
<body>	

<?php
	session_start();
		require_once("php/session.php");
		iniciarsesion();
		echo "<header><img src='img/barra.fw.png'></header>";
	?>
	<NAV id="lateral">
		<?php
		echo "<section id='bienvenida'>Bienvenido <br>".$_SESSION["nombre"]."</section>";
		?>

		<ul id="barra">
			<li><a id="nuevo" href="#">Nuevo</a></li>
			<li><a id="tramites" href="#">Mis Trámites</a></li>
			<li><a id="consultas" href="#">Consultas</a></li>
			<li><a id="reportes" href="#">Reportes</a></li>
			<li><a id="archDig" href="#">Archivo Digital</a></li>
			<li><a id="usuarios" href="#">Usuarios</a></li>
			<li><a id "cerrar" href="php/cerrar.php"> Cerrar Sesión</a></li>
		</ul>
	</NAV>
<div id="bandeja">
</div>

<div id="estado">
	</div>
</body>
</html>