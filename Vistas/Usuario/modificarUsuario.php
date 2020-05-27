<?php    
    /***  ENCABEZADO */

    //GP
    require_once "../../Controladores/SesionesController.php";
    $objecteSessio = new SesionesController();

    
    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_GET["id"])){
            if (($_GET["id"])!=$_SESSION["id_usuario"]){
                if ($_SESSION["rol"]!="Administrador"){
                    $_SESSION["mensajeResultado"]="
                        <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>>> USTED NO puede modificar este usuario <<</h1>
                        </div>";
                    header ("location: ../../index.php");
                }
            }
        }else{
            $_SESSION["mensajeResultado"]="No se puede verficar su permiso para ejecutar la acción !!";
            header ("location: ../../index.php");
        }
    }



?>

    <?php 
    if (isset($_GET["id"])){
        ?>
            <h1>Modifica un Usuario</h1>
            <form action="../../Controladores/UsuariosController.php" method="POST">
            <div class="field">
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" placeholder="@">
        </div>
        <div class="field">
            <label for="paswword">Contraseña</label>
            <input type="password" name="password" placeholder="contraseña">
        </div>
        <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="nombre">
   
        </div>
        <div class="field">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" placeholder="Apellidos">
        </div>
        <div class="field">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" placeholder="Telefono">
        </div>
        <div class="field">
            <label for="direccion">direccion</label>
            <input type="text" name="direccion" placeholder="direccion">
        </div>
        
                <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                <input type="hidden" name="operacio" value="modifica">
                <input type="submit" value="modifica el Usuario">
            </div>
            <?php
    }else{
        echo "NO se puede mostrar";
    }

    ?>

<?php    
    /***  PIE */

?>