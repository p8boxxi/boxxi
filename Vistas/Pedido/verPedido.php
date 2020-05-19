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
            <th></th>

        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td><?php echo $objecte->id_pedido ?></td>
                <td><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y")  ?></td>
                <td><?php echo $objecte->id_cliente ?></td>
                <td><?php echo $objecte->nombre ?></td>

                

                <a class="d-none" href="PedidosController.php?operacio=cancelar&pedido=<?php echo $objecte->id_pedido ?>">Cancelar</a>
                <a class="d-none" href="PedidosController.php?operacio=modificar&pedido=<?php echo $objecte->id_pedido ?>">Modificar</a>
                <td>
                    <span class="btn btn-sm btn-outline-success">Ver detalle</span>
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

