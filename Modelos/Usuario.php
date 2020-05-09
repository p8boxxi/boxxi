<?php
    
    require_once "ConexionBD.php";
//GP
class Usuario{
    protected $id_usuario;
    protected $email;
    protected $password;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $direccion;


    protected function registraUsuario(){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO usuarios (id_usuario, email, password, nombre, apellidos, telefono, direccion) 
                    VALUES (null, :email, :password, :nombre, :apellidos, :telefono, :direccion)";
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute(array(
                                    ":email" => $this->email,
                                    ":password" => $this->password,
                                    ":nombre" => $this->nombre,
                                    ":apellidos" => $this->apellidos,
                                    ":telefono" => $this->telefono,
                                    ":direccion" => $this->direccion
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback(); 
            return false; 
        }
    }

    protected function retornaUsuariosTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function BuscaUsuariPerEmail(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
                                    WHERE email = '$this->email'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }
    
    
    protected function modificaUsuari(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
                                    SET  email = '$this->email',
                                        password = '$this->password',
                                        nombre = '$this->nombre',
                                        apellidos = '$this->apellidos',
                                        telefono = '$this->telefono',
                                        direccion = '$this->direccion'
                                    WHERE id_usuario = '$this->id_usuario'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
        }
        
    }

}


?>