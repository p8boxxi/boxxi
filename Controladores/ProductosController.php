<?php
if (file_exists("/Modelos/Producto.php")){
    require_once "/Modelos/Producto.php";
}
if (file_exists("../Modelos/Producto.php")){
    require_once "../Modelos/Producto.php";
}
if (file_exists("../../Modelos/Producto.php")){
    require_once "../../Modelos/Producto.php";
}

if (file_exists("Modelos/Producto.php")){
    require_once "Modelos/Producto.php";
}

//GP
if (file_exists("../Controladores/SesionesController.php")){
    require_once "../Controladores/SesionesController.php";
}else{
    require_once "SesionesController.php";
}



$objecteSessio = new SesionesController();

class ProductosController extends Producto{

    public function leeInfoProducto($categoria, $nombre, $subtitulo, $stock, $precio, $descripcion, $foto1, $foto2, $foto3){
    
       $this->nombre = $nombre;
       $this->subtitulo = $subtitulo;
       $this->stock = $stock;
       $this->precio = $precio;
       $this->descripcion = $descripcion;
       $this->foto1 = $foto1;
       $this->foto2 = $foto2;
       $this->foto3 = $foto3;
       
       $this->id_categoria = $categoria;    
       
       $this->resultadoRegistraProducto($this->registraProducto());
    }

    public function resultadoRegistraProducto($resultat){
        if ($resultat){
            require "../Vistas/Producto/Insertado.php";
        }else{
            require "../Vistas/Producto/NoInsertado.php";
        } 
    }

    public function LlistaProducto(){

        $Llistat = $this->retornaProductosTodos();
        //require "../Vistas/Producto/verProducto.php";
        require "Vistas/Producto/verProducto.php";
    }

    public function LlistaProductoConFotos(){

        $Llistat = $this->retornaProductosTodos();
        //require "../Vistas/Producto/verProductoConFotos.php";
        require "../Vistas/Producto/verProductoConFotos.php";
    }
    public function LlistaProductoHome(){

        $Llistat = $this->retornaProductosTodos();
        require "../../Vistas/Producto/verProductoHome.php";
    }

    public function CompruebaParaActualizar($categoria){
        $this->id_categoria=$categoria;     
        return $actualiza = $this->actualizaProducto()?true:false;
    }

    public function CompruebaParaEliminar($producto){
        $this->id_producto = $producto;

        require "PedidoDetallesController.php";
        $pedidoDetalle = new PedidoDetallesController();
        if ($pedidoDetalle->CompruebaParaActualizar($this->id_producto)){
            
           $this->eliminaElProducto();
        }else{
            require "../Vistas/Producto/NoEliminable.php";
        }
    }

    public function eliminaElProducto(){
        if ($this->eliminaProducto()){
            require "../Vistas/Producto/Eliminado.php"; 
        }else{
            require "../Vistas/Producto/NoEliminado.php";
        }
    }
    
    public function MuestraModificarProducto($id){

        header("location: ../Vistas/Producto/modificarProducto.php?id=$id"); 
    }
    public function ModificarProducte($id, $nombre, $subtitulo, $stock, $precio, $descripcion, $foto1, $foto2, $foto3){

        $this->id_producto = $id;
        $this->nombre = $nombre;
        $this->subtitulo = $subtitulo;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->foto1 = $foto1;
        $this->foto2 = $foto2;
        $this->foto3 = $foto3;

        echo $subtitulo;

       $this->resultadoModificaProducte($this->modificaProducto());
    }
    public function resultadoModificaProducte($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Producto Modificado</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>El Producto NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }






}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $nuevoObjeto = new ProductosController();

    $ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/boxxi/imagenes/";

    if (isset($_FILES["foto1"])){
        $nombre_foto1 = $_FILES["foto1"]["name"];
        $tmp_foto1 = $_FILES["foto1"]["tmp_name"];
        $rutaFoto1 = $ruta_imagenes.$nombre_foto1;
        copy($tmp_foto1, $rutaFoto1);
    }else{
        $nombre_foto1=null;
    }
    if (isset($_FILES["foto2"])){
        $nombre_foto2 = $_FILES["foto2"]["name"];
        $tmp_foto2 = $_FILES["foto2"]["tmp_name"];
        $rutaFoto2 = $ruta_imagenes.$nombre_foto2;
        copy($tmp_foto2, $rutaFoto2);
    }else{
        $nombre_foto2=null;
    }
    if (isset($_FILES["foto3"])){
        $nombre_foto3 = $_FILES["foto3"]["name"];
        $tmp_foto3 = $_FILES["foto3"]["tmp_name"];
        $rutaFoto3 = $ruta_imagenes.$nombre_foto3;
        copy($tmp_foto3, $rutaFoto3);
    }else{
        $nombre_foto3=null;
    }
    
    $categoria = 1;   //*** ATENCIO: s'ha de rebre l'input! */
    $nuevoObjeto->leeInfoProducto(
                    $_POST["nombre"],
                    $_POST["subtitulo"],
                    $_POST["stock"],
                    $_POST["precio"],
                    $_POST["descripcion"],
                    $nombre_foto1,
                    $nombre_foto2,
                    $nombre_foto3
                );
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new ProductosController();
    $objecte->LlistaProducto();
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="verFotos"){
    $objecte = new ProductosController();
    $objecte->LlistaProductoConFotos();
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="eliminar"){

    $objecte = new ProductosController();
    $objecte->CompruebaParaEliminar($_GET["producto"]);
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $objecte = new ProductosController();
    $objecte->MuestraModificarProducto($_GET["producto"]);
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    $objecte = new ProductosController();
    
    $ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/boxxi/imagenes/";
    
    if (isset($_FILES["foto1"])){
        $nombre_foto1 = $_FILES["foto1"]["name"];
        $tmp_foto1 = $_FILES["foto1"]["tmp_name"];
        $rutaFoto1 = $ruta_imagenes.$nombre_foto1;
        copy($tmp_foto1, $rutaFoto1);
    }else{
        $nombre_foto1=null;
    }
    if (isset($_FILES["foto2"])){
        $nombre_foto2 = $_FILES["foto2"]["name"];
        $tmp_foto2 = $_FILES["foto2"]["tmp_name"];
        $rutaFoto2 = $ruta_imagenes.$nombre_foto2;
        copy($tmp_foto2, $rutaFoto2);
    }else{
        $nombre_foto2=null;
    }

    if (isset($_FILES["foto3"])){
        $nombre_foto3 = $_FILES["foto3"]["name"];
        $tmp_foto3 = $_FILES["foto3"]["tmp_name"];
        $rutaFoto3 = $ruta_imagenes.$nombre_foto3;
        copy($tmp_foto3, $rutaFoto3);
    }else{
        $nombre_foto3=null;
    }
    
    $objecte->ModificarProducte(
                    $_POST["id"],
                    $_POST["nombre"],
                    $_POST["subtitulo"],
                    $_POST["stock"],
                    $_POST["precio"],
                    $_POST["descripcion"],
                    $nombre_foto1,
                    $nombre_foto2,
                    $nombre_foto3
                );
}


?>