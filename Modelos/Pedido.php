<?php
    
    require_once "ConexionBD.php";
//GP
class Pedido{
    protected $id_pedido;
    
    protected $fecha;
    

    protected $id_cliente; /**** */
    protected $id_estado; /**** */
    

    protected function registraPedido(){
        $this->fecha = date("Y-m-d H:i:s");

        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlPedido = "INSERT INTO pedidos (id_pedido, id_cliente, id_estado, fecha) 
                    VALUES (null, :id_cliente, :id_estado, :fecha)";
            $resultado = $conecta->getConexionBD()->prepare($sqlPedido);
            $resultado->execute(array(
                                    ":id_cliente" => $this->id_cliente,
                                    ":id_estado" => $this->id_estado,
                                    ":fecha" => $this->fecha
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }

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

    
    protected function actualizaPedido($operacion){
        if ($operacion == "cancelar"){
            //poso a valor 1 (=CANCELADO) 
            try{
                $conecta = new ConexionBD();
                $conecta->getConexionBD()->beginTransaction();
                $sentenciaSQL = "UPDATE pedidos SET id_estado = 1 WHERE id_pedido = '$this->id_pedido'";
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


    protected function modificaPedido(){
        $fecha = explode("/",$this->fecha);
        $fecha=$fecha[2]."-".$fecha[1]."-".$fecha[0];

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE pedidos 
                                    SET  fecha = '$fecha'
                                    WHERE id_pedido = '$this->id_pedido'";
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