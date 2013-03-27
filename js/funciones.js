function inicializar(){
	var x=$("#nuevo");
	x.click(showselacto);
	$("#cmbTipo").change(selectacto);
	$("#acto").change(selectcomp);
	$("#btnAgregar").click(agregarcomp);
	}

function showselacto(){
	x=$("#bandeja").load('alta.php');
	}
//Funcion para cargar los tipos de actos  en el select de actos
function selectacto(){
	var sel=$("#cmbTipo").val();
$.ajax({
			async:true,
			type:"POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"php/selectacto.php",
			data:"tipo="+sel,
			beforeSend: inicioEnvio,
			success:llegadaactos,
			timeout:4000,
			error:problemas
		});
		return false;
	}
//Funcion para cargar los tipos de comparecientes  en el select de comparecientes
function selectcomp(){
	var id=$("#acto").val();
$.ajax({
			async:true,
			type:"POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"php/selectcomp.php",
			data:"id="+id,
			beforeSend: inicioEnvio,
			success:llegadacomp,
			timeout:4000,
			error:problemas
		});
		return false;
	}
// funcion que agrega los datos devueltos del metodo ajax para comparecientes
function llegadaactos(datos){
	var x=$("#acto");
	x.empty();
	x.append(datos);
	selectcomp();
}

function llegadacomp(datos){
	var x=$("#tipocom");
	x.empty();
	x.append(datos);
}
//funcion para insertar los comparecientes agregados en el div
function agregarcomp(){
	var comp=$("#txtcomp").value();
	var tcid=$("#tipocom").val();
	var tccad=$("#tipocom").value();
}








	function inicioEnvio(){
		x.html('cargando...');
		}
	function problemas(){
		$("#bandeja").text('problemas en el servidor.');
	}



