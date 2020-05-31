<?php    
$title = 'Tienda-compra'; 
$currentPage = 'Tienda-compra';  
include '../Vistas/Header/header.php';    
include '../Vistas/Header/navbar-tienda.php';  


require_once '../Controladores/SesionesController.php';

require_once '../Controladores/PedidoDetallesController.php';
$pedido = new PedidoDetallesController();
$total = 0;

require_once '../Controladores/ProductosController.php';

$objecteSessio = new SesionesController();
?>


<body>
    <div class="container det"> 

        <div class="row tab-pedido">

            <h1 class="col-12 text-center">tramitar pedido</h1> 

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col"></th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio total</th>
                    </tr>
                </thead>

                <tbody>

                    <?php 
                    $i=0 ;
                    $objDetalls = (array)$objDetalls;
                    foreach($objDetalls as $objecte){                
                        $prodinfo = $objecte->id_producto;
                        $objecteProducte = new ProductosController();
                        $infoProducte= $objecteProducte->retornaInfoProducto($prodinfo);
                        foreach ($infoProducte as $informacioProducte){
                            ?>

                            <tr> 

                                <?php 
                                if ($informacioProducte->foto1!=null){
                                    ?>     

                                    <td class="img-referencia">
                                        <img src="../Vistas/assets/img/productos/<?php echo $informacioProducte->foto1 ?>" ></img>
                                    </td>

                                    <?php
                                } else{    
                                    ?> 
                                    
                                    <td>
                                        <span style="width: 100; height: 100px; display:block; background-color:#e6e6e6;">Imagen no disponible</span>
                                    </td> 

                                    <?php
                                }
                                ?>

                                <td><a class="t"><?php echo $objecte->producto;?></a><br><a class="sub"><?php echo $informacioProducte->subtitulo;?></a></td>
                                <td class="centrado"><?php echo $objecte->precio ?>€</td>
                                <td class="centrado"><?php echo $objecte->cantidad ?></td>
                                <td class="centrado"><?php echo $objecte->cantidad * $objecte->precio; $total = $total + $objecte->cantidad * $objecte->precio ?>€</td>
                            </tr>

                            <?php  
                            $i++;
                        }
                    }
                    ?> 

                </tbody>                                                   

                <tfoot >                        
                    <tr>
                        <th class="text-right" colspan="5" ><h2>Total: <?php echo $total?> €</h2></th>
                    </tr>                            
                </tfoot>
            </table>

        </div>


        <div class="row botonera">
            <div class="col-12 botones text-right " >
                <div class="text-right boto">
                    <form action="/Controladores/PedidosController.php" method="POST">
                        <input  type="hidden" name="operacio" value="cancelarCompra"/>

                        <input class="bt-sec" type="submit" value="Cancelar"/>

                    </form>

                    <form action="/Controladores/PedidosController.php" method="POST">
                        <input type="hidden" name="fecha" value="<?php echo date("Y-m-d")?>"/>
                        <input id="cantidad-enviar" type="hidden" name="cantidad" value="">
                        <input type="hidden" name="precio" value="<?php echo $objecte->precio?>">
                        <input type="hidden" name="producto" value="<?php echo $objecte->id_producto?>">               
                        <input  type="hidden" name="operacio" value="comprar"/>

                        <input class="bt-pri" type="submit" value="Finalizar compra"/>

                    </form>

                </div>

            </div>

        </div>
    </div>


    <?php include '../Vistas/Footer/footer.php'; ?>

</body>

</html>