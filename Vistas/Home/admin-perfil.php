<?php    
    //GP
    require_once "../../Controladores/SesionesController.php";
    $objecteSessio = new SesionesController();

    
    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de modificar la Categoria!!";
            header ("location: ../../index.php");
        }
    }

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

                    <h2 class="col-12">Datos personales</h2>
                    <?php
                    include '../../Controladores/AdministradoresController.php'; 
                    $objecte = new AdministradoresController();
                    $objecte->infoAdministrador();
                    ?>
                    <div class="col-12">
                        <a href="admin-modificar.php" class="btn btn-secondary">Modificar mis datos</a>
                    </div>
                    
                
                </div>

            </div>
        </div>
        
    </div>
</section>

<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>