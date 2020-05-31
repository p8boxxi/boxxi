<?php    
/***  ENCABEZADO */

$title = 'Tienda-compra'; 
$currentPage = 'Tienda-compra'; 

if (file_exists('../Vistas/Header/header.php')){ include '../Vistas/Header/header.php';}
if (file_exists('../Header/header.php')){ include '../Header/header.php';}
if (file_exists('../Vistas/Header/navbar-tienda.php')){ include '../Vistas/Header/navbar-tienda.php';}
if (file_exists('../Header/navbar-tienda.php')){ include '../Header/navbar-tienda.php';}

//GP
if (file_exists('../Controladores/SesionesController.php')){ require_once '../Controladores/SesionesController.php';}
if (file_exists('../../Controladores/SesionesController.php')){ require_once '../../Controladores/SesionesController.php';}
$objecteSessio = new SesionesController();


if (file_exists('../Controladores/ProductosController.php')){ require_once '../Controladores/ProductosController.php';}
if (file_exists('/Controladores/ProductosController.php')){ require_once '/Controladores/ProductosController.php';}

// require_once "../Controladores/CategoriasController.php";
// $cat = new CategoriasController();

    //require '';
?>	
<body>
	
	<div class="container cesta-fin"> 
		<div class="cont-finalizado">

			<h1>Compra realizada!</h1>
			<p> Tu compra se ha realizado con exito, comprueba tu email para obtener todos los detalles del pedido. Te informaremos cuando el pedido salga de nuestras instalaciones.
			</p>
			<h5>¡GRACIAS POR CONFIAR EN BOXXI!	</h5>
		</div>

		<div class="nav-botones">
			

				<div class="confirmar boton-buy ">
					<a href="/Vistas/Home/cliente-pedidos.php"><input class="bt-pri" type="submit" value="Ver pedidos"/></a>
					<a href="/Vistas/Home/tienda.php"><input class="bt-pri" type="submit" value="Seguir comprando"/></a>
				</div>

		</div>
	</div>


</body>



<?php 
/***  PIE */
if (file_exists('../Vistas/Footer/footer.php')){ include '../Vistas/Footer/footer.php';}
if (file_exists('../Footer/footer.php')){ include '../Footer/footer.php';}

?>