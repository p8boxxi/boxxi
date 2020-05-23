<?php    
    require "../../Controladores/SesionesController.php";
    $objecteSessions = new SesionesController();

    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de insertar Productos!!";
            header ("location: ../../index.php");
        }
    }


require_once "../../Controladores/CategoriasController.php";

$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../../Vistas/Header/header.php';    
?>
<body>

<section class="admin">
    <div class="container">
        <div class="row">
            
        <?php include '../../Vistas/Header/nav-cuenta-admin.php';?>
        
            <div class="col-md-9 content">
                
                <div class="row">
                
                <!-- -->

                <h2 class="col-12">Modificar producto</h2>

    <?php 
    if (isset($_GET["id"])){
        ?>
            <form action="../../Controladores/ProductosController.php" method="POST">
            <div class="two fields">
            <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="nombre">
        </div>
        <div class="field">
            <label for="subtitulo">subtitulo</label>
            <input type="text" name="subtitulo" placeholder="subtitulo">
        </div>
        <div class="field">
            <label for="stock">stock</label>
            <input type="text" name="stock" placeholder="stock">
   
        </div>
        <div class="field">
            <label for="precio">precio</label>
            <input type="text" name="precio" placeholder="precio">
        </div>
        <div class="field">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" placeholder="descripcion">
        </div>
        <div class="field">
            <label for="foto1">Foto_1</label>
            <input type="file" name="foto1">
        </div>
        <div class="field">
            <label for="foto2">Foto_2</label>
            <input type="file" name="foto2">
        </div>
        <div class="field">
            <label for="foto3">Foto_3</label>
            <input type="file" name="foto3">
        </div>
        
                <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                <input type="hidden" name="operacio" value="modifica">
                <input type="submit" value="modifica el producto">
            </div>
            <?php
    }else{
        echo "NO se puede mostrar";
    }

    ?>

 <!-- -->

            </div>
        </div>
        
    </div>
</section>
    
<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>
