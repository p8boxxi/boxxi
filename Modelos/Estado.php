<?php
    
    require_once "ConexionBD.php";
//GP
class Estado{
    protected $id_estado;
    protected $nombre;
    

    protected function registraEstado($nombre){
        $this->setNombre($nombre);
       
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlEstados = "INSERT INTO estados (id_estado, nombre) 
                    VALUES (null, :nombre)";
            $resultado = $conecta->getConexionBD()->prepare($sqlEstados);
            $resultado->execute(array(
                                    ":nombre" => $this->getNombre()
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

    protected function modificaEstado($id, $nombre){
        $this->setId_estado($id);
        $this->setNombre($nombre);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE estados
                                    SET nombre = :nombre
                                    WHERE id_estado = :estado";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(":nombre" => $this->getNombre(), ":categoria" => $this->getId_estado()));
            $conecta->getConexionBD()->commit();
            return true;  
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}


?>