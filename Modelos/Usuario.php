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

    public function __construct(){
        $this->setId_usuario(null);
        $this->setEmail(null);
        $this->setPassword(null);
        $this->setNombre(null);
        $this->setApellidos(null);
        $this->setTelefono(null);
        $this->setDireccion(null);
    }

    protected function registraUsuario($email, $password, $nombre, $apellidos, $telefono, $direccion){
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setTelefono($telefono);
        $this->setDireccion($direccion);
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO usuarios (id_usuario, email, password, nombre, apellidos, telefono, direccion) 
                    VALUES (null, :email, :password, :nombre, :apellidos, :telefono, :direccion)";
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute(array(
                                    ":email" => $this->getEmail(),
                                    ":password" => $this->getPassword(),
                                    ":nombre" => $this->getNombre(),
                                    ":apellidos" => $this->getApellidos(),
                                    ":telefono" => $this->getTelefono(),
                                    ":direccion" => $this->getDireccion()
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

    protected function BuscaUsuariPerEmail($email, $paraula){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
                                    WHERE email = :email";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(":email" => $email));
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }
    
    
    protected function modificaUsuari($id, $email, $password, $nombre, $apellidos, $telefono, $direccion){
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setTelefono($telefono);
        $this->setDireccion($direccion);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
                                    SET  email = :email,
                                        password = :password,
                                        nombre = :nombre,
                                        apellidos = :apellidos,
                                        telefono = :telefono,
                                        direccion = :direccion
                                    WHERE id_usuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":email" => $this->getEmail(),
                ":password" => $this->getPassword(),
                ":nombre" => $this->getNombre(),
                ":apellidos" => $this->getApellidos(),
                ":telefono" => $this->getTelefono(),
                ":direccion" => $this->getDireccion()
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
        }
        
    }

    //AZ
    protected function modificarPassword($id, $password){
        $this->setPassword($password);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
                                    SET password = :password
                                    WHERE id_usuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":password" => $this->getPassword(),
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
        }
    }

    //AZ
    protected function modificarCliente($id, $email, $nombre, $apellidos, $telefono, $direccion){
        $this->setEmail($email);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setTelefono($telefono);
        $this->setDireccion($direccion);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
                                    SET  email = :email,
                                        nombre = :nombre,
                                        apellidos = :apellidos,
                                        telefono = :telefono,
                                        direccion = :direccion
                                    WHERE id_usuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":email" => $this->getEmail(),
                ":nombre" => $this->getNombre(),
                ":apellidos" => $this->getApellidos(),
                ":telefono" => $this->getTelefono(),
                ":direccion" => $this->getDireccion()
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
        }
        
    }

    //AZ
    protected function modificarAdministrador($id, $email, $nombre, $apellidos){
        $this->setEmail($email);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
                                    SET  email = :email,
                                        nombre = :nombre,
                                        apellidos = :apellidos
                                    WHERE id_usuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":email" => $this->getEmail(),
                ":nombre" => $this->getNombre(),
                ":apellidos" => $this->getApellidos(),
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
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

  
    public function getPassword()
    {
        return $this->password;
    }

  
    public function setPassword($password)
    {
        $this->password = $password;

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
}


?>