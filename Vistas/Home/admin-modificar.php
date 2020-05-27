<?php
require_once "../../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();

// Filtro solo administradores
if (!isset($_SESSION["id_usuario"])){
    $_SESSION["login"] = false;
    $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
    header ("location: ../../index.php");
}else{
    if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
        $_SESSION["Denegado"]="No tiene acceso al módulo de modificar la Categoria!!";
        header ("location: ../../index.php");
    }
}
//

$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../../Vistas/Header/header.php';    
?>
<body>

<section class="admin">
    <div class="container">
        <div class="row">
        
        <?php include '../../Vistas/Header/nav-cuenta-admin.php';?>
        
            <div class="col-md-9 content">
                    
                <?php if (isset($_SESSION["mensajeResultado"])){
                    echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
                    unset($_SESSION["mensajeResultado"]);
                };
                ?>
            
                <form id="form" action="../../Controladores/UsuariosController.php" method="POST">
                    <div class="row">
                        <h2 class="col-12">Modificar datos personales</h2>
                            
                        <?php
                        include '../../Controladores/AdministradoresController.php'; 
                        $objecte = new AdministradoresController();
                        $objecte->mostrarModificarAdministrador();
                        ?>
                        
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id_usuario']?>">
                        <input type="hidden" name="operacio" value="modificarAdmin">

                        <div class="col-md-12 mb-3">
                            <input type="submit" class="btn btn-success" value="Modificar">
                            <a href="admin-perfil.php" class="btn btn-light">Cancelar</a>
                        </div>

                    </div>
                </form>   

            </div>
        </div>
    </div>
</section>

    
<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>