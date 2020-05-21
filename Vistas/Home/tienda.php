<?php   
//GP  
require_once "../../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();

//AP
$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../../Vistas/Header/header.php';    
include '../../Vistas/Header/navbar-tienda.php';

//AP
require_once "../../Controladores/ProductosController.php";
$objecte = new ProductosController();
$Llistat = $objecte->LlistaProductoHome();

require_once "/Controladores/PedidosController.php";
$oobjecte2 = new PedidosController();
$fecha = date("Y-m-d");
$fecha = $objecte2->leeInfoPedido();

?>


<body>


    <?php  

    if (isset($_SESSION["login"])){
        if ($_SESSION["login"]==false){
            if (isset($_SESSION["mensajeLogin"])){
                echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
                echo $_SESSION["mensajeLogin"];
                echo "</h1>";
                echo "<a href='formLoginPrueba.php'>Loguearse</a>";
                echo "</div>";
            }
        }else{
            if (isset($_SESSION["Denegado"])){
                echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
                echo $_SESSION["Denegado"];
                echo "</h1>";
               // echo "<a href='formLoginPrueba.php'>Loguearse de nuevo</a>";
                echo "</div>";
            }
        }
    }
    
    if (isset($_SESSION["mensajeResultado"])){
        echo $_SESSION["mensajeResultado"];
    }
    ?>

<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>