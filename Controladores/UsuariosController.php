<?php
//GP
require "../Modelos/Usuario.php";
require "../Modelos/Administrador.php";

require "SesionesController.php";
$objecteSessions = new SesionesController();

class UsuariosController extends Usuario{

    public function LeeInfoUsuario($email, $password, $nombre, $apellidos, $telefono, $direccion){
       $this->email = $email;
       $this->password = $password;
       $this->nombre = $nombre;
       $this->apellidos = $apellidos;
       $this->telefono = $telefono;
       $this->direccion = $direccion;

       $this->ResultadoRegistraUsuario($this->registraUsuario());
    }

    public function ResultadoRegistraUsuario($resultat){
        if ($resultat){
            require "../Vistas/Usuario/Insertado.php";
        }else{
            require "../Vistas/Usuario/NoInsertado.php";
        } 
    }

    public function LlistaUsuarios(){

        $Llistat = $this->retornaUsuariosTodos();
        require "../Vistas/Usuario/verUsuario.php";
    }

    public function CheckejaUsuari($email, $paraula)
    {
        $this->email = $email;
        $this->password = $paraula;

        $dadesUsuari = $this->BuscaUsuariPerEmail();
        if ($dadesUsuari != null){
            foreach ($dadesUsuari as $infoDelUsuari){}  //només n'hi ha 1
                
                if ($paraula == $infoDelUsuari->password){
                    $_SESSION["id_usuario"]=$infoDelUsuari->id_usuario;
                    $_SESSION["email"]=$infoDelUsuari->email;
                    $_SESSION["password"]=$infoDelUsuari->password;
                    $_SESSION["nombre"]=$infoDelUsuari->nombre;
                    $_SESSION["apellidos"]=$infoDelUsuari->apellidos;
                    $_SESSION["telefono"]=$infoDelUsuari->telefono;
                    $_SESSION["direccion"]=$infoDelUsuari->direccion;
                    $_SESSION["NoPermiso"]=null;
                    //mira si es Client o Administrador:
                   
                    if ($esAdministrador= Administrador::buscaSiExiste($infoDelUsuari->id_usuario)){
                        $_SESSION["rol"]="Administrador";
                    }else{
                        $_SESSION["rol"]="Cliente";
                    }
                    $_SESSION["login"]=true;
                    header("location: ../index.php");
                }
                else {
                    $_SESSION["mensajeLogin"]="<< Contraseña incorrecta >>";
                    header("location: ../index.php");
                }
        }else{
            $_SESSION["mensajeLogin"]="<< El usuario No existe! >>";
            header("location: ../index.php");
        }
        
  
    }

    public function MuestraModificarUsuari($id){

        header("location: ../Vistas/Usuario/modificarUsuario.php?id=$id"); 
    }
    public function ModificarUsuari($id, $email, $password, $nombre, $apellidos, $telefono, $direccion){
         $this->id_usuario = $id;
         $this->email = $email;
         $this->password = $password;
         $this->nombre = $nombre;
         $this->apellidos = $apellidos;
         $this->telefono = $telefono;
         $this->direccion = $direccion;
        $this->resultadoModificaUsuario($this->modificaUsuari());
    }
    public function resultadoModificaUsuario($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Usuario Modificado</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>El Usuario NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }


    
}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $Usuario = new UsuariosController();
    $Usuario->LeeInfoUsuario(
                    $_POST["email"],
                    $_POST["password"],
                    $_POST["nombre"],
                    $_POST["apellidos"],
                    $_POST["telefono"],
                    $_POST["direccion"]
                );
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new UsuariosController();
    $objecte->LlistaUsuarios();
}

if(isset($_POST["operacio"]) && $_POST["operacio"]=="login"){
    $objecte = new UsuariosController();
    $objecte->CheckejaUsuari($_POST["email"], $_POST["password"]);
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $usuari = new UsuariosController();
    $usuari->MuestraModificarUsuari($_GET["usuario"]);
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    $usuari = new UsuariosController();
   
    $usuari->ModificarUsuari(
                    $_POST["id"],
                    $_POST["email"],
                    $_POST["password"],
                    $_POST["nombre"],
                    $_POST["apellidos"],
                    $_POST["telefono"],
                    $_POST["direccion"]
                );
}



?>