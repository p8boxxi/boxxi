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
require_once "../Controladores/CategoriasController.php";
$cat = new CategoriasController();
?>

<!-- El input siempre sea igual que el boton -->

<?php
$name = "cantidad";
$val = 0;
function get_option($name){
    $default = 0;
    $val = $default;
    if (isset($_POST["operacio"])){
        $val = 0;
    }
}           
?>

<!-- Comprueba cantidad vacia
 -->
<script>
    function validateForm() {
      var x = document.forms["myForm"]["cantidad"].value;
      if (x == "0") {
        alert("Debes introducir una cantidad");
        return false;
    }
}
</script>


<?php foreach($Llistat as $objecte) { ?>

    <div class="container"> 
        <div class="migas"> 
            <a href="/Vistas/Home/tienda.php">Tienda</a>
            > 
            <a href="#"><?php echo $cat->obtieneNombreDeLaCategoria($objecte->id_categoria); ?> </a>  >

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

                    <form id='myform2' method='POST' action='#'>
                        <div class="rec">
                            <input id='cantidad' type='button' value='-' class='qtyminus' field='cantidad' />
                            <input id="cantidad-final" type='text' name='cantidad' value='<?php echo $val; ?>' class='qty' />
                            <input type='button' value='+' class='qtyplus' field='cantidad' />
                        </div>
                    </form>

                    <!-- Boton añadir a la cistella-->

                    <div class="bt-lateral">
                        <form name='myForm' action="/Controladores/PedidosController.php"  onsubmit="return validateForm()" method="POST">
                            <div class="six fields boton-buy">
                                <div class="field">
                                    <input type="hidden" id="cantidad" type="" name="cantidad" value="<?php echo $val; ?>">
                                    <!-- <input type="hidden" name="fecha" placeholder="fecha" value="<?php //echo date("Y-m-d")?>"/> -->
                                    <input type="hidden" name="llistat" placeholder="llistat" value="<?php echo $Llistat?>"/>
                                    <input type="hidden" name="producto" placeholder="producto" value="<?php echo $objecte->id_producto?>"/>
                                </div>
                                <input type="hidden" name="operacio" value="anadirApedido"/>
                                <input type="submit" value="Comprar">
                            </div>
                        </form>

                    </div>
                    <div >
                        <p><?php echo $objecte->descripcion ?>
                    </div>
                </ul>
            </div>                               
            <div>

            </div>
        </div>
    </div>
    <script src="../Vistas/assets/js/botoncantidad.js"></script>
<?php } ?>

<?php include '../Vistas/Footer/footer.php'; ?>

</body>

</html>
