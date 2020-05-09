<?php
    
    require_once "ConexionBD.php";
//GP
class Estado{
    protected $id_estado;
    protected $nombre;
    

    protected function registraEstado(){

       
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlEstados = "INSERT INTO estados (id_estado, nombre) 
                    VALUES (null, :nombre)";
            $resultado = $conecta->getConexionBD()->prepare($sqlEstados);
            $resultado->execute(array(
                                    ":nombre" => $this->nombre
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return false; 
        }
    }

    protected function retornaEstadosTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM estados";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }


    
    protected function eliminaEstado(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "DELETE FROM estados
                                    WHERE id_estado = '$this->id_estado'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;  
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }
    }

    protected function modificaEstado(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE estados
                                    SET nombre = '$this->nombre'
                                    WHERE id_estado = '$this->id_estado'";
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


?>