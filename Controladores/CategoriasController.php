<?php

if (file_exists("../Modelos/Categoria.php")){
    require_once "../Modelos/Categoria.php";
}

if (file_exists("../../Modelos/Categoria.php")){
    require_once "../../Modelos/Categoria.php";
}


//GP
if (file_exists("../Controladores/SesionesController.php")){
    require_once "../Controladores/SesionesController.php";
}
if (file_exists("../../Controladores/SesionesController.php")){
    require_once "../../Controladores/SesionesController.php";
}

$objecteSessio = new SesionesController();


class CategoriasController extends Categoria{

    public function leeInfoCategoria($nombre){
       $this->resultadoRegistraCategoria($this->registraCategoria($nombre));
    }

    public function resultadoRegistraCategoria($resultat){
        if ($resultat){
            require "../Vistas/Categoria/Insertado.php";
        }else{
            require "../Vistas/Categoria/NoInsertado.php";
        } 
    }

    public function LlistaCategorias(){

        $Llistat = $this->retornaCategoriasTodos();
        require "../Vistas/Categoria/verCategoria.php";
    }

    public function CompruebaParaEliminar($categoria){
        require "ProductosController.php";
        $productos = new ProductosController();

        if ($productos->CompruebaParaActualizar($categoria)){
            $this->eliminaLaCategoria($categoria);
        }else{
            require "../Vistas/Categoria/NoEliminable.php";
        }

    }

    public function eliminaLaCategoria($categoria){
        if ($this->eliminaCategoria($categoria)){
            require "../Vistas/Categoria/Eliminado.php"; 
        }else{
            require "../Vistas/Categoria/NoEliminado.php";
        }
    }

    public function MuestraModificarCategoria($id){

        header("location: ../Vistas/Categoria/modificarCategoria.php?id=$id"); 
     }

    
    public function ModificarCategoria($id, $nombre){
        $this->resultadoModificaCategoria($this->modificaCategoria($id, $nombre));
     }

     public function resultadoModificaCategoria($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Categoría Modificada</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La Categoría NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }


    public function selectCategorias(){
        return $this->retornaCategoriasTodos();
    }



}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["nombre"]) && !empty($_POST["nombre"])){
        $Categoria = new CategoriasController();
        $Categoria->leeInfoCategoria($_POST["nombre"]);
    }else{
        echo "Operación No posible";
    }
    
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $Categoria = new CategoriasController();
    $Categoria->LlistaCategorias();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="elimina"){
    if (isset($_GET["categoria"]) && !empty($_GET["categoria"])){
        $Categoria = new CategoriasController();
        $Categoria->CompruebaParaEliminar($_GET["categoria"]);
    }else{
        echo "Operación No disponible";
    }
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    if (isset($_GET["categoria"]) && !empty($_GET["categoria"])){
        $Categoria = new CategoriasController();
        $Categoria->MuestraModificarCategoria($_GET["categoria"]);
    }else{
        echo "Operación No disponible";
    }
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["id"]) && !empty($_POST["id"])){
        $Categoria = new CategoriasController();
        $Categoria->ModificarCategoria($_POST["id"],$_POST["nombre"]);
    } else{
        echo "Operación No disponible";
    }
    
}

?>