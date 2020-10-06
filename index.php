<?php  

//invoca al controlador y modelo solicitado

require_once "controllers/controller.php";
require_once "models/model.php";
require_once "models/enlaces.php";

//se crea un nuevo controlador llamando a la plantilla que se mostrara al usuario
$mvc = new MvcController();
$mvc->plantilla();



?>