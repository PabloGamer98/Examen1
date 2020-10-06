<?php  
session_start();
  if(!$_SESSION['validar']){
    header('location:index.php?action=ingresar');
    exit();
  }

  $actualizar= new MvcController();
  $actualizar->actualizarLibrosController();

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

#editBtn {
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

#cancelBtn {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #9e9e9e;
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
  </style>
  <title></title>
</head>
<body>
  <div class="login-page">
    <div class="form">
      <h2 style="margin-top: -4%;">Editar de Libro</h2>
      <form method="POST" class="login-form">

        <?php  
          $editar= new MvcController();
          $editar->editarLibrosController();
        ?>

        <button type="submit" id="editBtn">Editar</button><br><br>
      </form>
        <button id="cancelBtn" class="btn btn-secondary btn-lg" onclick="location.href='index.php?action=libros'">Cancelar</button>
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