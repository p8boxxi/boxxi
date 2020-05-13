<?php

require "../Modelos/PedidoDetalle.php";

require_once "SesionesController.php";
$objecteSessions = new SesionesController();


class PedidoDetallesController extends PedidoDetalle{

    public function leeInfoPedidoDetalle($cantidad, $precio, $idProducto, $nombreProducto, $cliente, $idPedido){

        $ejecuta = $this->registraPedidoDetalle($cantidad, $precio, $idProducto, $nombreProducto, $cliente, $idPedido);

        return $ejecuta;
       
    }

    public function resultadoRegistraPedidoDetalle($resultat){
        if ($resultat){
            require "../Vistas/PedidoDetalle/Insertado.php";
        }else{
            require "../Vistas/PedidoDetalle/NoInsertado.php";
        } 
    }

    public function LlistaPedidoDetalles(){

        $Llistat = $this->retornaPedidoDetallesTodos();
        require "../Vistas/PedidoDetalle/verPedidoDetalle.php";
    }

    public function LlistaPedidoDetallesTODOTodas(){

        $Llistat = $this->retornaPedidoDetallesTODOTodas();
        require "../Vistas/PedidoDetalle/verPedidoDetalleTODO.php";
    }


    public function CompruebaParaActualizar($producto){
        $this->id_producto=$producto;     
        return $actualitzat = $this->actualizaPedidoDetalles()?true:false;
    }
    

    public function MuestraModificarPedidoDetalle($id){

        header("location: ../Vistas/PedidoDetalle/modificarPedidoDetalle.php?id=$id"); 
    }
    public function ModificarPedidoDetalle($id, $cantidad, $precio){

        $this->id_pedido_detalle = $id;
        $this->cantidad = $cantidad;
        $this->precio = $precio;

        

      $this->resultadoModificaPedidoDetalle($this->modificaPedidoDetalle());
    }
    public function resultadoModificaPedidoDetalle($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Pedido_detalle Modificado</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>El Pedido_detalle NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }

    public function preparaPedidoDetalle($cantidad, $precio, $idPedido, $idProducto){
        echo "EEEEEE";
    }

}




// if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){




//     // $nuevoObjeto = new PedidoDetallesController();

//     //                             /** ATENCIO:   producto s'ha de llegir de la tabla PRODUCTO!!! */
//     // $nuevoObjeto->leeInfoPedidoDetalle(
//     //                 $_POST["cantidad"],
//     //                 $_POST["precio"],
//     //                 $_POST["producto"]
//     //             );



// }

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new PedidoDetallesController();
    $objecte->LlistaPedidoDetalles();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="verTODO"){
    $objecte = new PedidoDetallesController();
    $objecte->LlistaPedidoDetallesTODOTodas();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $objecte = new PedidoDetallesController();
    $objecte->MuestraModificarPedidoDetalle($_GET["id_pedido_detalle"]);
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    $objecte = new PedidoDetallesController();
    
    $objecte->ModificarPedidoDetalle(
                    $_POST["id"],
                    $_POST["cantidad"],
                    $_POST["precio"]
                );
}



?>