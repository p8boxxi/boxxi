<?php    
/***  ENCABEZADO */

$title = 'Tienda'; 
$currentPage = 'Tienda'; 
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
if (!isset($_SESSION["cistella"])){
	$_SESSION["cistella"] = new Cistella();
}
// require_once "../Controladores/CategoriasController.php";
// $cat = new CategoriasController();

    //require '';
?>	
<body>
	
	<div class="container cesta-det"> 
		<h2>Compra realizada!</h2>
	</div>


</body>



<?php 
/***  PIE */
include '../Vistas/Footer/footer.php'; 

?>