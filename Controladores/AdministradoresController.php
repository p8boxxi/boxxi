<?php
//GP
require "../Modelos/Administrador.php";

// require "SesionesController.php";
// $objecteSessio = new SesionesController();

class AdministradoresController extends Administrador{

    public function leeInfoAdministrador($email, $password, $nombre, $apellidos, $telefono, $direccion){
       $this->email = $email;
       $this->password = $password;
       $this->nombre = $nombre;
       $this->apellidos = $apellidos;
       $this->telefono = $telefono;
       $this->direccion = $direccion;

       $this->resultadoRegistraAdministrador($this->registraAdministrador());
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
    $Administrador = new AdministradoresController();
    $Administrador->leeInfoAdministrador(
                    $_POST["email"],
                    $_POST["password"],
                    $_POST["nombre"],
                    $_POST["apellidos"],
                    $_POST["telefono"],
                    $_POST["direccion"]
                );
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $Administrador = new AdministradoresController();
    $Administrador->LlistaAdministradores();
}






?>