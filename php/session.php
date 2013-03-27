<?php
	iniciarsesion();
	//funcion que valida si el usuario se ha logueado, si no lo reenvia al index para que lo haga.
	function iniciarsesion(){
		if(isset($_SESSION['valido'])){
			if($_SESSION['valido']=="valido")
			{
					
			}
			}
		else
			header("location:index.php");
	
	}
	//funcion para cerrar la sesion del usuario y reenviarlo a el indexprincipal
	function cerrarsesion(){
			session_destroy();
			header("location:index.php");		
	}
//funcion que revisa el tipo de sesion que inicio el usuario
	function iniciarsesionadmin(){
		if(isset($_SESSION['valido'])){
			if($_SESSION['valido']=="valido")
			{
					if($_SESSION['tipo']==0){
						return false;
					}
					else{
						return true;
					}
			}
			}
		else
			header("location:../../index.php");
	}
?>