<?php
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../Vistas/Header/header.php';    
?>
<body>

<section class="admin">
    <div class="container">
        <div class="row">
            
        <?php include '../Vistas/Header/nav-cuenta-admin.php';?>
        
            <div class="col-md-9 content">
                
                <div class="row">
                
                <!-- -->


<h2 class="col-12">Detalle de producto</h2>

<div class="col-12">

    <div class="row">

    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            
            <!-- -->
            <div class="col-md-8 mb-3">
              <div class="input-container disabled">
                <div class="input">
                    <?php echo $objecte->nombre ?>
                </div>
                <span class="label sm">Nombre</span>
              </div>
            </div>
            <!-- -->
            <div class="col-md-4 mb-3">
              <div class="input-container disabled">
                <div class="input">
                    <?php echo $objecte->id_producto ?>
                </div>
                <span class="label sm">Identificador</span>
              </div>
            </div>
            <!-- -->
            <div class="col-md-12 mb-3">
              <div class="input-container disabled">
                <div class="input">
                    <?php echo $objecte->subtitulo ?>
                </div>
                <span class="label sm">Subtítulo</span>
              </div>
            </div>
            <!-- -->
            <div class="col-md-4 mb-3">
              <div class="input-container disabled">
                <div class="input">
                    <?php echo $objecte->id_categoria ?>
                </div>
                <span class="label sm">Categoría</span>
              </div>
            </div>
            <!-- -->
            <div class="col-md-4 mb-3">
              <div class="input-container disabled">
                <div class="input">
                    <?php echo $objecte->stock ?>
                </div>
                <span class="label sm">Stock</span>
              </div>
            </div>

            <!-- -->
            <div class="col-md-4 mb-3">
              <div class="input-container disabled">
                <div class="input">
                    <?php echo $objecte->precio ?> EUR
                </div>
                <span class="label sm">Precio</span>
              </div>
            </div>

            <!-- -->
            <div class="col-md-12 mb-3">
              <div class="input-container disabled">
                <div class="input">
                    <?php echo $objecte->descripcion ?>
                </div>
                <span class="label sm">Descripción</span>
              </div>
            </div>
            <!-- -->
            
            <div class="col-md-4 mb-3">
                <figure class="img-container">
                    <?php if ($objecte->foto1){
                        echo '<img src="../Vistas/assets/img/productos/'.$objecte->foto1.'">';
                    } else {
                        echo '<img src="../Vistas/assets/img/no-image.jpg">';
                    }?>
                </figure>
            </div>
            <!-- -->
            
            <div class="col-md-4 mb-3">
                <figure class="img-container">
                    <?php if ($objecte->foto2){
                        echo '<img src="../Vistas/assets/img/productos/'.$objecte->foto2.'">';
                    } else {
                        echo '<img src="../Vistas/assets/img/no-image.jpg">';
                    }?>
                </figure>
            </div>
            <!-- -->

            <div class="col-md-4 mb-3">
                <figure class="img-container">
                    <?php if ($objecte->foto3){
                        echo '<img src="../Vistas/assets/img/productos/'.$objecte->foto3.'">';
                    } else {
                        echo '<img src="../Vistas/assets/img/no-image.jpg">';
                    }?>
                </figure>
            </div>

            



            
            
            <div class="col-md-4 mb-3">

            

            <?php if (($objecte->id_producto)!=0){    //0 es el "NULO
                ?>
                <a class="btn btn-danger mr-1" href="ProductosController.php?operacio=eliminar&producto=<?php echo $objecte->id_producto ?>">Eliminar</a>
                <a class="btn btn-success" href="ProductosController.php?operacio=modificar&producto=<?php echo $objecte->id_producto ?>">Modificar</a>
                <?php
            } ?>
            
            </div>
            </div>
    

    <?php
        }?>


    </div>

</div>

                 <!-- -->

            </div>
        </div>
        
    </div>
</section>
    
<?php include '../Vistas/Footer/footer.php'; ?>

</body>

</html>