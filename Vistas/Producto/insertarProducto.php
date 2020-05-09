<?php    
    /***  ENCABEZADO */

    //GP
    require "../../Controladores/SesionesController.php";
    $objecteSessions = new SesionesController();

    // if (!isset($_SESSION["id_usuario"])){
    //     $_SESSION["login"] = false;
    //     $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
    //     header ("location: ../../index.php");
    // }else{
    //     if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
    //         $_SESSION["NoPermiso"]="No tiene acceso al módulo de insertar Productos!!";
    //         header ("location: ../../index.php");
    //     }
    // }
    

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




?>



<h1>Inserta un PRODUCTO</h1>
<form action="../../Controladores/ProductosController.php" method="POST" enctype="multipart/form-data">
    <div class="six fields">
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
        
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea PRODUCTO">
    </div>


<?php    
    /***  PIE */

?>