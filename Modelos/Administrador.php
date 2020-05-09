<?php
    
    require_once "ConexionBD.php";
//GP
class Administrador{
    protected $id_usuario;
    protected $email;
    protected $password;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $direccion;

    protected $id_administrador;
    
    protected function registraAdministrador(){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlUsuario = "INSERT INTO usuarios (id_usuario, email, password, nombre, apellidos, telefono, direccion) 
                    VALUES (null, :email, :password, :nombre, :apellidos, :telefono, :direccion)";
            $resultado = $conecta->getConexionBD()->prepare($sqlUsuario);
            $resultado->execute(array(
                                    ":email" => $this->email,
                                    ":password" => $this->password,
                                    ":nombre" => $this->nombre,
                                    ":apellidos" => $this->apellidos,
                                    ":telefono" => $this->telefono,
                                    ":direccion" => $this->direccion
                                ));
            
            $idInsertado = $conecta->getConexionBD()->lastInsertId();
                       
            $sqlAdministrador = "INSERT INTO administradores (id_administrador, id_usuario) 
                        VALUES (null, :id_usuario)";
            $resultado = $conecta->getConexionBD()->prepare($sqlAdministrador);
            $resultado->execute(array(
                            ":id_usuario" => $idInsertado
                        ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return false;  
        }
    }


    protected function retornaAdministradoresTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
                                        INNER JOIN administradores 
                                        ON administradores.id_usuario=usuarios.id_usuario";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    public function buscaSiExiste($id){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT id_administrador FROM administradores
                                        WHERE id_usuario = '$id'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }





    
}


?>