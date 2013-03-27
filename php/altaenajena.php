<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset="UTF-8">
<script src="jquery-1.8.3.min.js" type="text/javascript"></script>
<script>
  $(function(){
    var autocompletar = new Array();
    <?php //Esto es un poco de php para obtener lo que necesitamos
     for($p = 0;$p < count($arreglo_php); $p++){ //usamos count para saber cuantos elementos hay 
		echo "string"; "string, armando, benito";
     	?>
       autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
       autocompletar.push("armando");
       autocompletar.push("benito");
       autocompletar.push("luis");
       
     <?php } ?>
     $("#nombre").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
       source: autocompletar //Le decimos que nuestra fuente es el arreglo
     });
  });
</script>	
</head>
<body>
	<?php
	require_once("conexion.php");
	conectar();
		$sql = "SELECT * FROM usuarios ORDER BY 'nombre'";
$res = mysql_query($sql);
$arreglo_php = array();
$palabras = array();
$cont=mysql_num_rows($res);
if($cont==0)
   array_push($arreglo_php, "No hay datos");
else{
  while($palabras = mysql_fetch_array($res)){
    array_push($arreglo_php, $palabras["nombre"]);
  }
}
?>
	<form>	
		<input type="text" name="nombre" id="nombre">
		<input type="mail" name="mail" placeholder="E-Mail">
		<input type="number" name="telefono" placeholder="Teléfono">
		<input type="number" name="celular" placeholder="Celular">
		
	</form>
</body>
</html>