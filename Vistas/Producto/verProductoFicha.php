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


<h2 class="col-12">Gestión de productos <a class="btn btn-sm btn-light float-right" href="../Vistas/Producto/insertarProducto.php">+ Nuevo producto</a></h2>

<div class="col-12">
            <table class="w-100 table fz-14">
        <tr>
            <th>id_producto</th>
            <th>id_categoria</th>

            <th>nombre</th>
            <th>subtitulo</th>
            <th>stock</th>
            <th>precio</th>
            <th>descripcion</th>
            <th>foto1</th>
            <th>foto2</th>
            <th>foto3</th>

            <th> ELIMINAR </th>
            <th> MODIFICAR </th>
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td><?php echo $objecte->id_producto ?></td>
                <td><?php echo $objecte->id_categoria ?></td>

                <td><?php echo $objecte->nombre ?></td>
                <td><?php echo $objecte->subtitulo ?></td>
                <td><?php echo $objecte->stock ?></td>
                <td><?php echo $objecte->precio ?></td>
                <td><?php echo $objecte->descripcion ?></td>
                <td><?php echo $objecte->foto1 ?></td>
                <td><?php echo $objecte->foto2 ?></td>
                <td><?php echo $objecte->foto3 ?></td>

                <?php if (($objecte->id_producto)!=1){    //1 es el "NULO
                    ?>
                    <td><a href="ProductosController.php?operacio=verdetalle&producto=<?php echo $objecte->id_producto ?>">Ver</a></td>
                    <td><a href="ProductosController.php?operacio=eliminar&producto=<?php echo $objecte->id_producto ?>">Eliminar</a></td>
                    <td><a href="ProductosController.php?operacio=modificar&producto=<?php echo $objecte->id_producto ?>">Modificar</a></td>
                    <?php
                } ?>

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

