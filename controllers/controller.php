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
public function registroUsuariosController(){
        if(isset($_POST["usuarioRegistro"])){
        	//se mandan los datos obtenidos por POST desde registrarUsuario.php
        $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                    "nombre"=>$_POST["nombreRegistro"],
                                    "a_paterno"=>$_POST["a_paternoRegistro"],
                                    "a_materno"=>$_POST["a_maternoRegistro"],
                                	"password"=>$_POST["passwordRegistro"]);

                //Enviamos los parametros al Modelo para que procese el registro
                $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

                //Recibir la respuesta del modelo para saber que sucedios (success o error)
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }
                else{
                	//si no recibe nada como respuesta o si marca algun error redirecciona al index
                    header("location:index.php");
                }
            }
	}






	//FUNCION PARA EL REGISTRO DE LOS LIBROS
public function registroLibrosController(){
	//si esta recibiendo algo en isbnRegistro en POST entra a la condicion
        if(isset($_POST["isbnRegistro"])){
        	echo "hola";
        	//guarda en un array los datos recibidos por POST ,ISBN, TITULO DEL LIBRO, AUTOR, LA EDITORIAL A LA QUE PERTENECE, LA EDICION DEL LIBRO Y EL AÑO DE SU PUBLICACION
        $datosController = array("isbn"=>$_POST["isbnRegistro"],
        	"titulo"=>$_POST["tituloRegistro"],
        	"autor"=>$_POST["autorRegistro"],
        	"editorial"=>$_POST["editorialRegistro"],
        	"edicion"=>$_POST['edicionRegistro'],
        	"year"=>$_POST["yearRegistro"]);
                //Enviamos los parametros al Modelo para que procese el registro
                $respuesta = Datos::registroLibroModel($datosController,"libros");

                //Recibir la respuesta del modelo para saber que sucedios (success o error)
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }
                else{
                    header("location:index.php");
                }
            }
	}


//FUNCION PARA EL LOGIN DE LOS USUARIOS PARA PODER ACCESAR A CUALQUIER PARTE DEL SISTEMA
	public function ingresoUsuariosController(){
		if(isset($_POST["usuarioIngreso"])){
			//se obtienen los datos ingresados en el form del login
			$datosController=array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);

			//se envia el array con los datos del formulario y el nombre de la tabla al modelo de ingresoUsuariosModel
			$respuesta=Datos::ingresoUsuariosModel($datosController,"usuarios");

			//condicion que verifica si los datos obtenidos en el modelo coinciden con los datos que fueron ingresados e el form si estos coinciden se inicia una sesion y posteriormente se crea una variable de sesion que servira para verificar si hay una sesion activa
			if($respuesta["users"]==$_POST["usuarioIngreso"] && $respuesta["password"]==$_POST["passwordIngreso"]){
				session_start();
				$_SESSION["validar"]=true;
				//se le da un valor al action para que redireccione a libros.php
				header("location:index.php?action=libros");
			}else{
				//si la condicion es falsa entonces le da el valor de fallo al action y esto redirecciona otra vez al login
				header("location:index.php?action=fallo");
			}
		}
	}





	public function vistaLibrosController(){
		//envio al modelo la variable de control y la tabla a donde se hara la consulta
		$respuesta=Datos::vistaLibrosModel("libros");

		foreach ($respuesta as $row => $item) {
			//elementos con los datos de los libros que se mostraran en la tabla de libros en libros.php
			echo '<tr>
				<td>'.$item["isbn"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["autor"].'</td>
				<td>'.$item["editorial"].'</td>
				<td>'.$item["edicion"].'</td>
				<td>'.$item["year"].'</td>

				<td><a href="index.php?action=editarLibro&id='.$item["id"].'"><button class="btn btn-primary">Editar</button>
				<a href="index.php?action=libros&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></td>
				</tr>';

				//al final estan los botones editar y borrar ambos mandan el id del libro por el metodo get el cual es recibido en editarLibrosController y en borrarLibrosController
	}
}




	//metodo editar usuarios
public function editarLibrosController(){
	//solicitar el id del usuario editar con get
	$datosController=$_GET['id'];
	//enviamos al modelo el id para hacer la consulta y obtener sus datos
	$respuesta = Datos::editarLibrosModel($datosController,"libros");

		//recibimos respuesta del modelo e imprimimos un form para editar
	echo "
		<input type='hidden' value=".$respuesta['id']." name='idEditar'>

		<input type='text' value=".$respuesta['isbn']." name='isbnEditar' required>

		<input type='text' value=".$respuesta['nombre']." name='nombreEditar' required>


		<input type='text' value=".$respuesta['autor']." name='autorEditar' required>


		<input type='text' value=".$respuesta['editorial']." name='editorialEditar' required>


		<input type='text' value=".$respuesta['edicion']." name='edicionEditar' required>


		<input type='text' value=".$respuesta['año']." name='añoEditar' required>";
}






	//FUNCION QUE ACTUALIZA LOS LIBROS
	//PROFE YA SE POR QUE NO ME SALIA LO DE EDITAR, NO ESTABA MANDANDO A LLAMAR ESTA FUNCION EN editarLibro.php
	//TODO SONSO EL WERCO  COMO VE xd
	public function actualizarLibrosController(){
		if(isset($_POST['isbnEditar'])){
			//se guardan los valores obtenidos de editarLibro.php
			$datosController=array("id"=>$_POST["idEditar"],"isbn"=>$_POST["isbnEditar"],"titulo"=>$_POST["nombreEditar"],"autor"=>$_POST["autorEditar"],
        "editorial"=>$_POST["editorialEditar"],"edicion"=>$_POST['edicionEditar'],"year"=>$_POST["añoEditar"]);

			//se manda el array y el nombre de la tabla
			$respuesta=Datos::actualizarLibrosModel($datosController,"libros");

			//recivimos respuesta del modelo para saber si se hiso el update o no
			if($respuesta=="success"){
				header("location:index.php?action=cambio");
			}else{
				echo "error";
			}
		}
	}







//FUNCION PARA BORRAR LOS LIBROS
	public function borrarLibrosController(){
		//si recibe el id por get entonces lo guarda en un array el cual se envia a borrarLibrosModel para poder ejecutar el delete en la base de datos
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