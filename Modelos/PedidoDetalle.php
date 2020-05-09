<?php
    
    require_once "ConexionBD.php";
//GP
class PedidoDetalle{
    protected $id_pedido_detalle;
    protected $cantidad;
    protected $precio;
    protected $producto;
    

    protected $id_pedido; /**** */
    protected $id_producto; /**** */
    

    protected function registraPedidoDetalle(){
        

        $this->id_pedido = 1;    /**** ATENCIO-MILLORAR::  id_pedido, = l'ha de saber!*/
        $this->id_producto = 1;  /**** ATENCIO-MILLORAR::  id_producto, = l'ha de saber! */
        
        
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlPedidoDetalle = "INSERT INTO pedido_detalle (id_pedido_detalle, id_pedido, id_producto, cantidad, precio, producto) 
                    VALUES (null, :id_pedido, :id_producto, :cantidad, :precio, '$this->producto') ";
            $resultado = $conecta->getConexionBD()->prepare($sqlPedidoDetalle);
            $resultado->execute(array(
                                    ":id_pedido" => $this->id_pedido,
                                    ":id_producto" => $this->id_producto,
                                    ":cantidad" => $this->cantidad,
                                    ":precio" => $this->precio
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }

    protected function retornaPedidoDetallesTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM pedido_detalle";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    

    protected function retornaPedidoDetallesTODOTodas(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT pedido_detalle.id_pedido_detalle, 
                                    pedido_detalle.id_pedido,
                                        productos.nombre as nombreProductos,
                                            categorias.nombre as nombreCategorias,
                                                pedidos.fecha,
                                                    estados.nombre as nombreEstados,  
                                    pedido_detalle.cantidad,
                                    pedido_detalle.precio,
                                    pedido_detalle.producto
                                    FROM pedido_detalle
                                        INNER JOIN productos
                                            ON pedido_detalle.id_producto=productos.id_producto
                                        INNER JOIN pedidos
                                            ON pedido_detalle.id_pedido=pedidos.id_pedido
                                        INNER JOIN categorias
                                            ON productos.id_categoria = categorias.id_categoria
                                        INNER JOIN estados
                                            ON pedidos.id_estado = estados.id_estado";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

   

    protected function actualizaPedidoDetalles(){
        //poso a valor 1 (=sin nombre, com un "null")    /*** ATENCIO: codigo en PRODUCTOS */
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE pedido_detalle 
                                    SET id_producto = 1
                                    WHERE id_producto = '$this->id_producto'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }
    }


    
    
    protected function modificaPedidoDetalle(){
       
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE pedido_detalle
                                    SET cantidad = '$this->cantidad', precio = '$this->precio'
                                    WHERE id_pedido_detalle = '$this->id_pedido_detalle'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;  
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }


    }







}

//


?>