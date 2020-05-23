<?php    
/***  ENCABEZADO */
if (file_exists('../../Controladores/SesionesController.php')){ require_once '../../Controladores/SesionesController.php';}
$objecteSessio = new SesionesController();

$title = 'Tienda'; 
$currentPage = 'Tienda'; 
if (file_exists('../Vistas/Header/header.php')){ include '../Vistas/Header/header.php';}

?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $("#registro").click(function(){
        alert("Inicia sesion o registrate para continuar.");
    });
  });
</script>


<?php

if (file_exists('../Header/header.php')){ include '../Header/header.php';}
if (file_exists('../Vistas/Header/navbar-tienda.php')){ include '../Vistas/Header/navbar-tienda.php';}
if (file_exists('../Header/navbar-tienda.php')){ include '../Header/navbar-tienda.php';}

if (file_exists('../Controladores/SesionesController.php')){ require_once '../Controladores/SesionesController.php';}

if (file_exists('../../Controladores/ProductosController.php')){ require_once '../../Controladores/ProductosController.php';}
if (file_exists('../Controladores/ProductosController.php')){ require_once '../Controladores/ProductosController.php';}
if (file_exists('/Controladores/ProductosController.php')){ require_once '/Controladores/ProductosController.php';}


if (!isset($_SESSION["cistella"])){
    $_SESSION["cistella"] = new Cistella();
}

?>

<?php  

if (isset($_SESSION["login"])){
    if ($_SESSION["login"]==false){
        if (isset($_SESSION["mensajeLogin"])){
                // AZ
            echo "<div class='modal fade' id='wrongModal1' tabindex='-1' role='dialog' aria-labelledby='wrongModal' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content p-4 text-center'>";
            echo "<a class='close' data-dismiss='modal'>×</a>";
            echo "<p class='m-0'><b>".$_SESSION["mensajeLogin"]."</b></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<script>$('#wrongModal1').modal('show');</script>";
            unset($_SESSION["mensajeLogin"]);
        }
    }else{
        if (isset($_SESSION["Denegado"])){
            // AZ
            echo "<div class='modal fade' id='wrongModal2' tabindex='-1' role='dialog' aria-labelledby='wrongModal' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content p-4 text-center'>";
            echo "<a class='close' data-dismiss='modal'>×</a>";
            echo "<p class='m-0'><b>".$_SESSION["Denegado"]."</b></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<script>$('#wrongModal2).modal('show');</script>";
            unset($_SESSION["Denegado"]);
        }
    }
}

if (isset($_SESSION["mensajeResultado"])){
    echo $_SESSION["mensajeResultado"];
    unset($_SESSION["mensajeResultado"]);
}
?>




<body>
    <div class="container cesta-det"> 
        <div class="titol-cesta">
            <h3>cesta</h3>                
        </div>

        <div class='cistella-contingut'>
            <div class="wrapper-cistella">
                <?php
                if (isset($_SESSION["cistella"])){  

                    $valorCistella = $_SESSION["cistella"]->mostraProductesCistella();
                    if(empty($valorCistella)){
                        echo'<div style="text-align:center; margin-top:50px;" >Aun no tienes nada en tu cesta</div>';
                    }
                    
                    $vectorAux = array();
                    $vector = array();
                    $total = 0;

                    if ($valorCistella!=null){?>
                        <div class ="producto-cesta-lista">

                            <div class="items-prod-cesta">
                                <div class="prod-dentro">
                                    <h4>Cantidad</h4> 
                                </div>
                            </div>

                            <div class="items-prod-cesta">
                                <div class="prod-dentro">
                                    <h4>Producto</h4> 
                                </div>
                            </div>
                            <div class="items-prod-cesta">
                                <div class="prod-dentro">
                                    <h4>Precio</h4>
                                </div>
                            </div>
                            <div class="items-prod-cesta">
                                <div class="prod-dentro">
                                    <h4>Precio total</h4>
                                </div>
                            </div>
                            <div class="items-prod-cesta">
                                <div class="prod-dentro">
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <?php
                        $index = 0;
                        for ($i=0;$i<count($valorCistella["idProducte"], COUNT_RECURSIVE);$i++){
                            $cantidad = $valorCistella["quantitatProducte"][$i];
                            $index = $i;

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

                                    <div class="prod-dentro precio">
                                        <a><?php echo $informacioProducte->precio * $cantidad ?>€</a>
                                    </div>

                                    <div class="prod-dentro precio">
                                        <ul class="social-links">
                                            <a id="id" href="../../Controladores/PedidosController.php?accio=eliminaProductoCesta&id=<?php echo $informacioProducte->id_producto;?>" >
                                                <i class="icon-del"></i>
                                            </a>
                                        </ul>
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
                    <div class ="producto-cesta-total">
                        <div class="total">
                            <h2>Total: <?php echo $total?> €</h2>
                        </div>

                    </div>
                    <?php 
                }?>
            </div>

            <div class="nav-cesta">
                <ul class="botones">

                    <?php if (isset($_SESSION["cistella"])){

                        $valorCistella = $_SESSION["cistella"]->mostraProductesCistella();
                        if(!empty($valorCistella)){

                            echo
                            '<li><a class="bt-sec" href="../../Controladores/PedidosController.php?operacio=vaciarCesta"> vaciar cesta</a></li>';
                        }
                    }?>
                    <li><a class="bt-sec" href='../../Vistas/Home/tienda.php'>seguir comprando</a></li>
                    <?php if(!empty($valorCistella)){
                       if (!isset($_SESSION["login"])){?>

                        <li><a href="" class="bt-pri" id="registro">Finalizar compra</a>
                        </li>        
                        <?php
                    }else { ?>

                        <li>
                            <a class="bt-pri" href='../../Controladores/PedidosController.php?accio=creaPedido'>Finalizar compra</a>
                        </li> 
                        <?php  

                    }
                }?>

            </ul>
        </div>

    </div>
</div>

</body>

<?php 
if (file_exists('../Vistas/Footer/footer.php')){ include '../Vistas/Footer/footer.php';}
if (file_exists('../Footer/footer.php')){ include '../Footer/footer.php';}
?>