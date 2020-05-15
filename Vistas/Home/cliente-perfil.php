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
        <div class="row">
            
        <?php include '../../Vistas/Header/nav-cuenta-cliente.php';?>
        
            <div class="col-md-9 content">
                
                <div class="row">

                    <h2 class="col-12">Datos personales</h2>
                    <?php
                    include '../../Controladores/ClientesController.php'; 
                    $objecte = new ClientesController();
                    $objecte->infoCliente();
                    ?>
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Modificar mis datos</a>
                    </div>
                    
                
                </div>

            </div>
        </div>
        
    </div>
</section>




   


    
<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>