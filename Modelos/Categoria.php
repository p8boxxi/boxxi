<?php
    
    require_once "ConexionBD.php";
//GP
class Categoria{
    protected $id_categoria;
    protected $nombre;
    
    protected function registraCategoria(){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlCategoria = "INSERT INTO categorias (id_categoria, nombre) 
                    VALUES (null, :nombre)";
            $resultado = $conecta->getConexionBD()->prepare($sqlCategoria);
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

    protected function retornaCategoriasTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM Categorias";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }

    
    protected function eliminaCategoria(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "DELETE FROM categorias
                                    WHERE id_categoria = '$this->id_categoria'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;  
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }
    }

    protected function modificaCategoria(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE categorias
                                    SET nombre = '$this->nombre'
                                    WHERE id_categoria = '$this->id_categoria'";
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