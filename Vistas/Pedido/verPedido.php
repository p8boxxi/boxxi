<?php    
    /***  ENCABEZADO */

    //require '';
   
?>

<h1>Lista TODOS los PEDIDOS</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_pedido</th>
            <th>id_CLIENTE</th>
            <th>id_estado</th>

            <th>Fecha</th>

            <th> CANCELAR </th>
            <th> MODIFICAR </th>
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_pedido ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_cliente ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_estado ?></td>

                <td style="border:1px solid black;"><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y")  ?></td>

                <td style="border:1px solid black;"><a href="PedidosController.php?operacio=cancelar&pedido=<?php echo $objecte->id_pedido ?>">CANCELAR</a></td>
                <td style="border:1px solid black;"><a href="PedidosController.php?operacio=modificar&pedido=<?php echo $objecte->id_pedido ?>">MODIFICAR</a></td>
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