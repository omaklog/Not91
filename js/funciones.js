var cont=0;
var arr_nom_comp= new Array();
var arr_tipo_comp= new Array();
var name="";
function inicializar(){
	tips();
	$( ".datepicker" ).datepicker();
	verformularioni();
	$(".ui-icon").button({icons: {secondary: "ui-icon ui-icon-triangle-1-s"}});
	$(".ui-icon").button({icons: {secondary: "ui-icon ui-icon-circle-plus"}});
	var x=$("#nuevo");
	$("#tramites").click(showbandeja);
	x.click(showselacto);
	$("#cmbTipo").change(selectacto);
	$("#acto").change(selectcomp);
	$("#btnAgregar").click(agregarcomp);
	$("#btnGuardar").click(guardarinst);
	$("form").submit(function(){
    //aqui podemos llamar alguna funcion por defecto o nada. 
    //El return false va igual
    return false;
	});
}
function actualizaav(exp){
	var av=$("#cmbav").val();
	var date=$("#dtav").val();
	var com=$("#txtcom").val();
	if(av!=""& date!="" & com!=""){
		insertav(exp,av,date,com);
	}
	else
	alert("faltan campos por llenar");
}
function insertav(exp,av,date,com){
	$.ajax({
									async:true,
									type:"POST",
									dataType: "html",
									contentType: "application/x-www-form-urlencoded",
									url:"php/insertav.php",
									data:"idexp="+exp+"&av="+av+"&date="+date+"&com="+com,
									//beforeSend: inicioEnvio,
									success:llegadaav,
									timeout:4000,
									error:problemas
								});
	}
function llegadaav(datos){
	if(datos==""){
		$("#selav").empty();
	}
}
function agregarav(idexp){
	$("#selav").show();
}
function mostrarav(exp){
          $.ajax({
									async:true,
									type:"POST",
									dataType: "html",
									contentType: "application/x-www-form-urlencoded",
									url:"php/listav.php",
									data:"idexp="+exp,
									//beforeSend: inicioEnvio,
									success:llegadaav,
									timeout:4000,
									error:problemas
								});
          function llegadaav(datos){
          	$("#avances").empty();
          	$("#avances").append(datos);
          	return $("#avances").dialog({ height: 140,
      modal: true,show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "clip",
        duration: 1000
      }});
          }
 }
function verformularioni(){
	var randomnumber=Math.random()*11;
	$.post("nuevaimagen.php",{randomnumber:randomnumber}, 
	function(data){
	$("#nuevaimagen").html(data).slideDown("slow");
	});
}
function verlistadoimagenes(){
	var randomnumber=Math.random()*11;
	$.post("libs/listadoImagenes.php",{randomnumber:randomnumber},
	function(data){
	$("#listadoimagenes").html(data).slideDown("slow");
	});
}
function showselacto(){
	x=$("#bandeja").load('alta.php');
	}
