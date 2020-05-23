<h2 class="col-12">Detalles del pedido <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Controladores/PedidosController.php?operacio=ver" class="btn btn-success f-right" style="float:right;">Volver</a></h2>

<table class="table">
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Foto</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio Ud.</th>
        <th scope="col" class="text-right">Precio</th>
    </tr>
  </thead>
  <tbody>

<?php
    $total=0;
    foreach($Llistat as $objecte){ 
        ?>
        
        <?php $objecte->id_pedido ?>
        <?php $objecte->id_pedido_detalle ?>

        <tr>
            <td><?php echo $objecte->id_producto ?></td>
            <td>
                <figure class="img-container">
                <?php if ($objecte->foto1){
                    echo '<img src="../../Vistas/assets/img/productos/'.$objecte->foto1.'">';
                } else {
                    echo '<img src="../../Vistas/assets/img/no-image.jpg">';
                }?>
            </figure>

            </td>
            <td><?php echo $objecte->nombre ?></td>
            <td><?php echo $objecte->cantidad ?></td>
            <td><?php echo $objecte->precio ?> EUR</td>

            
            <?php $pre = ($objecte->cantidad * $objecte->precio) ?>
            <td class="text-right"><?php echo $pre?> EUR </td>
            <?php $total=$total+$pre  ?>
        </tr>

<?php
    }?>

<tr>
    <td colspan="6" class="text-right">
        <b>Total: <?php echo $total ?> EUR</b>
    </td>
    
</tr>


</tbody>
        </table>