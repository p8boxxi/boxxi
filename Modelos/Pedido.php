<?php
    
    require_once "ConexionBD.php";
//GP
class Pedido{
    protected $id_pedido;
    
    protected $fecha;
    

    protected $id_cliente; /**** */
    protected $id_estado; /**** */
    

    protected function registraPedido($cliente, $estado){
        $this->setId_cliente($cliente);
        $this->setId_estado($estado);
        $this->setFecha(date("Y-m-d H:i:s"));

        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlPedido = "INSERT INTO pedidos (id_pedido, id_cliente, id_estado, fecha) 
                    VALUES (null, :id_cliente, :id_estado, :fecha)";
            $resultado = $conecta->getConexionBD()->prepare($sqlPedido);
            $resultado->execute(array(
                                    ":id_cliente" => $this->getId_cliente(),
                                    ":id_estado" => $this->getId_estado(),
                                    ":fecha" => $this->getFecha()
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }

    // //////  AP
    // protected function registraPedidoVisitante($estado){
    //     $this->setId_estado($estado);
    //     $this->setFecha(date("Y-m-d H:i:s"));

    //     try{    
    //         $conecta = new ConexionBD();
    //         $conecta->getConexionBD()->beginTransaction();
    //         $sqlPedido = "INSERT INTO pedidos (id_pedido, id_cliente, id_estado, fecha) 
    //                 VALUES (null, 1, :id_estado, :fecha)";
    //         $resultado = $conecta->getConexionBD()->prepare($sqlPedido);
    //         $resultado->execute(array(
                                    
    //                                 ":id_estado" => $this->getId_estado(),
    //                                 ":fecha" => $this->getFecha()
    //                             ));
    //         $conecta->getConexionBD()->commit();  
    //         return true;
    //      }catch(Exception $excepcio){
    //         $conecta->getConexionBD()->rollback();  
    //         return false; 
    //     }
    // }


    protected function retornaPedidosTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM pedidos";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    //AZ
    protected function retornaPedidosCliente($id){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM pedidos INNER JOIN estados 
                                        ON pedidos.id_estado=estados.id_estado
                                        WHERE id_cliente = '$id'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    
    protected function actualizaPedido($id, $operacion){
        if ($operacion == "cancelar"){
            //poso a valor 1 (=CANCELADO) 
            try{
                $conecta = new ConexionBD();
                $conecta->getConexionBD()->beginTransaction();
                $sentenciaSQL = "UPDATE pedidos SET id_estado = 1 WHERE id_pedido = $id";
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

    //AP
    protected function actualizaPedidoComprado(){
            try{
                $conecta = new ConexionBD();
                $conecta->getConexionBD()->beginTransaction();
                $sentenciaSQL = "UPDATE pedidos SET id_estado = 3 WHERE id_pedido = $this->id_pedido";
                $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
                $intencio->execute();
                $conecta->getConexionBD()->commit();
                return true;
            }catch(Exception $excepcio){
                $conecta->getConexionBD()->rollback();  
                return false;  
            }
                
    }


    protected function modificaPedido($id, $fecha){
        $fecha = explode("/",$this->fecha);
        $fecha=$fecha[2]."-".$fecha[1]."-".$fecha[0];

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE pedidos 
                                    SET  fecha = '$fecha'
                                    WHERE id_pedido = '$id'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }
        
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

    public function getFecha()
    {
        return $this->fecha;
    }


    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    public function getId_estado()
    {
        return $this->id_estado;
    }

    public function setId_estado($id_estado)
    {
        $this->id_estado = $id_estado;

        return $this;
    }

}

//


?>