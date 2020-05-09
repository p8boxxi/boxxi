<?php

require "../Modelos/Cliente.php";

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
        require "../Vistas/Cliente/verCliente.php";
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