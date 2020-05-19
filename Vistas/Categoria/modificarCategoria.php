<?php    
    //GP
    require_once "../../Controladores/SesionesController.php";
    $objecteSessio = new SesionesController();

    
    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de modificar la Categoria!!";
            header ("location: ../../index.php");
        }
    }
?>

<?php
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

                <?php 
                if (isset($_GET["id"])){
                    ?>
                    <h2>Cambiar nombre a categoría</h2>
                    <form action="../../Controladores/CategoriasController.php" method="POST">
                        
                    <div class="row">

                        <?php require_once '../../Controladores/CategoriasController.php'; 
                        $categoriaTitulo = new CategoriasController();
                        $nombreCategoria = $categoriaTitulo->obtieneNombreDeLaCategoria($_GET["id"]);
                        ?>

                        <div class="col-md-6 mb-3">
                          <div class="input-container">
                            <input type="text" name="nombre" value="<?php echo $nombreCategoria?>">
                            <label class="label" for="nombre">Nombre de categoría</label>
                          </div>
                        </div>
                        
                        <div class="w-100 d-none d-md-block"></div>

                        <div class="col-md-6 mb-3">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                            <input type="hidden" name="operacio" value="modifica">
                            <a href="javascript:history.go(-1)" class="btn btn-light">Cancelar</a>
                            <input class="btn btn-success" type="submit" value="Modificar">
                        <div class="col-md-6 mb-3">
                    
                    </div>

                    <?php
                    }else{
                        echo "No se puede mostrar";
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