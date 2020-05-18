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

if (file_exists('../../Controladores/ProductosController.php')){ require_once '../../Controladores/ProductosController.php';}
if (file_exists('../Controladores/ProductosController.php')){ require_once '../Controladores/ProductosController.php';}
if (file_exists('/Controladores/ProductosController.php')){ require_once '/Controladores/ProductosController.php';}


if (!isset($_SESSION["cistella"])){
    $_SESSION["cistella"] = new Cistella();
}
// require_once "../Controladores/CategoriasController.php";
// $cat = new CategoriasController();

    //require '';
?>

<div class="container cesta-det"> 



    <div class='cistella-contingut'>
        <h3>Cesta</h3>


        <?php
        if (isset($_SESSION["cistella"])){


        //echo "<table border=1><th>ID</th><th>NOMBRE</th><th>PRECIO</th><th>CANTIDAD</th>";
            $valorCistella = $_SESSION["cistella"]->mostraProductesCistella();
            if(!empty($valorCistella)){

                echo
                '<div class="nav-cesta">
                <a href="../../Controladores/PedidosController.php?operacio=vaciarCesta"> vaciar cesta</a>
                </div>';
            }else{
                echo'Aun no tienes nada en tu cesta';
            }
            $vectorAux = array();
            $vector = array();
            $total = 0;
            ?>


            <?php
            if ($valorCistella!=null){?>
                <div class ="producto-cesta-lista">

                    <div class="items-prod-cesta">
                        <div class="prod-dentro">
                            <h5>Cantidad</h5> 
                        </div>
                    </div>

                    <div class="items-prod-cesta">
                        <div class="prod-dentro">
                            <h5>Producto</h5> 
                        </div>
                    </div>
                    <div class="items-prod-cesta">
                        <div class="prod-dentro">
                            <h5>Precio</h5>
                        </div>
                    </div>
                </div>

                <?php
                for ($i=0;$i<count($valorCistella["idProducte"], COUNT_RECURSIVE);$i++){
                    $cantidad = $valorCistella["quantitatProducte"][$i];

                    $objecteProducte = new ProductosController();
                    $infoProducte= $objecteProducte->retornaInfoProducto($valorCistella["idProducte"][$i]);

                    foreach ($infoProducte as $informacioProducte){?>
                        <div class ="producto-cesta-lista">

                            <div class="items-prod-cesta">
                                <div class="prod-dentro">
                                    <a><?php echo $cantidad;?></a> 
                                </div>
                            </div>

                            <div class="items-prod-cesta">
                                <div class="prod-dentro">
                                    <a><?php echo $informacioProducte->nombre;?></a> 
                                </div>
                            </div>

                            <div class="prod-dentro precio">
                                <a><?php echo $informacioProducte->precio ?>€</a>
                            </div>
                        </div>
                        <hr>


                        <?php
                        array_push($vectorAux, $informacioProducte->id_producto, $informacioProducte->nombre, $informacioProducte->precio);
                    }
                    array_push($vectorAux, $cantidad);
                    $total = $cantidad * $informacioProducte->precio + $total;
                }
            //array_push($vectorCistella, $vectorAux);
            }
            $_SESSION["carro"]=$vectorAux;
        }
        ?>
        <?php if(!empty($valorCistella)){?>
            <div class ="producto-cesta-lista">

                <div class="items-prod-cesta">
                   <div class="total">
                    <h2>Total: <?php echo $total?> €</h2>
                </div>
            </div>
        </div>
    <?php }?>

    <div class="nav-cesta">
        <ul class="botones">
            <?php if(!empty($valorCistella)){?>
                <li><a href='../../Controladores/PedidosController.php?accio=creaPedido'>FINALIZAR COMPRA</a></li>
            <?php }?>
            <li><a href='../../Vistas/Home/tienda.php'>seguir comprando</a></li>

        </ul>
    </div>

</div>
</div>





<?php 
if (file_exists('../Vistas/Footer/footer.php')){ include '../Vistas/Footer/footer.php';}
if (file_exists('../Footer/footer.php')){ include '../Footer/footer.php';}
?>