<?php

require_once "../Modelos/Estado.php";
//GP
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();


class EstadosController extends Estado{

    public function leeInfoEstado($nombre){
       $this->resultadoRegistraEstado($this->registraEstado($nombre));
    }

    public function resultadoRegistraEstado($resultat){
        if ($resultat){
            require "../Vistas/Estado/Insertado.php";
        }else{
            require "../Vistas/Estado/NoInsertado.php";
        } 
    }

    public function LlistaEstados(){
        $Llistat = $this->retornaEstadosTodos();
        require "../Vistas/Estado/verEstado.php";
    }

    public function MuestraModificarEstado($id){
        header("location: ../Vistas/Estado/modificarEstado.php?id=$id"); 
    }

    public function ModificarEstado($id, $nombre){
       $this->resultadoModificaEstado($this->modificaEstado($id, $nombre));
    }
    public function resultadoModificaEstado($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Estado Modificado</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>El Estado NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }







}



if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["nombre"]) && !empty($_POST["nombre"])){
        $objecte = new EstadosController();
        $objecte->leeInfoEstado($_POST["nombre"]);
    }else{
        echo "Operación No posible";
    }
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new EstadosController();
    $objecte->LlistaEstados();
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    if (isset($_GET["id_estado"]) && !empty($_GET["id_estado"])){
        $estado = new EstadosController();
        $estado->MuestraModificarEstado($_GET["id_estado"]);
    }else{
        echo "Operación No disponible";
    }
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["id"]) && !empty($_POST["id"])){
        $estado = new EstadosController();
        $estado->ModificarEstado($_POST["id"],$_POST["nombre"]);
    } else{
        echo "Operación No disponible";
    }
}

?>