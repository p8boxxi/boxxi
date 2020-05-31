<?php    
/***  ENCABEZADO */
if (file_exists('../../Controladores/SesionesController.php')){ require_once '../../Controladores/SesionesController.php';}
$objecteSessio = new SesionesController();

$title = 'Tienda-compra'; 
$currentPage = 'Tienda-compra'; 
if (file_exists('../Vistas/Header/header.php')){ include '../Vistas/Header/header.php';}
if (file_exists('../Header/header.php')){ include '../Header/header.php';}

?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php

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
    <div class="container det"> 

        <div class="row tab-cesta">

            <h1 class="col-12 text-center">cesta</h1> 

            <table class="table">

                <?php
                if (isset($_SESSION["cistella"])){  

                    $valorCistella = $_SESSION["cistella"]->mostraProductesCistella();
                    
                    if(empty($valorCistella)){
                        echo'
                        <thead>
                        <tr>
                        <th class="text-center">Aun no tienes nada en tu cesta</th>
                        </tr>
                        </thead>'
                        ;}

                        $vectorAux = array();
                        $vector = array();
                        $total = 0;

                        if ($valorCistella!=null){
                            ?>

                            <thead>
                                <tr>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Precio total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $index = 0;

                                for ($i=0;$i<count($valorCistella["idProducte"], COUNT_RECURSIVE);$i++){

                                    $cantidad = $valorCistella["quantitatProducte"][$i];
                                    $index = $i;

                                    $objecteProducte = new ProductosController();
                                    $infoProducte= $objecteProducte->retornaInfoProducto($valorCistella["idProducte"][$i]);


                                    foreach ($infoProducte as $informacioProducte){
                                        ?>
                                        <tr>                                    
                                            <td><?php echo $cantidad;?></td>
                                            <td><?php echo $informacioProducte->nombre;?></td>
                                            <td><?php echo $informacioProducte->precio;?>€</td>
                                            <td><?php echo $informacioProducte->precio * $cantidad ?>€</td>
                                            <td> 
                                                <a id="id" class="icon-del" href="../../Controladores/PedidosController.php?accio=eliminaProductoCesta&id=<?php echo $informacioProducte->id_producto;?>">
                                                        <svg class="bi bi-x-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="#212529" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                                                        </svg>
                                                </a>
                                            </td>
                                        </tr>

                                        <?php
                                        array_push($vectorAux, $informacioProducte->id_producto, $informacioProducte->nombre, $informacioProducte->precio);
                                    }

                                    array_push($vectorAux, $cantidad);
                                    $total = $cantidad * $informacioProducte->precio + $total;
                                }?>

                            </tbody>
                            
                            <?php
                            //array_push($vectorCistella, $vectorAux);
                        }
                        $_SESSION["carro"]=$vectorAux;
                    }


                    if(!empty($valorCistella)){
                        ?>
                        <tfoot >                        
                            <tr>
                                <th class="text-right" colspan="5" ><h2>Total: <?php echo $total?> €</h2></th>
                            </tr>                            
                        </tfoot>

                    <?php 
                    }?>

            </table>
        </div>


        <div class="row botonera">
            <div class="col-12 botones text-right " >
                <div class="text-right boto">
                    <?php 
                    if (isset($_SESSION["cistella"])){

                        $valorCistella = $_SESSION["cistella"]->mostraProductesCistella();
                        if(!empty($valorCistella)){                        
                        ?>
                            
                            <a class="bt-sec" href="../../Controladores/PedidosController.php?operacio=vaciarCesta"> vaciar cesta</a>

                        <?php
                        }
                    }?>

                    <a class="bt-sec" href='../../Vistas/Home/tienda.php'>seguir comprando</a>
                    
                </div>

                <div class="text-right boto z"> 
                    <?php 
                    if(!empty($valorCistella)){
                        if (!isset($_SESSION["login"])){
                    ?>
                            <a href="" type="button reg"  class="bt-pri" id="registro" data-toggle="modal" data-target="#myModal-comprar">Finalizar compra</a>

                        <?php
                        } else { 
                        ?>
                            <a class="bt-pri" href='../../Controladores/PedidosController.php?accio=creaPedido'>Finalizar compra</a>

                        <?php  
                        }
                    }?>
                </div>
                
            </div>

        </div>


    </div>



<!-- Modal registrado -->
<div class="modal fade" id="myModal-comprar" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content p-4 text-center">
            <div class="modal-header">
                <h4 class="modal-title">Aviso</h4>
            </div>

            <div class="modal-body">
                <p>Inicia sesión o registrate para continuar.</p>
            </div>

            <a type="button" class="link"  data-toggle="modal" data-dismiss="modal" data-target="#loginModal">Acceso de usuarios</a>
            <a class="link" href="../../Vistas/Home/cliente-registro.php">Registrarse</a>
            
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>

</div>
<!-- FIN Modal registrado -->

<?php 
if (file_exists('../Vistas/Footer/footer.php')){ include '../Vistas/Footer/footer.php';}
if (file_exists('../Footer/footer.php')){ include '../Footer/footer.php';}
?>

</body>
</html>
