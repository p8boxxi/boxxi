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

			<h2>Compra realizada!</h2>
			<p> Tu compra se ha realizado con exito, comprueba tu email para obtener todos los detalles del pedido. Te informaremos cuando el pedido salga de nuestras instalaciones.
			</p>
			<h5>¡GRACIAS POR CONFIAR EN BOXXI!	</h5>
		</div>

		<div class="nav-botones">
			

				<div class="confirmar boton-buy ">
					<a href="/Vistas/Home/cliente-pedidos.php"><input class="bt-confirmar" type="submit" value="Ver pedidos"/></a>
					<a href="/Vistas/Home/tienda.php"><input class="bt-confirmar" type="submit" value="Seguir comprando"/></a>
				</div>

		</div>
	</div>


</body>



<?php 
/***  PIE */
include '../Vistas/Footer/footer.php'; 

?>