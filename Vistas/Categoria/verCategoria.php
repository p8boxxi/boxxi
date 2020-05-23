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

                <h2 class="col-12">Gestión de categorías <a class="btn btn-sm btn-light float-right" href="../Vistas/Categoria/insertarCategoria.php">+ Nueva categoría</a></h2>
                
                <div class="col-12">

                    <table class="table fz-14">
                      <thead>
                        <tr>
                          <th scope="col">Identificador</th>
                          <th scope="col">Nombre</th>
                          <th scope="col" class="text-right">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($Llistat as $objecte){ 
                            ?>
                            <tr>
                                <td><?php echo $objecte->id_categoria ?></td>
                                <td><?php echo $objecte->nombre ?></td>
                                
                                <?php if (($objecte->id_categoria)!=0){
                                    ?>
                                    <td class='text-right'>
                                        <a class='btn btn-sm btn-outline-danger' href="CategoriasController.php?operacio=elimina&categoria=<?php echo $objecte->id_categoria ?>">Eliminar</a>
                                        <a class='btn btn-sm btn-outline-success' href="CategoriasController.php?operacio=modificar&categoria=<?php echo $objecte->id_categoria ?>">Modificar</a>
                                    </td>
                                    <?php
                                } ?>
                            </tr>
                        <?php
                            }?>
                      </tbody>
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