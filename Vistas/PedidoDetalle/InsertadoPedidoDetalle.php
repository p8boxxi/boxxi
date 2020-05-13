<?php 
//copia de insertado

$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../Vistas/Header/header.php';    
include '../Vistas/Header/navbar-tienda.php';  


require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();


?>


<h1 style="color: green;">>> Pedido_Detalle Creado << </h1>
<div class="container"> 
<div class ="container-final">
	
</div>
</div>






<?php include '../Vistas/Footer/footer.php'; ?>

</body>

</html>