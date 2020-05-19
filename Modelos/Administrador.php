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
    
    protected function registraAdministrador($email, $password, $nombre, $apellidos, $telefono, $direccion){
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setTelefono($telefono);
        $this->setDireccion($direccion);
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlUsuario = "INSERT INTO usuarios (id_usuario, email, password, nombre, apellidos, telefono, direccion) 
                    VALUES (null, :email, :password, :nombre, :apellidos, :telefono, :direccion)";
            $resultado = $conecta->getConexionBD()->prepare($sqlUsuario);
            $resultado->execute(array(
                                    ":email" => $this->getEmail(),
                                    ":password" => $this->getPassword(),
                                    ":nombre" => $this->getNombre(),
                                    ":apellidos" => $this->getApellidos(),
                                    ":telefono" => $this->getTelefono(),
                                    ":direccion" => $this->getDireccion()
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

    protected function buscaSiExiste($id){
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

    protected function buscaAdministrador($id){
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


    protected function buscaIdAdminDel($usuari){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT id_administrador FROM administradores
                                        WHERE id_usuario = '$usuari'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $intencio->fetchColumn();
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }
    }

    //AZ
    protected function retornaAdmin($id){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
                                        INNER JOIN administradores 
                                        ON administradores.id_usuario=usuarios.id_usuario
                                        WHERE administradores.id_usuario='$id'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }


    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

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

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

  
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }


    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }


    public function getId_administrador()
    {
        return $this->id_administrador;
    }

    public function setId_administrador($id_administrador)
    {
        $this->id_administrador = $id_administrador;

        return $this;
    }
}


?>