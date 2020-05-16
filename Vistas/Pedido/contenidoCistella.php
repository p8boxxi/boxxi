<?php    
/***  ENCABEZADO */

$title = 'Tienda'; 
$currentPage = 'Tienda'; 
if (file_exists('../Vistas/Header/header.php')){ include '../Vistas/Header/header.php';}
if (file_exists('../Header/header.php')){ include '../Header/header.php';}
if (file_exists('../Vistas/Header/navbar-tienda.php')){ include '../Vistas/Header/navbar-tienda.php';}
if (file_exists('../Header/navbar-tienda.php')){ include '../Header/navbar-tienda.php';}

//GP
if (file_exists('../Controladores/SesionesController.php')){ require_once '../Controladores/SesionesController.php';}
if (file_exists('../../Controladores/SesionesController.php')){ require_once '../../Controladores/SesionesController.php';}
$objecteSessio = new SesionesController();


if (file_exists('../Controladores/ProductosController.php')){ require_once '../Controladores/ProductosController.php';}
if (file_exists('/Controladores/ProductosController.php')){ require_once '/Controladores/ProductosController.php';}


if (!isset($_SESSION["cistella"])){
    $_SESSION["cistella"] = new Cistella();
}
// require_once "../Controladores/CategoriasController.php";
// $cat = new CategoriasController();

    //require '';
?>

<div class="container"> 
    <?php 


    
    echo "<br>";

    if (isset($_SESSION["cistella"])){
        echo "<<<<<<   PEDIDO   >>>>>>><br><br>";
        echo "<table border=1><th>ID</th><th>NOMBRE</th><th>PRECIO</th><th>CANTIDAD</th>";
        $valorCistella = $_SESSION["cistella"]->mostraProductesCistella();
        
        $vectorAux = array();
        $vector = array();
        if ($valorCistella!=null){
            for ($i=0;$i<count($valorCistella["idProducte"]);$i++){
                $cantidad = $valorCistella["quantitatProducte"][$i];

                $objecteProducte = new ProductosController();
                $infoProducte= $objecteProducte->retornaInfoProducto($valorCistella["idProducte"][$i]);

                foreach ($infoProducte as $informacioProducte){
                    echo "<tr>";
                    echo "<td>".$informacioProducte->id_producto."</td><td>".$informacioProducte->nombre."</td><td>".$informacioProducte->precio."</td>";
                    array_push($vectorAux, $informacioProducte->id_producto, $informacioProducte->nombre, $informacioProducte->precio);
                }
                echo "<td>".$cantidad."</td></tr>"; 
                array_push($vectorAux, $cantidad);
            }
            //array_push($vectorCistella, $vectorAux);

            echo "</table>";
            echo "<br>";
            echo " <a href='../../Controladores/PedidosController.php?accio=creaPedido'>FINALIZAR COMPRA</a>";
        }
        $_SESSION["carro"]=$vectorAux;
    }
    ?>

</div>

<?php include '../Vistas/Footer/footer.php'; ?>