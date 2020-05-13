<?php    
$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../Vistas/Header/header.php';    
include '../Vistas/Header/navbar-tienda.php';  


require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();

?>


<?php foreach($obj as $objecte) { ?>

    <div class="container"> 
        <div class="migas"> 
            <a href="/Vistas/Home/tienda.php">Tienda</a>
            > 
            <a href="#">mostrar ruta </a>
            >
            <?php echo $objecte->nombre ?>
        </div> 

        <div class = "flex-container prod-comprar ">
            <div>
                <h1>Finalizar pedido</h1>

            </div>
            <div class ="producto-cesta">

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


                <div>
                    <h1><?php echo $objecte->nombre ?></h1>
                </div>

                <div>
                    <p><?php echo $objecte->subtitulo ?>
                </div>

                <div class="precio-grande">
                    <a><?php echo $objecte->precio ?>€</a>
                </div>
            </div>

            <div>
            <!-- Boton añadir cantidad -->
                <form id='myform' method='POST' action='#'>
                    <div class="rec">
                        <input id='cantidad' type='button' value='-' class='qtyminus' field='quantity' />
                        <input type='text' name='quantity' value='0' class='qty' />
                        <input type='button' value='+' class='qtyplus' field='quantity' />
                    </div>
                </form>
            <!---->
            </div>

            <div>
                <form action="/Controladores/PedidosController.php" method="POST">
                    <div class="six fields">
                        <div class="field">
                            <label for="fecha">fecha</label>
                            <input type="hidden" type="text" name="fecha" placeholder="fecha">
                        </div>
                        <input type="hidden" name="operacio" value="inserta">
                        <input type="submit" value="Comprar">
                    </div>
                </div>


            </div>
            <div >
                <p><?php echo $objecte->descripcion ?>
            </div>
        </ul>
    </div>                               

</div>
</div>
<script src="../Vistas/assets/js/botoncantidad.js"></script>
<?php } ?>

<?php    
/***  PIE */

?>