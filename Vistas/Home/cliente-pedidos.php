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

                    <h2 class="col-12">Pedidos realizados</h2>

                    <?php
                    include '../../Controladores/PedidosController.php'; 
                    $objecte = new PedidosController();
                    $objecte->pedidosCliente();
                    ?>
                    
                </div>

            </div>
        </div>
        
    </div>
</section>



    
<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>