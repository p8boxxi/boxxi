<?php
    
    require_once "ConexionBD.php";
//GP
class PedidoDetalle{
    protected $id_pedido_detalle;
    protected $cantidad;
    protected $precio;
    protected $producto; //nombre
    
    
    protected $id_pedido; /**** */
    protected $id_producto; /**** */
    

    protected function registraPedidoDetalle($cantidad, $precio, $idProducto, $nombreProducto, $cliente, $idPedido){
        $this->setCantidad($cantidad);
        $this->setPrecio($precio);
        $this->setId_producto($idProducto);
        $this->setProducto($nombreProducto);
        
        if ($idPedido==null){
            try{    
                $conecta = new ConexionBD();
                $conecta->getConexionBD()->beginTransaction();
                $sqlPedido = "INSERT INTO pedidos (id_pedido, id_cliente, id_estado, fecha)
                                VALUES (null, $cliente,'2',now())";
                $resultado = $conecta->getConexionBD()->prepare($sqlPedido);
                $resultado->execute();
                $idInsertado = $conecta->getConexionBD()->lastInsertId();

                $sqlPedidoDetalle = "INSERT INTO pedido_detalle (id_pedido_detalle, id_pedido, id_producto, cantidad, precio, producto) 
                        VALUES (null, :id_pedido, :id_producto, :cantidad, :precio, :producto) ";
                $resultado = $conecta->getConexionBD()->prepare($sqlPedidoDetalle);
                $resultado->execute(array(
                                        ":id_pedido" => $idInsertado,
                                        ":id_producto" => $this->getId_producto(),
                                        ":cantidad" => $this->getCantidad(),
                                        ":precio" => $this->getPrecio(),
                                        ":producto" => $this->getProducto()
                                    ));
                $conecta->getConexionBD()->commit(); 
                return array(true, $idInsertado);
             }catch(Exception $excepcio){
                $conecta->getConexionBD()->rollback();  
                echo $excepcio->getMessage(); 
            }
        }else{
            try{    
                $conecta = new ConexionBD();
                $conecta->getConexionBD()->beginTransaction();
        
                $sqlPedidoDetalle = "INSERT INTO pedido_detalle (id_pedido_detalle, id_pedido, id_producto, cantidad, precio, producto) 
                        VALUES (null, :id_pedido, :id_producto, :cantidad, :precio, :producto) ";
                $resultado = $conecta->getConexionBD()->prepare($sqlPedidoDetalle);
                $resultado->execute(array(
                                        ":id_pedido" => $idPedido,
                                        ":id_producto" => $this->getId_producto(),
                                        ":cantidad" => $this->getCantidad(),
                                        ":precio" => $this->getPrecio(),
                                        ":producto" => $this->getProducto()
                                    ));
                $conecta->getConexionBD()->commit();  
                return array (true, $idPedido);
             }catch(Exception $excepcio){
                $conecta->getConexionBD()->rollback();  
                return false; 
            }
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


    //AP
    protected function retornaPedidoDetallesIdPedido(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM pedido_detalle
                                    WHERE id_pedido = '$this->id_pedido' ";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    //AZ
    protected function retornaPedidoDetallesClienteIdPedido(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM pedido_detalle
                                INNER JOIN productos
                                            ON pedido_detalle.id_producto=productos.id_producto
                                    WHERE id_pedido = '$this->id_pedido' ";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    //AZ
    protected function retornaPedidoDetallesAdminIdPedido(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM pedido_detalle
                                INNER JOIN productos
                                            ON pedido_detalle.id_producto=productos.id_producto
                                    WHERE id_pedido = '$this->id_pedido' ";
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



    public function getId_pedido_detalle()
    {
        return $this->id_pedido_detalle;
    }

  
    public function setId_pedido_detalle($id_pedido_detalle)
    {
        $this->id_pedido_detalle = $id_pedido_detalle;

        return $this;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }


    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public function getProducto()
    {
        return $this->producto;
    }

  
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    public function getId_pedido()
    {
        return $this->id_pedido;
    }

   
    public function setId_pedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;

        return $this;
    }

    public function getId_producto()
    {
        return $this->id_producto;
    }

    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;

        return $this;
    }

}

//


?>