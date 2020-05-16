<?php

if (file_exists("/Modelos/Pedido.php")){
    require_once "/Modelos/Pedido.php";
}
if (file_exists("../Modelos/Pedido.php")){
    require_once "../Modelos/Pedido.php";
}
if (file_exists("../../Modelos/Pedido.php")){
    require_once "../../Modelos/Pedido.php";
}

require_once "SesionesController.php";
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

    // //AP
    // public function leeInfoPedidoComprar($cliente, $estado, $producto){
    //     // $this->id_cliente = $_SESSION["id_usuario"];
    //     // $this->id_estado = $estado;
    //     // //$this->fecha = $fecha;
    //     // $this->id_producto = $producto;
    //     $this->resultadoRegistraPedidoComprar($this->registraPedido($cliente, $estado), $producto);
    // }

    //AP
    public function leeInfoPedidoComprar($idPedido){
        $this->id_pedido = $idPedido;
        $this->resultadoRegistraPedidoComprar($this->registraPedido($cliente, $estado), $producto);
    }


    //AP
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

    //AZ
    public function pedidosCliente(){
        $Llistat = $this->retornaPedidosCliente($_SESSION["id_usuario"]);
        require_once "../../Vistas/Pedido/cliente-pedidos.php";
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
            require "../Vistas/Pedido/contenidoCistella.php";
        }else{
            echo "Error!";
        }
        
    }else{
        echo "Defina la cantidad!";
    }
     
    $cliente = $_SESSION["id_cliente"];



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
            $pedidodetalle = new PedidoDetallesController();
            $pedidodetalle->leeInfoPedidoDetalleId($idPedido);
        }else{
            require "../Vistas/Pedido/NoInsertado.php";
        }   
    }else{
        echo "DEBE LOGUEARSE!!";
    }
$_SESSION["id_pedido"]= $idPedido;
unset($_SESSION['carro']);
}



//AP
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