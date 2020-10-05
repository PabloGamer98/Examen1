<?php  

class Conexion{
	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=examen1",'root','');
		return $link;
	}
}

?>