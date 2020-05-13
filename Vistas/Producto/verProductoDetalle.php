<?php    
/***  ENCABEZADO */

$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../Vistas/Header/header.php';    
include '../Vistas/Header/navbar-tienda.php';

//GP
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();


require_once "../Controladores/ProductosController.php";
require_once "../Controladores/CategoriasController.php";
$cat = new CategoriasController();




    //require '';
?>
<?php foreach($Llistat as $objecte) { ?>

    <div class="container"> 
        <div class="migas"> 
            <a href="/Vistas/Home/tienda.php">Tienda</a>
            > 
            <a href="#"><?php echo $cat->MuestraInfoCategoria($objecte->id_categoria); ?> </a>
            >
            <?php echo $objecte->nombre ?>
        </div> 
        <div class = "flex-container prod-detalle ">
            <div class="container-fotos">
                <div class ="foto-grande">
                    <?php 
                    if ($objecte->foto1!=null){
                        ?>
                        <img src="../Vistas/assets/img/productos/<?php echo $objecte->foto1 ?>" ></img>
                        <?php
                    } else{
                        echo '<span style="width: 620; height: 200px; display:block; background-color:#e6e6e6;">Imagen no disponible</span>' ;
                    }?>
                </div>
                <div class="foto-pequeñas">
                    <div id ="img1"><img src="../Vistas/assets/img/productos/<?php echo $objecte->foto1 ?>"></div>
                    <div ><img src="../Vistas/assets/img/productos/<?php echo $objecte->foto2 ?>"></div>
                    <div id ="img2"><img src="../Vistas/assets/img/productos/<?php echo $objecte->foto3 ?>"></div>
                </div>
            </div>  
            <div class="container-datos">
                <ul>
                    <div>
                        <h1><?php echo $objecte->nombre ?></h1>
                    </div>
                    <div>
                        <p><?php echo $objecte->subtitulo ?>
                    </div>
                    <div class="precio-grande">
                        <a><?php echo $objecte->precio ?>€</a>
                    </div>

                    <!-- Boton añadir cantidad -->

                    <form id='myform' method='POST' action='#'>
                        <div class="rec">
                            <input id='cantidad' type='button' value='-' class='qtyminus' field='quantity' />
                            <input type='text' name='quantity' value='0' class='qty' />
                            <input type='button' value='+' class='qtyplus' field='quantity' />
                        </div>
                    </form>

                    <!---->

                    <div class="bt-lateral">
                        <form action="/Controladores/PedidosController.php" method="POST">
                            <div class="six fields boton-buy">
                                <div class="field">
                                    <input type="hidden" name="fecha" placeholder="fecha" value="<?php echo date("Y-m-d")?>"/>
                                    <input type="hidden" name="id" placeholder="id" value="<?php echo $objecte->id_producto?>"/>
                                </div>
                                <input type="hidden" name="operacio" value="comprar"/>
                                <input type="submit" value="Comprar">
                            </div>
                        </form>

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

<?php include '../Vistas/Footer/footer.php'; ?>

</body>

</html>