function showbandeja(){
	x=$("#bandeja").load('bandeja.php');
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
//funcion que regresa los tipos de actos en un cuadro de dialogo
function editarav(idexp,tacto){
	$.ajax({
			async:true,
			type:"POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"php/vistaav.php",
			data:"tacto="+tacto+"&exp="+idexp,
			success:llegadaavdialog,
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
	var comp=$("#txtComp").val();
	if(comp!=""){
		var tcid=$("#tipocom").val();
		var name="compa"+tcid;
		var fila="fila"+(cont++);
		var $selectedOption = $("#tipocom").find('option:selected');
		var selectedLabel = $selectedOption.text();
		var compM=comp.toUpperCase();
		if(selectedLabel!="Tipo de Compareciente"){
			var cad="<tr role='row' id='"+fila+"'><style type='text/css'>#name"+cont+":hover{ background-color: #36648B;color: white;}</style><td class id='name"+cont+"' "+"onclick='copyname("+cont+")' id='comp"+fila+"'>"+compM+"</td><td class='tipe' id='tc"+fila+"'value="+tcid+" >"+selectedLabel+"</td><td class='del'><input  id ='btn"+fila+"' type='button' value='Eliminar' class='btneliminar' onclick='eliminarfila("+cont+")'></td></tr>";
			arr_nom_comp[cont]=compM;
			arr_tipo_comp[cont]=tcid;
			$("#cuerpotabla").append(cad);
			$("#txtComp").val('');
		}
		else{
			alert("Debe seleccionar primero el tipo de acto que se celebra")
		}
	}
	else{
		alert("Escriba un nombre de compareciente");
	}
	$("#txtComp").focus();
}
function copyname(dato){
	var nombre= document.getElementById("name"+dato);
	name=nombre.innerHTML;
	$("#Cnombre").val(nombre.innerHTML);
	$("#Ctel").focus();
}
function eliminarfila(fila){
	arr_nom_comp[fila]="null";
	arr_tipo_comp[fila]="null";
	$("#fila"+(fila-1)).remove();
}

function verformularionuevaimagen(){

}

	function inicioEnvio(){
		x.html('cargando...');
		}
	function problemas(){
		$("#bandeja").text('problemas en el servidor.');
	}
function guardarinst(){
	var id_t_ac=$("#cmbTipo").val();
	var id_ac_j=$("#acto").val();
	var instrumento=$("#instrumento").val();
	var volumen=$("#volumen").val();
	var fechac=$("#fechacel").val();
	var cadcomps="";
	var ncontacto=$("#Cnombre").val();
	var tcontacto=$("#Ctel").val();
	var mcontacto=$("#Cmail").val();
	var coment=$("#comentario").val();
	var gestor=$("#gestor").val();
	var i;
	for(i=1;i<=arr_tipo_comp.length;i++){
		if(typeof arr_tipo_comp[i]==="undefined"||arr_tipo_comp[i]==="null"){	
		}
		else{
			cadcomps+=arr_nom_comp[i]+"*"+arr_tipo_comp[i]+"*";
		}
	}
	if(instrumento!=""){
		if(volumen!=""){
			if(fechac!=""){
				if(tcontacto!=""){
					if(cadcomps!=""){
						if(ncontacto!=""){
							$.ajax({
									async:true,
									type:"POST",
									dataType: "html",
									contentType: "application/x-www-form-urlencoded",
									url:"php/insertins.php",
									data:"name="+name+"&gestor="+gestor+"&inst="+instrumento+"&vol="+volumen+"&idta="+id_t_ac+"&idaj="+id_ac_j+"&fechacel="+fechac+"&cadcomp="+cadcomps+"&nomcontacto="+ncontacto+"&telcontacto="+tcontacto+"&mailcontacto="+mcontacto+"&com="+coment,
									beforeSend: inicioEnvio,
									success:llegadainsert,
									timeout:4000,
									error:problemas
								});
							return false;
						}
						alert("Seleccione el Compareciente que será informado del avance del trámite");
					}
					else{
						alert("Necesita ingresar al menos un Compareciente");
						$("#txtComp").focus();
					}
				}
			}
		}
	}
}
function llegadainsert(datos){
	alert(datos);
	//$("#resultados").append(datos);
}
function problemas(){
	$("#segunda").text('problemas en el servidor.');
}
//cuando el usuario de click en el icono de lápiz esta funcion mostrará un cuadro de dialogo para actualizar un avance

function tips(){
	  $(function() {
    $( document ).tooltip({
      items: ".tdav, [data-geo]",
      content: function() {
        var element = $( this );
        if ( element.is( "[data-geo]" ) ) {
          var text = element.text();

          return "<img class='map' alt='" + text +
            "' src='http://maps.google.com/maps/api/staticmap?" +
            "zoom=11&size=350x350&maptype=terrain&sensor=false&center=" +
            text + "'>";
        }
        if ( element.is( "[title]" ) ) {
          return element.attr( "title" );
        }
        if ( element.is( ".tdav" ) ) {
          return element.attr( "alt" ); //esta es la seccion original
        }
      }
    });
  });
}
//aqui termina la funcion tips la llave anterior es la de cierre

function llegadaavdialog(datos){
	$("#selav").empty();
          	$("#selav").append(datos);
          	return $("#selav").dialog({
          	height: 300,
          	minheight:3000,
          	width: 300,
      		modal: true,
      		show: {
        	effect: "fold",
        	duration: 700,
      },
      hide: {
        effect: "fold",
        duration: 600
      }});
          }