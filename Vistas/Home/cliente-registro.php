<?php
require_once "../../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../../Vistas/Header/header.php';    
?>

<body>

<section class="admin">
    <div class="container">
        
        <form class="text-center mt-5 mb-5" action="../../Controladores/ClientesController.php" method="POST">
        <div class="row">
            <h4 class="col-12 mb-3 fw-600">Nuevo cliente</h4>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="email" name="email" required="required">
                    <label for="email" class="label">Tu e-mail</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="password" name="password" required="required">
                    <label for="password" class="label">Contraseña</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="nombre" name="nombre" required="required">
                    <label for="nombre" class="label">Nombre</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="apellidos" name="apellidos" required="required">
                    <label for="apellidos" class="label">Apellidos</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="telefono" name="telefono" required="required">
                    <label for="telefono" class="label">Teléfono</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="direccion" name="direccion" required="required">
                    <label for="direccion" class="label">Dirección</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <a href="index.php" class="btn btn-light">Cancelar</a>
                <input type="hidden" name="operacio" value="inserta">
                <input type="submit" class="btn btn-success" value="Registrarme">
            </div>
        </div>
        </form>

    </div>
</section>

<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>