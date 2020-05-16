<?php    
$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../Vistas/Header/header.php';    
include '../Vistas/Header/navbar-tienda.php';  


require_once '../Controladores/SesionesController.php';

require_once '../Controladores/PedidoDetallesController.php';
$pedido = new PedidoDetallesController();


require_once '../Controladores/ProductosController.php';

$objecteSessio = new SesionesController();


 ?>
    <div class="container"> 


        <div class = "flex-container prod-comprar ">


            <div>
                <h1>Tramitar pedido</h1>

            </div>
            
            <?php 
                $i=0 ;
                foreach($objDetalls as $objecte) {
                $prod = new ProductosController();
                $prodinfo = $objecte->id_producto;
                $detallsProducte = $prod->ProductoDetalleComprarInfo($prodinfo);

            print_r($detallsProducte);
            ?>
            <div class ="producto-cesta">
                <div class="items-prod"> 
                    <div class= "img-referencia">                    
                       <?php 
                       if ($detallsProducte['foto1']!=null){
                        ?> 
                        <img src="../Vistas/assets/img/productos/<?php echo $detallsProducte['foto1'] ?>" ></img> 
                        <?php
                    } else{
                       echo '<span style="width: 620; height: 200px; display:block; background-color:#e6e6e6;">Imagen no disponible</span>' ;
                   }?> 
                    </div>
                </div>

                <div class="items-prod">
                    <div class="prod-dentro">
                        <h2><?php echo $objecte->producto;?></h2> 
                        <p><?php echo $detallsProducte['subtitulo']; ?></p>
                    </div>
                </div>

                <div class="prod-dentro precio-grande">
                    <a><?php echo $objecte->precio ?>€</a>
                </div>

                <div class="items-prod">
                    <div class="prod-dentro"> <!--boton cantidad -->
                        <form id='myform2' method='POST' action='#'>
                            <div class="rec">
                                <input id='cantidad' type='button' value='-' class='qtyminus' field='cantidad<?php echo $i;?>' />
                                <input id="cantidad-final" type='text' name='cantidad<?php echo $i;?>' value='0' class='qty' />
                                <input type='button' value='+' class='qtyplus' field='cantidad<?php echo $i;?>' />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <?php  
            $i++;
            }?> 
        </div>

        <div class ="prod-comprar">
            <div class="items-confirmar ">
                <form action="/Controladores/PedidoDetallesController.php" method="POST">
                    <div class="six fields">
                        <input type="hidden" name="fecha" value="<?php echo date("Y-m-d")?>"/>
                        <input id="cantidad-enviar" type="hidden" name="cantidad" value="">
                        <input type="hidden" name="precio" value="<?php echo $objecte->precio?>">
                        <input type="hidden" name="producto" value="<?php echo $objecte->id_producto?>">

                        <div class="confirmar boton-buy ">
                            <input type="hidden" name="operacio" value=""/>
                            <input type="submit" value="Finalizar compra"/>
                        </div>

                    </div>
                </form>
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