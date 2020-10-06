<?php  
	//modelo que permite mostrar el enlace de las paginas con las vistas
require_once "conexion.php";
class Datos extends Conexion{



	//metodo para mostrar los datos de los libros (TABLA)
	public function vistaLibrosModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		//retornamos el fetch que es el que obtiene una fila o posicion de un array
		return $stmt->fetchAll();
		//cerramos pdo
		$stmt->close();
	}



//metodo para poder loggearse
	public function ingresoUsuariosModel($datosModel,$tabla){
		//preparamos el pdo
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  users = :usuario");
		//Recibimos el valor desde el array
		$stmt->bindParam(":usuario", $datosModel["usuario"],PDO::PARAM_STR);
		$stmt->execute();

		//retornamos el fetch que es el que obtiene una fila o posicion de un array
		return $stmt->fetch();
		//cerramos pdo
		$stmt->close();
	}


//funcion para registrar un usuario para poder loguearse al sitio	
	public function registroUsuarioModel($datosModel,$tabla){
		//se prepara el insert a la tabla de usuarios
		$stmt=conexion::conectar()->prepare("INSERT INTO $tabla(users,nombre,apellido_paterno,apellido_materno,password) VALUES(:usuario,:nombre,:a_paterno,:a_materno,:password)");

		//se bindean las variables que contienen los datos que seran almacenados en la tabla usuarios
		$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":a_paterno",$datosModel["a_paterno"],PDO::PARAM_STR);
		$stmt->bindParam(":a_materno",$datosModel["a_materno"],PDO::PARAM_STR);
		$stmt->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}else{
			return "error";
		}
		//cerrar las funciones de las sentencia de pdo
		$stmt->close();


	}



//MODELO PARA REGISTRAR UN LIBRO
	public function registroLibroModel($datosModel,$tabla){

		$stmt=conexion::conectar()->prepare("INSERT INTO $tabla(isbn,nombre,autor,editorial,edicion,year) VALUES(:isbn,:titulo,:autor,:editorial,:edicion,:year)");
		//se bindean todos los datos que seran registrados en la  tabla libros
		$stmt->bindParam(":isbn",$datosModel["isbn"],PDO::PARAM_STR);
		$stmt->bindParam(":titulo",$datosModel["titulo"],PDO::PARAM_STR);
		$stmt->bindParam(":autor",$datosModel["autor"],PDO::PARAM_STR);
		$stmt->bindParam(":editorial",$datosModel["editorial"],PDO::PARAM_STR);
		$stmt->bindParam(":edicion",$datosModel["edicion"],PDO::PARAM_STR);
		$stmt->bindParam(":year",$datosModel["year"],PDO::PARAM_INT);
		if ($stmt->execute()) {
			return "success";
		}else{
			return "error";
		}
		//cerrar las funciones de las sentencia de pdo
		$stmt->close();


	}



	//metodo para editar usuarios
	public function editarLibrosModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id");
		$stmt->bindParam(":id", $datosModel,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}



//metodo para actualizar usuarios
	public function actualizarLibrosModel($datosModel,$tabla)
	{
		//preparar el query
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET isbn=:isbn, nombre=:titulo, autor=:autor, editorial=:editorial, edicion=:edicion, year=:year WHERE id=:id");
		//ejecutar el query
		$stmt->bindParam(":isbn",$datosModel["isbn"],PDO::PARAM_STR);
		$stmt->bindParam(":titulo",$datosModel["titulo"],PDO::PARAM_STR);
		$stmt->bindParam(":autor",$datosModel["autor"],PDO::PARAM_STR);
		$stmt->bindParam(":editorial",$datosModel["editorial"],PDO::PARAM_STR);
		$stmt->bindParam(":edicion",$datosModel["edicion"],PDO::PARAM_STR);
		$stmt->bindParam(":year",$datosModel["year"],PDO::PARAM_INT);
		$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_STR);
		
		//preparar respuesta
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		//cerrar la conexion pdo
		$stmt->close();
	}











//borrar usuarios
	public function borrarLibrosModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id",$datosModel,PDO::PARAM_STR);
	
		if($stmt->execute()){
			return "succes";
		}else{
			return "error";
		}
		//cerrar la conexion pdo
		$stmt->close();

	}





}
?>