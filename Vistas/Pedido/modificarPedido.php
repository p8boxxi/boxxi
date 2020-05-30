<?php    
    /***  ENCABEZADO */

    //GP
    require_once "../../Controladores/SesionesController.php";
    $objecteSessio = new SesionesController();

    
    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de modificar el Pedido!!";
            header ("location: ../../index.php");
        }
    }



$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../../Vistas/Header/header.php';    
?>
<body>



<section class="admin">
    <div class="container">
        <div class="row">
        
        <?php include '../../Vistas/Header/nav-cuenta-admin.php';?>
        
            <!-- -->

            <div class="col-md-9 content">
                    
                <?php if (isset($_SESSION["mensajeResultado"])){
                    echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
                    unset($_SESSION["mensajeResultado"]);
                };
                ?>


                        <?php 
            if (isset($_GET["id"])){
                ?>  
                    
                    <form action="../../Controladores/PedidosController.php" method="POST">
                        <div class="row">
                        <h2 class="col-12">Modificar pedido <?php echo $_GET["id"]?></h2>


                        <div class="col-md-6 mb-3">
                            <div class="input-container">
                                <label for="estado" class="label sm">Estado</label>
                                <select name="estado">
                                    <option value="0">Seleccione:</option>
                                        <?php
                                            require_once "../../Controladores/EstadosController.php";
                                            $estados = new EstadosController();
                                            $valoresEstados = $estados->selectEstados();
                                            foreach ($valoresEstados as $estado){
                                                echo "<option value=$estado->id_estado>".$estado->nombre."</option>";
                                            };
                                        ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                                
                            <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Controladores/PedidosController.php?operacio=ver" class="btn btn-light">Cancelar</a>
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                            <input type="hidden" name="operacio" value="modifica">
                            <input type="submit" class="btn btn-secondary" value="Modificar pedido">

                        </div>
                
                        
                    </div>
                </div>
            </form>
                    <?php
            }else{
                echo "NO se puede mostrar";
            }

            ?>



            </div>

            <!-- -->
            
        </div>
    </div>
</section>

    
<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>














