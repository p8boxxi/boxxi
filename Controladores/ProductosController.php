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
       $this->resultadoRegistraProducto($this->registraProducto($categoria, $nombre, $subtitulo, $stock, $precio, $descripcion, $foto1, $foto2, $foto3));
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
        if (file_exists("Vistas/Producto/verProducto.php")){
            require_once "Vistas/Producto/verProducto.php";
        }
        if (file_exists("../Vistas/Producto/verProducto.php")){
            require_once "../Vistas/Producto/verProducto.php";
        }
    }

    //AZ
    public function ProductoPor($id){

        $Llistat = $this->retornaProducto($id);
        if (file_exists("Vistas/Producto/verProductoFicha.php")){
            require_once "Vistas/Producto/verProductoFicha.php";
        }
        if (file_exists("../Vistas/Producto/verProductoFicha.php")){
            require_once "../Vistas/Producto/verProductoFicha.php";
        }
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
    public function LlistaProductoHomeCategoria($categoria){

        $Llistat = $this->retornaProductosCategoria($categoria);
        $categoriaProd= $categoria;
        require "../../Vistas/Producto/verProductoHome.php";
    }



    public function CompruebaParaActualizar($categoria){
        return $actualiza = $this->actualizaProducto($categoria)?true:false;
    }

    public function CompruebaParaEliminar($producto){
        require "PedidoDetallesController.php";
        $pedidoDetalle = new PedidoDetallesController();
        if ($pedidoDetalle->CompruebaParaActualizar($producto)){
           $this->eliminaElProducto($producto);
        }else{
            require "../Vistas/Producto/NoEliminable.php";
        }
    }

    public function eliminaElProducto($producto){
        if ($this->eliminaProducto($producto)){
            require "../Vistas/Producto/Eliminado.php";
        }else{
            require "../Vistas/Producto/NoEliminado.php";
        }
    }

    public function MuestraModificarProducto($id){

        $Llistat = $this->retornaProducto($id);
        if (file_exists("Vistas/Producto/modificarProducto.php")){
            require_once "Vistas/Producto/modificarProducto.php";
        }
        if (file_exists("../Vistas/Producto/modificarProducto.php")){
            require_once "../Vistas/Producto/modificarProducto.php";
        }



    }

    public function ModificarProducte($id, $nombre, $subtitulo, $stock, $precio, $descripcion, $foto1, $foto2, $foto3){
       $this->resultadoModificaProducte($this->modificaProducto($id, $nombre, $subtitulo, $stock, $precio, $descripcion, $foto1, $foto2, $foto3));
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

    //AP
    public function ProductoDetalle($producto){
        $this->id_producto = $producto;
        $Llistat = $this->retornaProductoDetalle();
        require "../Vistas/Producto/verProductoDetalle.php";
    }
    //AP
    public function ProductoDetalleComprar($producto){
        $this->id_producto = $producto;
        $obj = $this->retornaProductoDetalle();
        require "../Vistas/Pedido/verPedidoComprar.php";
    }
    //AP
    public function ProductoDetalleComprarInfo($producto){
        $this->id_producto = $producto;
        $detallsProducte = $this->retornaProductoDetalle();
    }


    public function selectProducto(){
        return $this->retornaProductosTodos();
    }

    public function retornaInfoProducto($id){
        $this->id_producto = $id;
        return $this->retornaProducto($id);
    }


}



if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){

    if (isset($_POST["categoria"]) && isset($_POST["nombre"]) && isset($_POST["subtitulo"]) && isset($_POST["stock"]) && isset($_POST["precio"]) && isset($_POST["descripcion"])){
        if (!empty($_POST["categoria"]) && !empty($_POST["nombre"]) && !empty($_POST["subtitulo"]) && !empty($_POST["stock"]) && !empty($_POST["precio"]) && !empty($_POST["descripcion"])){

            if (!file_exists($_SERVER["DOCUMENT_ROOT"]."/Vistas/assets/img/productos/")){
                mkdir($_SERVER["DOCUMENT_ROOT"]."/Vistas/assets/img/productos/");
            }
            $ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/Vistas/assets/img/productos/";

            if (isset($_FILES["foto1"]) && ($_FILES["foto1"]["name"])!=null){
                $nombre_foto1 = $_FILES["foto1"]["name"];
                $tmp_foto1 = $_FILES["foto1"]["tmp_name"];
                $rutaFoto1 = $ruta_imagenes.$nombre_foto1;
                copy($tmp_foto1, $rutaFoto1);
            }else{
                $nombre_foto1=null;
            }
            if (isset($_FILES["foto2"]) && ($_FILES["foto2"]["name"])!=null){
                $nombre_foto2 = $_FILES["foto2"]["name"];
                $tmp_foto2 = $_FILES["foto2"]["tmp_name"];
                $rutaFoto2 = $ruta_imagenes.$nombre_foto2;
                copy($tmp_foto2, $rutaFoto2);
            }else{
                $nombre_foto2=null;
            }
            if (isset($_FILES["foto3"])  && ($_FILES["foto2"]["name"])!=null){
                $nombre_foto3 = $_FILES["foto3"]["name"];
                $tmp_foto3 = $_FILES["foto3"]["tmp_name"];
                $rutaFoto3 = $ruta_imagenes.$nombre_foto3;
                copy($tmp_foto3, $rutaFoto3);
            }else{
                $nombre_foto3=null;
            }

            $nuevoObjeto = new ProductosController();
            $nuevoObjeto->leeInfoProducto($_POST["categoria"],$_POST["nombre"],$_POST["subtitulo"],$_POST["stock"],$_POST["precio"],$_POST["descripcion"],$nombre_foto1,$nombre_foto2,$nombre_foto3);
        }
        else{
            echo "Faltan Los datos!<br>";
        }
    }else{
        echo "Operacion No permitida";
        //header("location: index.php");
    }
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new ProductosController();
    $objecte->LlistaProducto();
}

