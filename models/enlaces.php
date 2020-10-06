<?php 
class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces=="registrarUsuario" || $enlaces == "libros" || $enlaces == "editarLibro" || $enlaces=="registrarLibro" || $enlaces == "salir"){
			$module =  "views/".$enlaces.".php";
		}else if($enlaces == "index"){
			$module =  "views/ingresar.php";
		}
		///
		else if($enlaces == "ok"){
			$module =  "views/ingresar.php";
		}

		else if($enlaces == "fallo"){
			$module =  "views/ingresar.php";	
		}

		else if($enlaces == "cambio"){
			$module =  "views/libros.php";		
		}
		else{
			$module =  "views/ingresar.php";
		}
		
		return $module;
	}

}

?>