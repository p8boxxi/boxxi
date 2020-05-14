<?php

//GP
class SesionesController{

    public function __construct()
    {
        if (!isset($_SESSION["cistella"])){
            if (file_exists("../../Modelos/Cistella.php")){
                require_once "../../Modelos/Cistella.php";
            }
            if (file_exists("../Modelos/Cistella.php")){
                require_once "../Modelos/Cistella.php";
            }
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
        }

        

        


    }

}

if (isset($_GET["operacion"]) && $_GET["operacion"]=="cerrarSesion"){
    $objecteSessio = new SesionesController();
    session_destroy();

    header("location: ../Vistas/Home/index.php");
}



?>