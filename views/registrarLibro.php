<?php  
session_start();
  if(!$_SESSION['validar']){
    header('location:index.php?action=ingresar');
    exit();
  }

  $registro= new MvcController();
  $registro->registroLibrosController();

?>

<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #f50057;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  border-radius: 6px;
}
.form button:hover,.form button:active,.form button:focus {
  background: #ff4081 ;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
  </style>
  <title></title>
</head>
<body>
  <div class="login-page">
    <div class="form">
      <h2 style="margin-top: -4%;">Registro de Libro</h2>
      <form method="POST" class="login-form">
        <input required type="text" placeholder="ISBN" name="isbnRegistro" maxlength="10" minlength="10" />
        <input required type="text" placeholder="Titulo del libro" name="tituloRegistro" />
        <input required type="text" placeholder="Autor del libro" name="autorRegistro" />
        <input required type="text" placeholder="Editorial del libro" name="editorialRegistro" />
        <input required type="text" placeholder="Edicion del libre" name="edicionRegistro" />
        <input required type="number" placeholder="Año de publicacion" name="añoRegistro" min="1900" max="2100" maxlength="4" minlength="4" />
        <button type="submit">Registrar</button>
      </form>
    </div>
  </div>
</body>
</html>

<?php
  //verificar la url correcta
  if(isset($_GET['action'])){
    if($_GET['action']=="fallo"){
      echo "Fallo al ingresar";
    }
  }


?>