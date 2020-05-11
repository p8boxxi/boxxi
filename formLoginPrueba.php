<!DOCTYPE html>
<html>
<head>
<title>P8</title>
</head>

<body>
<h1>Formulario de Prueba LOGIN</h1>

<?php 
require_once "Controladores/SesionesController.php";
$objecteSessio = new SesionesController();


if(!empty($_SESSION["id_usuario"])){
               session_destroy();
} 

if (!(isset($_SESSION["login"])) && isset($_SESSION["mensajeResultado"])){
        unset($_SESSION["mensajeResultado"]);
}

?>
<form action="Controladores/UsuariosController.php?operacio=login" method="POST">
    <div class="six fields">
        <div class="field">
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" placeholder="@">
        </div>
        <div class="field">
            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="contraseña">
        </div>
        
        <input type="hidden" name="operacio" value="login">
        <input type="submit" value="<< LOGIN >>">
    </div>




</body>

</html>




