<?php    
    /***  ENCABEZADO */

    //require '';
   
?>

<h1>Lista TODAS los Pedidos_Detalle</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_pedido_detalle</th>
            <th>id_pedido</th>
            <th>id_producto</th>

            <th>cantidad</th>
            <th>precio</th>
            <th>producto</th>

            <th> MODIFICAR </th>
            
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_pedido_detalle ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_pedido ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_producto ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->cantidad ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->precio ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->producto ?></td>
                
                <td style="border:1px solid black;"><a href="PedidoDetallesController.php?operacio=modificar&id_pedido_detalle=<?php echo $objecte->id_pedido_detalle ?>">MODIFICAR</a></td>

            </tr>
    <?php
        }?>
    </table>
</div>
<br>
<a href="../index.php">Inicio</a>

<?php    
    /***  PIE */

?>