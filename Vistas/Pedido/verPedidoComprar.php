<?php    
$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../Vistas/Header/header.php';    
include '../Vistas/Header/navbar-tienda.php';  


require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();






foreach($obj as $objecte) { ?>



    <div class="container"> 
        <div class="migas"> 
            <a href="/Vistas/Home/tienda.php">Tienda</a>
            > 
            <a href="#">mostrar ruta </a>
            >
            <!-- <?php echo $objecte->nombre ?> -->

        </div> 

        <div class = "flex-container prod-comprar ">


            <div>
                <h1>Tramitar pedido</h1>

            </div>


            <div class ="producto-cesta">
                <div class="items-prod"> 
                    <div class= "img-referencia">                    
                       <?php 
                       if ($objecte->foto1!=null){
                        ?> 
                        <img src="../Vistas/assets/img/productos/<?php echo $objecte->foto1 ?>" ></img> 
                        <?php
                    } else{
                       echo '<span style="width: 620; height: 200px; display:block; background-color:#e6e6e6;">Imagen no disponible</span>' ;
                   }?> 
                    </div>
                </div>

                <div class="items-prod">
                    <div class="prod-dentro">
                        <h2><?php echo $objecte->nombre?></h2> 
                        <p><?php echo $objecte->subtitulo ?></p>
                    </div>
                </div>

                <div class="prod-dentro precio-grande">
                    <a><?php echo $objecte->precio ?>€</a>
                </div>

                <div class="items-prod">
                    <div class="prod-dentro"> <!--boton cantidad -->
                        <form id='myform2' method='POST' action='#'>
                            <div class="rec">
                                <input id='cantidad' type='button' value='-' class='qtyminus' field='cantidad' />
                                <input id="cantidad-final" type='text' name='cantidad' value='0' class='qty' />
                                <input type='button' value='+' class='qtyplus' field='cantidad' />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
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
                            <input type="hidden" name="operacio" value="inserta"/>
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

<?php  }?> 
<?php include '../Vistas/Footer/footer.php'; ?>

</body>

</html>