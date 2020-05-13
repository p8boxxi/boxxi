<?php

require "../Modelos/Pedido.php";

require "SesionesController.php";
$objecteSessions = new SesionesController();

class PedidosController extends Pedido{

    public function leeInfoPedido($cliente, $estado){
        $this->id_cliente = $_SESSION["id_usuario"];
        $this->id_estado = $estado;
        //$this->fecha = $fecha;

        $this->resultadoRegistraPedido($this->registraPedido($cliente, $estado));
    }
        
    public function resultadoRegistraPedido($resultat){
        if ($resultat){
            require "../Vistas/Pedido/Insertado.php";
        }else{
            require "../Vistas/Pedido/NoInsertado.php";
        } 
    }


    public function leeInfoPedidoComprar($cliente, $estado, $producto){
        $this->id_cliente = $_SESSION["id_usuario"];
        $this->id_estado = $estado;
        //$this->fecha = $fecha;
        $this->id_producto = $producto;
        $this->resultadoRegistraPedidoComprar($this->registraPedido($cliente, $estado), $producto);
    }


    public function resultadoRegistraPedidoComprar($resultat, $producto){
        if ($resultat){
            require "ProductosController.php";
            $obj = new ProductosController();
            $obj->ProductoDetalleComprar($producto);
            //require "../Vistas/PedidoDetalle/ConfirmarCompra.php";
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
        //$this->id_usuario = $usuario;
        //$this->id_estado = $estado;
        
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





if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    
    $estado = 1;  /**** ATENCION: por defecto!!  */

    $cliente = $_SESSION["id_usuario"];

    if (isset($_SESSION["id_usuario"]) && !empty($_SESSION["id_usuario"])){
        $cliente = $_SESSION["id_usuario"];
        $nuevoObjeto = new PedidosController();
        $nuevoObjeto->leeInfoPedido($cliente, $estado);
    }else{
        echo "Operación No permitida";
        header ("location: index.php");
    }
}

if(isset($_POST["operacio"]) && $_POST["operacio"]=="comprar"){
    $estado = 1;  /**** ATENCION: por defecto!!  */

    $producto = $_POST['id'];
    $cliente = $_SESSION["id_usuario"];

    if (isset($_SESSION["id_usuario"]) && !empty($_SESSION["id_usuario"])){
        $cliente = $_SESSION["id_usuario"];
        $nuevoObjeto = new PedidosController();
        $nuevoObjeto->leeInfoPedidoComprar($cliente, $estado, $producto);
    }else{
        echo "Operación No permitida";
        header ("location: index.php");
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