<?php
//GP
if (file_exists("../Modelos/Usuario.php")){
    require_once "../Modelos/Usuario.php";
}
if (file_exists("../../Modelos/Usuario.php")){
    require_once "../../Modelos/Usuario.php";
}
//require "../Modelos/Administrador.php";

require_once "SesionesController.php";
$objecteSessions = new SesionesController();

class UsuariosController extends Usuario{

    public function LeeInfoUsuario($email, $password, $nombre, $apellidos, $telefono, $direccion){
       $this->ResultadoRegistraUsuario($this->registraUsuario($email, $password, $nombre, $apellidos, $telefono, $direccion));
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
        $dadesUsuari = $this->BuscaUsuariPerEmail($email, $paraula);
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
                   
                    require_once "AdministradoresController.php";
                    $administrador = new AdministradoresController();

                    $_SESSION["errorProceso"]=false;
                    
                    if ($administrador->buscaAdmin($infoDelUsuari->id_usuario)){
                        $_SESSION["rol"]="Administrador";
                        $_SESSION["id_administrador"]=$administrador->retornaIdAdminDel($infoDelUsuari->id_usuario);

                    }else{
                        require_once "ClientesController.php";
                        $cliente = new ClientesController();
                        if ($cliente->buscaCliente($infoDelUsuari->id_usuario)){
                            $_SESSION["rol"]="Cliente";
                            $_SESSION["id_cliente"]= $cliente->BuscaIdClienteDel($infoDelUsuari->id_usuario);  
                        }
                        else{
                            if ($_SESSION["rol"]!="Administrador" && $_SESSION["rol"]!="Cliente"){
                                $_SESSION["mensajeLogin"]="<< Error al procesar la petición >>";
                                $_SESSION["errorProceso"]=true;
                            }
                            
                        }
                    }
                    if(!$_SESSION["errorProceso"]){
                        $_SESSION["login"]=true;
                        header("location: ../index.php");
                    }else{
                        $_SESSION["login"]=false;
                        $_SESSION["mensajeLogin"]="<< Error al procesar la petición >>";
                        header("location: ../index.php");
                    }
                   
                    
                }
                else {
                    $_SESSION["login"]=false;
                    $_SESSION["mensajeLogin"]="Contraseña incorrecta";
                    header("location: ../index.php");
                }
        }else{
            $_SESSION["login"]=false;
            $_SESSION["mensajeLogin"]="El usuario no existe";
            header("location: ../index.php");
        }
    }

    public function MuestraModificarUsuari($id){
        header("location: ../Vistas/Usuario/modificarUsuario.php?id=$id"); 
    }
    
    public function ModificarUsuari($id, $email, $password, $nombre, $apellidos, $telefono, $direccion){
        $this->resultadoModificaUsuario($this->modificaUsuari($id, $email, $password, $nombre, $apellidos, $telefono, $direccion));
    }

    //AZ
    public function modificarPass($id, $password){
        $this->resultadoModificarPassword($this->modificarPassword($id,$password));
    }
    public function resultadoModificarPassword($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="Contraseña modificado correctamente";
        }else{
            $_SESSION["mensajeResultado"]="La contraseña no se ha podido modificar";
        } 
        header("location: ../Vistas/Home/cliente-password.php");
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
    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["direccion"])){
        if (!empty($_POST["email"]) && !empty($_POST["password"])){
            $usuari = new UsuariosController();
            $usuari->LeeInfoUsuario($_POST["email"],$_POST["password"],$_POST["nombre"],$_POST["apellidos"],$_POST["telefono"],$_POST["direccion"]);
        }else{
            echo "Faltan datos";
            //header ("location: ../../index.php");
        }
    }else{
        echo "Operacion No permitida";
    }
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new UsuariosController();
    $objecte->LlistaUsuarios();
}

if(isset($_POST["operacio"]) && $_POST["operacio"]=="login"){
    if (isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
        $objecte = new UsuariosController();
        $objecte->CheckejaUsuari($_POST["email"], $_POST["password"]);
    }else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>Tiene que introducir Emails y Password!</h1>
            <div>";
        header("location: ../index.php");
    }
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    if (isset($_GET["usuario"]) && !empty($_GET["usuario"])){
        $usuari = new UsuariosController();
        $usuari->MuestraModificarUsuari($_GET["usuario"]);
    }else{
        echo "Operación No disponible";
    }
}

if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["direccion"])){
        if (!empty($_POST["id"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
            $usuari = new UsuariosController();
            $usuari->ModificarUsuari($_POST["id"],$_POST["email"],$_POST["password"],$_POST["nombre"],$_POST["apellidos"],$_POST["telefono"],$_POST["direccion"]);
        }else{
            echo "Faltan datos";
            //header ("location: ../../index.php");
        }
    }else{
        echo "Operacion No permitida";
    }
}

//AZ
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modificarPasswd"){
    if (isset($_POST["id"]) && isset($_POST["password"])){
        if (!empty($_POST["id"]) && !empty($_POST["password"])){
            $usuari = new UsuariosController();
            $usuari->modificarPass($_POST["id"],$_POST["password"]);
        }else{
            echo "Faltan datos";
        }
    }else{
        echo "Operacion No permitida";
    }
}



?>