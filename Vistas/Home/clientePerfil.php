<?php
require_once "../../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();

$title = 'Tienda'; 
$currentPage = 'Tienda';
include '../../Vistas/Header/header.php';    
?>

<body>

<section>
    <div class="container">
        
        <h2>Datos personales</h2>

        <?php
        include '../../Controladores/ClientesController.php'; 
        $objecte = new ClientesController();
        $objecte->infoCliente();
        ?>
        
        <a href="#" class="btn btn-success">Modificar mis datos</a>
        <br>
        <br>
        
    </div>
</section>




   


    
<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>