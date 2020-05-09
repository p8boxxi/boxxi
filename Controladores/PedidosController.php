<?php

require "../Modelos/Pedido.php";

require "SesionesController.php";
$objecteSessions = new SesionesController();

class PedidosController extends Pedido{

    public function leeInfoPedido($estado, $fecha){
        $this->id_cliente = $_SESSION["id_usuario"];
        $this->id_estado = $estado;
        $this->fecha = $fecha;
        $this->resultadoRegistraPedido($this->registraPedido());
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
        $this->id_pedido = $id;
        if ($operacion == "cancelar"){
            //PEDIDO:"cancelado":
            if ($this->actualizaPedido($operacion)){
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
        //$this->id_usuario = $usuario;
        //$this->id_estado = $estado;
        
         $this->id_pedido = $id;
         $this->fecha = $fecha;
        
         

       $this->resultadoModificaPedido($this->modificaPedido());
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





if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $nuevoObjeto = new PedidosController();
    $estado = 1;  /**** ATENCIO: llega por INPUT!!  */
    
    $nuevoObjeto->leeInfoPedido(
                    $estado,
                    $_POST["fecha"]
                );
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new PedidosController();
    $objecte->LlistaPedidos();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="cancelar"){
    $objecte = new PedidosController();
    $objecte->CompruebaParaCambiarEstadoDel($_GET["pedido"], $_GET["operacio"]);
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $pedido = new PedidosController();
    $pedido->MuestraModificarPedido($_GET["pedido"]);
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    $pedido = new PedidosController();
   
    $pedido->ModificarPedido(
                    $_POST["id"], //$id_usuario, $id_estado,
                    $_POST["fecha"]
                );
}



?>