//AZ
if(isset($_GET["operacio"]) && $_GET["operacio"]=="verDetalle"){
    if (isset($_GET["producto"])) {
        $objecte = new ProductosController();
        $objecte->ProductoPor($_GET["producto"]);
    }
}

//AZ
if(isset($_GET["operacio"]) && $_GET["operacio"]=="verFotos"){
    $objecte = new ProductosController();
    $objecte->LlistaProductoConFotos();
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="eliminar"){
    if (isset($_GET["producto"]) && !empty(($_GET["producto"]))){
        $objecte = new ProductosController();
        $objecte->CompruebaParaEliminar($_GET["producto"]);
    }else{
        echo "operación NO permitida";
    }

}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    if (isset($_GET["producto"]) && !empty(($_GET["producto"]))){
        $objecte = new ProductosController();
        $objecte->MuestraModificarProducto($_GET["producto"]);
    }else{
        echo "Operación No permitida";
    }
}

if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){

    if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["subtitulo"]) && isset($_POST["stock"]) && isset($_POST["precio"]) && isset($_POST["descripcion"])){
        if (!empty($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["subtitulo"]) && !empty($_POST["stock"]) && !empty($_POST["precio"]) && !empty($_POST["descripcion"])){

            if (!file_exists($_SERVER["DOCUMENT_ROOT"]."/boxxi/imagenes/")){
                mkdir($_SERVER["DOCUMENT_ROOT"]."/boxxi/imagenes/");
            }
            $ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/boxxi/imagenes/";

            if (isset($_FILES["foto1"]) && ($_FILES["foto1"]["name"])!=null){
                $nombre_foto1 = $_FILES["foto1"]["name"];
                $tmp_foto1 = $_FILES["foto1"]["tmp_name"];
                $rutaFoto1 = $ruta_imagenes.$nombre_foto1;
                copy($tmp_foto1, $rutaFoto1);
            }else{
                $nombre_foto1=null;
            }
            if (isset($_FILES["foto2"]) && ($_FILES["foto2"]["name"])!=null){
                $nombre_foto2 = $_FILES["foto2"]["name"];
                $tmp_foto2 = $_FILES["foto2"]["tmp_name"];
                $rutaFoto2 = $ruta_imagenes.$nombre_foto2;
                copy($tmp_foto2, $rutaFoto2);
            }else{
                $nombre_foto2=null;
            }
            if (isset($_FILES["foto3"])  && ($_FILES["foto2"]["name"])!=null){
                $nombre_foto3 = $_FILES["foto3"]["name"];
                $tmp_foto3 = $_FILES["foto3"]["tmp_name"];
                $rutaFoto3 = $ruta_imagenes.$nombre_foto3;
                copy($tmp_foto3, $rutaFoto3);
            }else{
                $nombre_foto3=null;
            }

            $nuevoObjeto = new ProductosController();
            $nuevoObjeto->ModificarProducte($_POST["id"],$_POST["nombre"],$_POST["subtitulo"],$_POST["stock"],$_POST["precio"],$_POST["descripcion"],$nombre_foto1,$nombre_foto2,$nombre_foto3);
        }
        else{
            echo "Faltan Los datos!<br>";
        }
    }else{
        echo "Operacion No permitida";
        //header("location: index.php");
    }

}

////////  AP
if(isset($_GET["operacio"]) && $_GET["operacio"]=="verProductoDetalle"){
    $objecte = new ProductosController();
    $objecte->ProductoDetalle($_GET["producto"]);
}

//AP
if(isset($_GET["operacio"]) && $_GET["operacio"]=="verProductoCat"){
    $objecte = new ProductosController();
    $objecte->LlistaProductoHomeCategoria($_GET["categoria"]);
}


?>
