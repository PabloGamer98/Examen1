<!DOCTYPE html>
<html>
<head>
	<title>Examen 1</title>
    <!-- se importa bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<style>
        body{
            padding: 0;
            margin: 0;
        }
		header{
			position:relative;
			margin:auto;
			text-align:center;
			padding:5px;	
            }
            
            nav{
                position:relative;
                margin:auto;
                width:100%;
                height:auto;
                background:#f50057;
            }

            nav ul{
                position:relative;
                margin:auto;
                width:100%;
                text-align: center;
            }

            nav ul li{
                display:inline-block;
                width:10%;
                line-height: 50px;
                list-style: none;
            }

            nav ul li a{
                color:white;
                margin-left: -17%;
                text-decoration: none;
            }

            nav ul li a:hover{
                color:white;
                text-decoration: none;
                font-size: 22px;
            }

            section{
                position:relative;
                padding:20px;
            }

            /*--  id del separador que se encuentra como label en navegacion.php  ---*/
            #sep{
                font-size: 30px;
                color:white;
            }

            h1{
                font-size: 50px;
            }
	</style>

</head>
<body>


	<header>
		<h1>BIENVENIDOS AL EXAMEN 1</h1>
	</header>

	<?php  
		//incluir el menu de navegacion
		include "navegacion.php";
	?>

	<section>
		<!-- contenedor donde se muestran las opciones del sistema-->

		<?php  
			//mostrar opciones
			$mvc = new MvcController();
			$mvc->enlacesPaginasController();
		?>
	</section>

	
</body>
</html>