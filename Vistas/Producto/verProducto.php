<?php
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
$title = 'Tienda'; 
$currentPage = 'Tienda'; 
include '../Vistas/Header/header.php';    
require '../Controladores/CategoriasController.php'; 
$categoriaNom = new CategoriasController();
?>
<body>

<section class="admin">
    <div class="container">
        <div class="row">
            
        <?php include '../Vistas/Header/nav-cuenta-admin.php';?>
        
            <div class="col-md-9 content">
                
                <div class="row">
                
                <!-- -->


<h2 class="col-12">Gestión de productos <a class="btn btn-sm btn-dark float-right" href="../Vistas/Producto/insertarProducto.php">+ Nuevo producto</a></h2>

<div class="col-12">
            <table class="w-100 table fz-14">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Precio</th>
            <th class="text-right">Opciones</th>
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td><?php echo $objecte->id_producto ?></td>
                <td><?php echo $objecte->nombre ?></td>
                <td>
                    <?php 
                    
                    $nombreCategoria = $categoriaNom->obtieneNombreDeLaCategoria($objecte->id_categoria);
                    echo $nombreCategoria;
                    ?>
                </td>
                <?php $objecte->subtitulo ?>
                <td><?php echo $objecte->stock ?></td>
                <td><?php echo $objecte->precio ?> EUR</td>
                <?php $objecte->descripcion ?>
                <?php $objecte->foto1 ?>
                <?php $objecte->foto2 ?>
                <?php $objecte->foto3 ?>

                <?php if (($objecte->id_producto)!=0){    //1 es el "NULO
                    ?>
                    <td class="text-right">
                        <a class="btn btn-sm btn-danger" href="ProductosController.php?operacio=eliminar&producto=<?php echo $objecte->id_producto ?>">
                            <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg>
                        </a>
                        <!-- -->
                        
                        <a class="btn btn-sm btn-success" href="ProductosController.php?operacio=modificar&producto=<?php echo $objecte->id_producto ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18px" height="18px"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                        </a>

                        <!-- -->
                        <a class="btn btn-sm btn-outline-success" href="ProductosController.php?operacio=verDetalle&producto=<?php echo $objecte->id_producto ?>">Ver detalle
                        </a>

                        

                        
                    </td>
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

