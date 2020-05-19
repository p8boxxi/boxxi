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

                <h2 class="col-12">Clientes registrados</h2>
                
                <div class="col-12">
                    <table class="w-100 table fz-14">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">E-mail</th>
                                <th></th>
                            </tr>
                        </thead>
                    <?php
                        foreach($Llistat as $objecte){ 
                            ?>
                            <tr>
                                <td><?php echo $objecte->nombre ?></td>
                                <td><?php echo $objecte->apellidos ?></td>
                                <td><?php echo $objecte->email ?></td>
                                <td><span btn_more class="btn btn-sm btn-outline-success">Ver más</span></td>
                            </tr>
                            <tr sub class="fz-14 d-none sub">
                                <td colspan="1">
                                    Teléfono:
                                    <br>Dirección:
                                    <br>ID Usuario:
                                    <br>ID Cliente:
                                </td>
                                <td colspan="4">
                                    <?php echo $objecte->telefono ?>
                                    <br>
                                    <?php echo $objecte->direccion ?>
                                    <br>
                                    <?php echo $objecte->id_usuario ?>
                                    <br>
                                    <?php echo $objecte->id_cliente ?>
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

<script>
    $('[btn_more]').click(function(){
        $(this).parents('tr').toggleClass('visible-next');
    })
</script>

</body>

</html>