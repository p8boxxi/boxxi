<?php

require_once "../Modelos/Categoria.php";
//GP
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();


class CategoriasController extends Categoria{

    public function leeInfoCategoria($nombre){
       $this->nombre = $nombre;

       $this->resultadoRegistraCategoria($this->registraCategoria());
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
        $this->id_categoria = $categoria;

        require "ProductosController.php";
        $productos = new ProductosController();

        if ($productos->CompruebaParaActualizar($this->id_categoria)){
            $this->eliminaLaCategoria();
        }else{
            require "../Vistas/Categoria/NoEliminable.php";
        }

    }

    public function eliminaLaCategoria(){
        if ($this->eliminaCategoria()){
            require "../Vistas/Categoria/Eliminado.php"; 
        }else{
            require "../Vistas/Categoria/NoEliminado.php";
        }
    }

    public function MuestraModificarCategoria($id){

        header("location: ../Vistas/Categoria/modificarCategoria.php?id=$id"); 
     }

    
    public function ModificarCategoria($id, $nombre){

        $this->id_categoria = $id;
        $this->nombre = $nombre;

        $this->resultadoModificaCategoria($this->modificaCategoria());
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




}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $Categoria = new CategoriasController();
    $Categoria->leeInfoCategoria(
                    $_POST["nombre"]
                );
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $Categoria = new CategoriasController();
    $Categoria->LlistaCategorias();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="elimina"){
    $Categoria = new CategoriasController();
    $Categoria->CompruebaParaEliminar($_GET["categoria"]);
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $Categoria = new CategoriasController();
    $Categoria->MuestraModificarCategoria($_GET["categoria"]);
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    $Categoria = new CategoriasController();

    $Categoria->ModificarCategoria(
                    $_POST["id"],
                    $_POST["nombre"]
                );
}



?>