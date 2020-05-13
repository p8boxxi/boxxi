<?php

require "../Modelos/Pedido.php";

require "SesionesController.php";
$objecteSessions = new SesionesController();

if (!isset($_SESSION["cistella"])){
    $_SESSION["cistella"]= new Cistella();
}

class PedidosController extends Pedido{

    public function leeInfoPedido($cliente, $estado){

        $this->resultadoRegistraPedido($this->registraPedido($cliente, $estado));
    }

    public function resultadoRegistraPedido($resultat){
        if ($resultat){
            require "../Vistas/Pedido/Insertado.php";
        }else{
            require "../Vistas/Pedido/NoInsertado.php";
        } 
    }

    public function LlistaPedidos(){

        $Llistat = $this->retornaPedidosTodos();
        require "../Vistas/Pedido/verPedido.php";
    }



    public function CompruebaParaCambiarEstadoDel($id, $operacion){
        if ($operacion == "cancelar"){
            //PEDIDO:"cancelado":
            if ($this->actualizaPedido($id, $operacion)){
                require "../Vistas/Pedido/Actualizado.php";
            }else{
                require "../Vistas/Pedido/NoActualizado.php";
            }
        }else{
            require "../Vistas/Pedido/NoActualizable.php";
        }

    }


    public function MuestraModificarPedido($id){
        header("location: ../Vistas/Pedido/modificarPedido.php?id=$id"); 
    }

    public function ModificarPedido($id, $fecha){
       
         $this->id_pedido = $id;
         $this->fecha = $fecha;
        
         

       $this->resultadoModificaPedido($this->modificaPedido($id, $fecha));
    }
    public function resultadoModificaPedido($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Pedido Modificado</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>El Pedido NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }

}





if(isset($_POST["operacio"]) && $_POST["operacio"]=="anadirApedido"){
    
    if (isset($_POST["cantidad"]) && !empty($_POST["cantidad"])){
        if (isset($_SESSION["cistella"])){
            $_SESSION["cistella"]->posaProducteCistella($_POST["producto"], $_POST["cantidad"]);  
            header("location: ../Vistas/Pedido/insertarPedido.php");
        }else{
            echo "Error!";
        }
        
    }else{
        echo "Defina la cantidad!";
    }
     

    $cliente = $_SESSION["id_cliente"];



}



if(isset($_GET["accio"]) && $_GET["accio"]=="creaPedido"){

    $estado = 2;  /**** ATENCION: 2?, por defecto (pedido nuevo)!!  */
    
    if(isset($_SESSION["id_cliente"]) && isset($_SESSION["carro"])){
        $vector = $_SESSION["carro"];
        require "PedidoDetallesController.php";
        $pedidodetalle = new PedidoDetallesController();

        for($i=0;$i<count($vector);$i+=4){
            if ($i<4){
                $idPedido = null;
            }else{
                $idPedido = $valorRetornat[1];
            }
            
            $valorRetornat=$pedidodetalle->leeInfoPedidoDetalle($vector[$i+3], $vector[$i+2], $vector[$i], $vector[$i+1], $_SESSION["id_cliente"], $idPedido); 
        }
        if ($valorRetornat[0]){
            require "../Vistas/Pedido/Insertado.php";
        }else{
            require "../Vistas/Pedido/Insertado.php";
        }   
    }else{
        echo "DEBE LOGUEARSE!!";
    }

}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new PedidosController();
    $objecte->LlistaPedidos();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="cancelar"){
    if (isset($_GET["pedido"]) && !empty($_GET["pedido"])){
        $objecte = new PedidosController();
        $objecte->CompruebaParaCambiarEstadoDel($_GET["pedido"], $_GET["operacio"]);
    }else{
        echo "Operación No permitida";
    }
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    if (isset($_GET["pedido"]) && !empty($_GET["pedido"])){
        $pedido = new PedidosController();
        $pedido->MuestraModificarPedido($_GET["pedido"]);
    }else{
        echo "Operación No permitida";
    }
    
}

if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    if (isset($_POST["id"]) && !empty($_POST["id"]) && isset($_POST["fecha"]) && !empty($_POST["fecha"])){
        $pedido = new PedidosController();
        $pedido->ModificarPedido($_POST["id"], $_POST["fecha"]);
    }else{
        echo "Operación No permitida";
    }
}




?>