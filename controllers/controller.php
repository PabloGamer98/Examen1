<?php  
class MvcController{

	//invocar a la plantilla template
	public function plantilla(){
		include "views/plantilla.php";
	}

	//mostrar los nlaces de la pagina
	public function enlacesPaginasController(){
		if (isset($_GET['action'])) {
			$enlaces=$_GET['action'];
		}else{
			$enlaces="index";
		}
		$respuesta=Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}





	//metodo para registro de usuarios
public function registroLibrosController(){
        if(isset($_POST["librosRegistro"])){
        $datosController = array("nombre"=>$_POST["nombreRegistro"],"autor"=>$_POST["autorRegistro"],
        "editorial"=>$_POST["editorialRegistro"],"edicion"=>$_POST['edicionRegistro'],"año"=>$_POST["añoRegistro"]);
                //Enviamos los parametros al Modelo para que procese el registro
                $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

                //Recibir la respuesta del modelo para saber que sucedios (success o error)

                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }
                else{
                    header("location:index.php");
                }
            }
	}



	public function ingresoUsuariosController(){
		if(isset($_POST["usuarioIngreso"])){
			$datosController=array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);

			$respuesta=Datos::ingresoUsuariosModel($datosController,"usuarios");

			if($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]==$_POST["passwordIngreso"]){
				session_start();
				$_SESSION["validar"]=true;

				header("location:index.php?action=usuarios");
			}else{
				header("location:index.php?action=fallo");
			}
		}
	}





	public function vistaLibrosController(){
		//envio al modelo la variable de control y la tabla a donde se hara la consulta
		$respuesta=Datos::vistaLibrosModel("libros");

		foreach ($respuesta as $row => $item) {
			echo '<tr>
				<td>'.$item["isbn"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["autor"].'</td>
				<td>'.$item["editorial"].'</td>
				<td>'.$item["edicion"].'</td>
				<td>'.$item["año"].'</td>

				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button>
				<a href="index.php?action=libros&idBorrar='.$item["id"].'"><button>Borrar</button></td>
				</tr>';
	}
}




	//metodo editar usuarios
public function editarLibrosController(){
	//solicitar el id del usuario editar con get
	$datosController=$_GET['id'];
	//enviamos al modelo el id para hacer la consulta y obtener sus datos
	$respuesta = Datos::editarLibrosController($datosController,"usuarios");

		//recibimos respuesta del modelo e imprimimos un form para editar
	echo "
		<input type='hidden' value=".$respuesta['id']." name='idEditar'>

		<input type='text' value=".$respuesta['isbn']." name='isbnEditar' required>

		<input type='text' value=".$respuesta['nombre']." name='nombreEditar' required>


		<input type='text' value=".$respuesta['autor']." name='autorEditar' required>


		<input type='text' value=".$respuesta['editorial']." name='editorialEditar' required>


		<input type='text' value=".$respuesta['edicion']." name='edicionEditar' required>


		<input type='text' value=".$respuesta['año']." name='añoEditar' required>

		<input type='submit' value='Actualizar'>";
}






	//metodo para actualizar usuario
	public function actualizarLibrosController(){
		if(isset($_POST['nombreEditar'])){
			//preparamos un array con los id del form del controlador anterior para ejecutar la actualizacion de un modelo

			$datosController=array("id"=>$_POST["idEditar"],"nombre"=>$_POST["nombreEditar"],"autor"=>$_POST["autorEditar"],
        "editorial"=>$_POST["editorialEditar"],"edicion"=>$_POST['edicionEditar'],"año"=>$_POST["añoEditar"]);

			//en viar el array al modelo que generara el update
			$respuesta=Datos::actualizarUsuariosModel($datosController,"libros");

			//recivimos respuesta del modelo para saber si se hiso el update o no

			if($respuesta=="success"){
				header("location:index.php?action=cambio");
			}else{
				echo "error";
			}
		}
	}












//borrado de usuario

	public function borrarLibrosController(){
		if(isset($_GET['idBorrar'])){
			$datosController=$_GET['idBorrar'];
			//mandar id al controlador para que ejecute el delete
			$respuesta=Datos::borrarLibrosModel($datosController,"libros");

			//recibimos la respuesta del modelo
			if($respuesta=="success"){
				header("location:index.php?action=libros");
			}
		}
	}







}
?>