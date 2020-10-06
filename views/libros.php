<?php
session_start();
//si no hay una sesion iniciada se redirecciona a la vista ingresar
  if(!$_SESSION['validar']){
    header('location:index.php?action=ingresar');
    exit();
  }
?>


<h1>LIBROS</h1>

<table  class="table">
  <thead style="color: white; border-radius: 5px; background-color:#f50057;">
    <tr>
      <th scope="col">ISBN</th>
      <th scope="col">TITULO</th>
      <th scope="col">AUTOR</th>
      <th scope="col">EDITORIAL</th>
      <th scope="col">EDICION</th>
      <th scope="col">AÑO</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
          <?php 
          //se manda a llmar la vista de los libros que sera la que mostrara los datos almacenados en la base de datos en la tabla libros
      $vistaLibros= new MvcController();
      $vistaLibros->vistaLibrosController();
      $vistaLibros->borrarLibrosController();
      
     ?>
    </tr>
  </tbody>
</table>




<?php 
  if(isset($_GET['action'])){
    if($_GET['action']=="cambio"){
      echo "Cambio exitoso";
    }
  }
 ?>