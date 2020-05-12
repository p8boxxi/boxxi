<?php
//GP
require "../Modelos/Administrador.php";

// require "SesionesController.php";
// $objecteSessio = new SesionesController();

class AdministradoresController extends Administrador{

    public function leeInfoAdministrador($email, $password, $nombre, $apellidos, $telefono, $direccion){
       $this->resultadoRegistraAdministrador($this->registraAdministrador($email, $password, $nombre, $apellidos, $telefono, $direccion));
    }

    public function resultadoRegistraAdministrador($resultat){
        if ($resultat){
           require "../Vistas/Administrador/Insertado.php";
        }else{
           require "../Vistas/Administrador/NoInsertado.php";
        } 
    }

    public function LlistaAdministradores(){

        $Llistat = $this->retornaAdministradoresTodos();
        require "../Vistas/Administrador/verAdministrador.php";
    }


    
    public function buscaAdmin($id){
        return $this->buscaAdministrador($id);
    }

    public function retornaIdAdminDel($usuario){
        return $this->buscaIdAdminDel($usuario);
    }
    


}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["direccion"])){
        if (!empty($_POST["email"]) and !empty($_POST["password"])){
            $Administrador = new AdministradoresController();
            $Administrador->leeInfoAdministrador($_POST["email"],$_POST["password"],$_POST["nombre"],$_POST["apellidos"],$_POST["telefono"],$_POST["direccion"]);
        }else{
            echo "Faltan datos";
            //header ("location: ../../index.php");
        }
    }else{
        echo "Operacion No permitida";
    }
    
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $Administrador = new AdministradoresController();
    $Administrador->LlistaAdministradores();
}






?>