<?php
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../Vistas/Header/header.php';    
?>
<body>

<section class="admin">
    <div class="container">
        <div class="row">
            
        <?php include '../Vistas/Header/nav-cuenta-admin.php';?>
        
            <div class="col-md-9 content">
                
                <?php if (isset($_SESSION["mensajeResultado"])){
                    echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
                    unset($_SESSION["mensajeResultado"]);
                };
                ?>
                
                <div class="row">
                
                <!-- -->

<h2 class="col-12">Lista de pedidos</h2>

<div class="col-12">
            <table class="w-100 table fz-14">
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Estado</th>
            <th class="text-right">Opciones</th>

        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td><?php echo $objecte->id_pedido ?></td>
                <td><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y")  ?></td>
                <td><?php echo $objecte->id_cliente ?></td>
                <td><?php echo $objecte->nombre ?></td>

                
                <td class="text-right">
                <a class="d-none" href="PedidosController.php?operacio=cancelar&pedido=<?php echo $objecte->id_pedido ?>">Cancelar</a>

                <a class="btn btn-sm btn-outline-success" href="PedidosController.php?operacio=modificar&pedido=<?php echo $objecte->id_pedido ?>">Modificar</a>

                    <a href="../Vistas/Home/admin-pedido-detalle.php?id=<?php echo $objecte->id_pedido ?>" class="btn btn-sm btn-success">Ver detalle</a>
                </td>
            </tr>
    <?php
        }?>
    </table>
</div>



                 <!-- -->

            </div>
        </div>
        
    </div>
</section>
    
<?php include '../Vistas/Footer/footer.php'; ?>

</body>

</html>

