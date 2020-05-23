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
    
    <?php 
    if (isset($_GET["producto"])){
        ?>

    <form action="../../Controladores/ProductosController.php" method="POST">

    <div class="row">

    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            
            <!-- -->
            <div class="col-md-8 mb-3">
                <div class="input-container">
                    <input type="text" id="nombre" name="nombre" required="required" value="<?php echo $objecte->nombre ?>">
                    <label for="nombre" class="label">Nombre</label>
                </div>
            </div>
            <!---->
            <div class="col-md-4 mb-3">
              <div class="input-container disabled">
                <div class="input">
                    <?php echo $objecte->id_producto ?>
                </div>
                <span class="label sm">Identificador</span>
              </div>
            </div>
            <!---->
            <div class="col-md-12 mb-3">
                <div class="input-container">
                    <input type="text" id="subtitulo" name="subtitulo" required="required" value="<?php echo $objecte->subtitulo ?>">
                    <label for="subtitulo" class="label">Subtítulo</label>
                </div>
            </div>
            <!-- -->
            <div class="col-md-4 mb-3">
                <div class="input-container">
                    <input type="number" id="stock" name="stock" required="required" value="<?php echo $objecte->stock ?>">
                    <label for="stock" class="label">Stock</label>
                </div>
            </div>
            <!---->
            <div class="col-md-4 mb-3">
                <div class="input-container">
                    <input type="number" id="precio" name="precio" required="required" value="<?php echo $objecte->precio ?>">
                    <label for="precio" class="label">Precio</label>
                </div>
            </div>
            <!---->
            <div class="col-md-12 mb-3">
                <div class="input-container txt">
                    <textarea id="descripcion" name="descripcion" required="required" rows="4"><?php echo $objecte->descripcion ?></textarea>
                    <label for="descripcion" class="label">Descripción</label>
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
                <div class="input-container file mt-2">
                    <label class="label" for="foto1">Foto 01</label>
                    <input type="file" name="foto1">
                </div>
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
                <div class="input-container file mt-2">
                    <label class="label" for="foto2">Foto 02</label>
                    <input type="file" name="foto2">
                </div>
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
                <div class="input-container file mt-2">
                    <label class="label" for="foto3">Foto 03</label>
                    <input type="file" name="foto3">
                </div>
            </div>

            <!-- -->

            



            
            
            

            <!---->
        <div class="col-md-12 mb-3">
            <a href="javascript:history.go(-1)" class="btn btn-outline-danger">Cancelar</a>
            <input type="hidden" name="id" value="<?php echo $_GET["producto"]?>">
            <input type="hidden" name="operacio" value="modifica">
            <input type="submit" value="Modifica el producto" class="btn btn-success ml-1">
        </div>
            
            </div>
            </div>
    
            
    <?php
        }?>

<?php
    }else{
        echo "NO se puede mostrar";
    }

    ?>

    </div>
    
    </form>

</div>

                 <!-- -->

            </div>
        </div>
        
    </div>
</section>
    
<?php include '../Vistas/Footer/footer.php'; ?>

</body>

</html>

