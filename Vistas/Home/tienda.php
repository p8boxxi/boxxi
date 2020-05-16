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

require_once "../Controladores/PedidosController.php";
$oobjecte2 = new PedidosController();
$fecha = date("Y-m-d");
$fecha = $objecte2->leeInfoPedido();


//include 'Vistas/Producto/verProducto.php';   <----  NO, perquè ja el crida el CONTROLADOR (la funcio LlistaProductoConFotos())
      




//*********************************************************************************************************************************** */
//  CANVIS FETS:
//      - tienda.php:    
//          linies 14 a 16 ==> per cridar al CONTROLADOR que passi el resultat a la variable $Llistat a la vista d'ara
//
//      - productosController.php:    
//            modificació de rutes ==>    com que s'ha canviat el "punt de partida" (de com era a l'exemple index.php), 
//                                      s'haurien de canviar les RUTES als diferents fitxers!!
//
//      - ha calgut fer que el fitxer de SesionesController vigili si hi ha "sessió activa" (el tenia en una altra versió meva). Ja està
/************************************************************************************************************************************** */


?>


<body>


    <?php  

    


    //GP
    // if(!empty($_SESSION["id_usuario"])){
    //             echo "eres el usuario con ID: ".$_SESSION["id_usuario"];
    //             echo "<br>";
    //             echo "eres ".$_SESSION["rol"];
    // }  

    

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
    
    //var_dump($_SESSION);

    // echo "<br>";
    // echo "<a href='Controladores/SesionesController.php?operacion=cerrarSesion'>Salir de  La Sesion</a>";

    ?>



    
<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>