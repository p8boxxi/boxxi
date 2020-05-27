<?php
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../Vistas/Header/header.php';    
?>
<body>

<section class="admin">
    <div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-12 text-center">
				<h4><b>Tu cuenta se ha creado</b></h4>
				<p>Ya puedes iniciar sesión con tus datos de acceso</p>
				<a class="btn btn-success" href="../index.php">Entendido</a>
			</div>
		</div>
	</div>
</section>

<?php include '../Vistas/Footer/footer.php'; ?>
</body>

</html>