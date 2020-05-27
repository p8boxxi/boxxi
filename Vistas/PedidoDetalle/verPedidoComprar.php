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
<div class="container cesta-det">    

    <div class="cistella-contingut"> 


        <div class = "prod-comprar ">


            <div>
                <h1>tramitar pedido</h1>

            </div>
            <div class ="container cesta-det">


                <div class="items-prod">
                    <div class="prod-dentro">
                        <h3>Producto</h3> 
                    </div>
                </div>

                <div class="items-prod">
                    <div class="prod-dentro">
                        <h3></h3> 
                    </div>


                </div>
                <div class="items-prod">
                    <div class="prod-dentro">
                        <h3>Precio</h3>
                    </div>
                </div>
                <div class="items-prod">
                    <div class="prod-dentro">
                        <h3>Cantidad</h3>
                    </div>
                </div>

                <div class="items-prod">
                    <div class="prod-dentro">
                        <h4>Total</h4>
                    </div>
                </div>
            </div>
            <hr class="divisor">

            <?php 
            $i=0 ;
            $objDetalls = (array)$objDetalls;
            foreach($objDetalls as $objecte) {                
                $prodinfo = $objecte->id_producto;
                $objecteProducte = new ProductosController();
                $infoProducte= $objecteProducte->retornaInfoProducto($prodinfo);
                foreach ($infoProducte as $informacioProducte){
                    ?>
                    <div class ="producto-cesta-lista">
                        <div class="items-prod"> 
                            <div class= "img-referencia">                    
                             <?php 
                             if ($informacioProducte->foto1!=null){
                                ?> 
                                <img src="../Vistas/assets/img/productos/<?php echo $informacioProducte->foto1 ?>" ></img> 
                                <?php
                            } else{
                             echo '<span style="width: 100; height: 100px; display:block; background-color:#e6e6e6;">Imagen no disponible</span>' ;
                         }?> 
                     </div>
                 </div>

                 <div class="items-prod">
                    <div class="prod-dentro">
                        <h2><?php echo $objecte->producto;?></h2> 
                        <p><?php echo $informacioProducte->subtitulo; ?></p>
                    </div>
                </div>

                <div class="prod-dentro precio">
                    <a><?php echo $objecte->precio ?>€</a>
                </div>
                <div class="prod-dentro">
                    <a><?php echo $objecte->cantidad ?></a>
                </div>
                <div class="prod-dentro">
                    <a><?php echo $objecte->cantidad * $objecte->precio; $total = $total + $objecte->cantidad * $objecte->precio ?>€</a>
                </div>
            </div>
            <hr>
            <?php  
            $i++;
        }}?> 
    </div>
    <div class ="producto-cesta-total">
        <div class="total">
            <h2>Total: <?php echo $total?> €</h2>
        </div>

    </div>

    <div class ="prod-comprar">
        <div class="items-confirmar ">
            <form action="/Controladores/PedidosController.php" method="POST">
                <div class="six fields">
                    <div class="boton-buy ">

                    </div>
                </div>
            </form>
            <div class="boton-buy ">
                <form action="/Controladores/PedidosController.php" method="POST">
                    <input type="hidden" name="fecha" value="<?php echo date("Y-m-d")?>"/>
                    <input id="cantidad-enviar" type="hidden" name="cantidad" value="">
                    <input type="hidden" name="precio" value="<?php echo $objecte->precio?>">
                    <input type="hidden" name="producto" value="<?php echo $objecte->id_producto?>">               
                    <input  type="hidden" name="operacio" value="comprar"/>
                    <input class="bt-confirmar" type="submit" value="Finalizar compra"/>
                </form>

                <form action="/Controladores/PedidosController.php" method="POST">
                    <input  type="hidden" name="operacio" value="cancelarCompra"/>
                    <input class="bt-comprar" type="submit" value="Cancelar"/>
                </form>
         </div>
     </div>    
 </div>
</div>
</div>


<script src="../Vistas/assets/js/botoncantidad.js"></script>
<script type="text/javascript">
    $("#cantidad-final").change(function (){
        $("#cantidad-enviar").val($(this).val());
    });


</script>


<?php include '../Vistas/Footer/footer.php'; ?>

</body>

</html>