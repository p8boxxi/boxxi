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
            
        <?php include '../../Vistas/Header/nav-cuenta-admin.php';?>
        
            <div class="col-md-9 content">
                
                <div class="row">


                </div>

            </div>
        </div>
        
    </div>
</section>



    
<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>