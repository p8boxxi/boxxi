<?php

if (file_exists("/Modelos/Cliente.php")){
    require_once "/Modelos/Cliente.php";
}
if (file_exists("../Modelos/Cliente.php")){
    require_once "../Modelos/Cliente.php";
}
if (file_exists("../../Modelos/Cliente.php")){
    require_once "../../Modelos/Cliente.php";
}

class ClientesController extends Cliente{

    public function leeInfoCliente($email, $password, $nombre, $apellidos, $telefono, $direccion){
       $this->email = $email;
       $this->password = $password;
       $this->nombre = $nombre;
       $this->apellidos = $apellidos;
       $this->telefono = $telefono;
       $this->direccion = $direccion;

       $this->resultadoRegistraCliente($this->registraCliente());
    }

    public function resultadoRegistraCliente($resultat){
        if ($resultat){
            require "../Vistas/Cliente/Insertado.php";
        }else{
            require "../Vistas/Cliente/NoInsertado.php";
        } 
    }

    public function LlistaClientes(){

        $Llistat = $this->retornaClientesTodos();

        if (file_exists("../Vistas/Cliente/verCliente.php")){
            require_once "../Vistas/Cliente/verCliente.php";
        }
        if (file_exists("../../Vistas/Cliente/verCliente.php")){
            require_once "../../Vistas/Cliente/verCliente.php";
        }

    }

    //AZ
    public function infoCliente(){

        $Llistat = $this->retornaCliente($_SESSION["id_usuario"]);

        if (file_exists("../Vistas/Cliente/infoCliente.php")){
            require_once "../Vistas/Cliente/infoCliente.php";
        }
        if (file_exists("../../Vistas/Cliente/infoCliente.php")){
            require_once "../../Vistas/Cliente/infoCliente.php";
        }

    }





}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $Cliente = new ClientesController();
    $Cliente->leeInfoCliente(
                    $_POST["email"],
                    $_POST["password"],
                    $_POST["nombre"],
                    $_POST["apellidos"],
                    $_POST["telefono"],
                    $_POST["direccion"]
                );
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new ClientesController();
    $objecte->LlistaClientes();
}






?>