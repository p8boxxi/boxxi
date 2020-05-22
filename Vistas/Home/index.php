<?php     
require_once "../../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
$title = 'Index'; 
$currentPage = 'Index'; 
include '../../Vistas/Header/header.php';    
?>

<body>

    <?php  

    //GP
    // if(!empty($_SESSION["id_usuario"])){
    //             echo "eres el usuario con ID: ".$_SESSION["id_usuario"];
    //             echo "<br>";
    //             echo "eres ".$_SESSION["rol"];
    // }  

    if (isset($_SESSION["login"])){

        if ($_SESSION["login"]==false){

            if (isset($_SESSION["mensajeLogin"])){
                // AZ
                echo "<div class='modal fade' id='wrongModal1' tabindex='-1' role='dialog' aria-labelledby='wrongModal1' aria-hidden='true'>";
                echo "<div class='modal-dialog' role='document'>";
                echo "<div class='modal-content p-4 text-center'>";
                echo "<a class='close' data-dismiss='modal'>×</a>";
                echo "<p class='m-0'><b>".$_SESSION["mensajeLogin"]."</b></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<script>$('#wrongModal1').modal('show');</script>";
                unset($_SESSION["mensajeLogin"]);
            }
        }else{
            if (isset($_SESSION["Denegado"])){
                // AZ
                echo "<div class='modal fade' id='wrongModal2' tabindex='-1' role='dialog' aria-labelledby='wrongModal2' aria-hidden='true'>";
                echo "<div class='modal-dialog' role='document'>";
                echo "<div class='modal-content p-4 text-center'>";
                echo "<a class='close' data-dismiss='modal'>×</a>";
                echo "<p class='m-0'><b>".$_SESSION["Denegado"]."</b></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<script>$('#wrongModal2').modal('show');</script>";
                unset($_SESSION["Denegado"]);
                }
        }
    }
    
    if (isset($_SESSION["mensajeResultado"])){
        echo $_SESSION["mensajeResultado"];
        unset($_SESSION["mensajeResultado"]);
    }
   

   
    // echo "<br>";
    // echo "<a href='Controladores/SesionesController.php?operacion=cerrarSesion'>Salir de  La Sesion</a>";

    ?>



    <h1>Enlaces muestra [INSERTAR datos]</h1>
    <a href="../../Vistas/Administrador/insertarAdministrador.php">Administrador</a>
    <br>
    <a href="../../Vistas/Categoria/insertarCategoria.php">Categorias</a>
    <br>
    <a href="../../Vistas/Cliente/insertarCliente.php">Clientes</a>
    <br>
    <a href="../../Vistas/Estado/insertarEstado.php">Estados</a>
    <br>
    <a href="../../Vistas/PedidoDetalle/insertarPedidoDetalle.php">Pedido-detalle</a>
    <br>
    <a href="../../Vistas/Producto/insertarProducto.php">Productos</a>
    <br>
    (<a href="../../Vistas/Usuario/insertarUsuario.php">Usuarios</a>)
    <br>
    <a href="../../Vistas/Pedido/insertarPedido.php">Pedidos</a>

    <h1>Enlaces muestra [MOSTRAR datos]</h1>
    <a href="../../Controladores/AdministradoresController.php?operacio=ver">Administrador</a>
    <br>
    <a href="../../Controladores/CategoriasController.php?operacio=ver">Categorias</a>
    <br>
    <a href="../../Controladores/ClientesController.php?operacio=ver">Clientes</a>
    <br>
    <a href="../../Controladores/EstadosController.php?operacio=ver">Estados</a>
    <br>
    <a href="../../Controladores/PedidoDetallesController.php?operacio=ver">Pedido-detalle</a>
    <br>
    <a href="../../Controladores/ProductosController.php?operacio=ver">Productos</a>
    <br>
    <a href="../../Controladores/ProductosController.php?operacio=verFotos">Productos con Fotos</a>
    <br>
    (<a href="../../Controladores/UsuariosController.php?operacio=ver">Usuarios</a>)
    <br>
    <a href="../../Controladores/PedidosController.php?operacio=ver">Pedidos</a>
    <br>
    <a href="../../Controladores/PedidoDetallesController.php?operacio=verTODO">Pedido-detalle (TODO)</a>



    <h1>Actualiza</a></h1>


    <br>
    <a href="../../Vistas/Categoria/modificarCategoria.php">Categorias</a>




    <h1><a href="../../formLoginPrueba.php">Regresar al Login</a></h1>

<?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>