<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>
</title>
</head>
<link type="text/css" href="css/style.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/alta.css">
<script type="text/javascript" src="js/funciones.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="uploadify/jquery.uploadify.js"></script>

<script type="text/javascript">
	var x;
	x=$(document);
	x.ready(inicializar);
</script>
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