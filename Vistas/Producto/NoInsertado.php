<?php    
/***  ENCABEZADO */
if (file_exists('../../Controladores/SesionesController.php')){ require_once '../../Controladores/SesionesController.php';}
$objecteSessio = new SesionesController();

$title = 'Tienda-compra'; 
$currentPage = 'Tienda-compra'; 
if (file_exists('../Vistas/Header/header.php')){ include '../Vistas/Header/header.php';}
if (file_exists('../Header/header.php')){ include '../Header/header.php';}

?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php

if (file_exists('../Vistas/Header/navbar-tienda.php')){ include '../Vistas/Header/navbar-tienda.php';}
if (file_exists('../Header/navbar-tienda.php')){ include '../Header/navbar-tienda.php';}

if (file_exists('../Controladores/SesionesController.php')){ require_once '../Controladores/SesionesController.php';}

if (file_exists('../../Controladores/ProductosController.php')){ require_once '../../Controladores/ProductosController.php';}
if (file_exists('../Controladores/ProductosController.php')){ require_once '../Controladores/ProductosController.php';}
if (file_exists('/Controladores/ProductosController.php')){ require_once '/Controladores/ProductosController.php';}


if (!isset($_SESSION["cistella"])){
	$_SESSION["cistella"] = new Cistella();
}

?>

<?php  

if (isset($_SESSION["login"])){
	if ($_SESSION["login"]==false){
		if (isset($_SESSION["mensajeLogin"])){
                // AZ
			echo "<div class='modal fade' id='wrongModal1' tabindex='-1' role='dialog' aria-labelledby='wrongModal' aria-hidden='true'>";
			echo "<div class='modal-dialog' role='document'>";
			echo "<div class='modal-content p-4 text-center'>";
			echo "<a class='close' data-dismiss='modal'>×</a>";
			echo "<p class='m-0'><b>".$_SESSION["mensajeLogin"]."</b></p>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "<script>$('#wrongModal1').modal('show');</script>";
			unset($_SESSION["mensajeLogin"]);
		}
	}else{
		if (isset($_SESSION["Denegado"])){
            // AZ
			echo "<div class='modal fade' id='wrongModal2' tabindex='-1' role='dialog' aria-labelledby='wrongModal' aria-hidden='true'>";
			echo "<div class='modal-dialog' role='document'>";
			echo "<div class='modal-content p-4 text-center'>";
			echo "<a class='close' data-dismiss='modal'>×</a>";
			echo "<p class='m-0'><b>".$_SESSION["Denegado"]."</b></p>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "<script>$('#wrongModal2).modal('show');</script>";
			unset($_SESSION["Denegado"]);
		}
	}
}

if (isset($_SESSION["mensajeResultado"])){
	echo $_SESSION["mensajeResultado"];
	unset($_SESSION["mensajeResultado"]);
}
?>




<body>
	<div class="container det"> 

		<div class="row tab-cesta">


			<table class="table">


				<thead>
					<tr>
						<th class="text-center">Ha ocurrido un error</th>
					</tr>
				</thead>




			</table>
		</div>


		<div class="row botonera">
			<div class="col-12 botones text-center " >
				<div class="text-center boto">

					<a class="bt-sec" href='../../Vistas/Home/tienda.php'>volver a la tienda</a>

				</div>

			</div>

		</div>


	</div>



	<!-- Modal registrado -->
	<div class="modal fade" id="myModal-comprar" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog">

			<div class="modal-content p-4 text-center">
				<div class="modal-header">
					<h4 class="modal-title">Aviso</h4>
				</div>

				<div class="modal-body">
					<p>Inicia sesión o registrate para continuar.</p>
				</div>

				<a type="button" class="link"  data-toggle="modal" data-dismiss="modal" data-target="#loginModal">Acceso de usuarios</a>
				<a class="link" href="../../Vistas/Home/cliente-registro.php">Registrarse</a>

				<div class="modal-footer">                
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>

			</div>

		</div>

	</div>
	<!-- FIN Modal registrado -->

	<?php 
	if (file_exists('../Vistas/Footer/footer.php')){ include '../Vistas/Footer/footer.php';}
	if (file_exists('../Footer/footer.php')){ include '../Footer/footer.php';}
	?>

</body>
</html>
