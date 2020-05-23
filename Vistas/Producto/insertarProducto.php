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


<h2 class="col-12">Añadir producto</h2>
<div class="col-12">
<form action="../../Controladores/ProductosController.php" method="POST" enctype="multipart/form-data">
    <div class="row">

        
        <!---->
        <div class="col-md-12 mb-3">
            <div class="input-container">
                <input type="text" id="nombre" name="nombre" required="required">
                <label for="nombre" class="label">Nombre</label>
            </div>
        </div>
        <!---->
        <div class="col-md-12 mb-3">
            <div class="input-container">
                <input type="text" id="subtitulo" name="subtitulo" required="required">
                <label for="subtitulo" class="label">Subtítulo</label>
            </div>
        </div>
        <!---->
        <div class="col-md-4 mb-3">
            <div class="input-container slct">
                <select name="categoria">
                    <option value="0">Seleccione:</option>
                        <?php
                            
                            $categorias = new CategoriasController();
                            $valoresCategorias = $categorias->selectCategorias();
                            foreach ($valoresCategorias as $categoria){
                                echo "<option value=$categoria->id_categoria>".$categoria->nombre."</option>";
                            }
                        ?>
                </select>
                <label for="categoria" class="label">Categoría</label>
            </div>
        </div>
        <!---->
        <div class="col-md-4 mb-3">
            <div class="input-container">
                <input type="number" id="stock" name="stock" required="required">
                <label for="stock" class="label">Stock</label>
            </div>
        </div>
        <!---->
        <div class="col-md-4 mb-3">
            <div class="input-container">
                <input type="number" id="precio" name="precio" required="required">
                <label for="precio" class="label">Precio</label>
            </div>
        </div>
        <!---->
        <div class="col-md-12 mb-3">
            <div class="input-container txt">
                <textarea id="descripcion" name="descripcion" required="required" rows="4"></textarea>
                <label for="descripcion" class="label">Descripción</label>
            </div>
        </div>
        <!---->
        <div class="col-md-12 mb-3">
            <div class="input-container file">
                <label class="label" for="foto1">Foto 01</label>
                <input type="file" name="foto1">
            </div>
        </div>
        <!---->
        <div class="col-md-12 mb-3">
            <div class="input-container file">
                <label class="label" for="foto1">Foto 02</label>
                <input type="file" name="foto2">
            </div>
        </div>
        <!---->
        <div class="col-md-12 mb-3">
            <div class="input-container file">
                <label class="label" for="foto1">Foto 03</label>
                <input type="file" name="foto3">
            </div>
        </div>
        <!---->
        <div class="col-md-12 mb-3">
            <input type="hidden" name="operacio" value="inserta">
            <a href="javascript:history.go(-1)" class="btn btn-outline-danger">Cancelar</a>
            <input type="submit" value="Crear producto" class="btn btn-success ml-1">
        </div>


  <!-- -->
</div>
</form>
</div>
            </div>
        </div>
        
    </div>
</section>
    
<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>
