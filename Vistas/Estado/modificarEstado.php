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
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de modificar el Estado!!";
            header ("location: ../../index.php");
        }
    }



?>

<?php 
    if (isset($_GET["id"])){
        ?>
            <h1>Modifica un Estado</h1>
            <form action="../../Controladores/EstadosController.php" method="POST">
            <div class="two fields">
                <div class="field">
                 <label for="nivel">Estado</label>
                    <input type="text" name="nombre" placeholder="nombre">
                </div>
        
                <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                <input type="hidden" name="operacio" value="modifica">
                <input type="submit" value="modifica el Estado">
            </div>
            <?php
    }else{
        echo "NO se puede mostrar";
    }

    ?>

<?php    
    /***  PIE */

?>