<?php    
    /***  ENCABEZADO */

    //require '';
?>

<h1>Lista TODAS los Pedidos_Detalle (TODO)</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_pedido_Detalle</th>
            <th>id_pedido</th>   
                    <th>Producto</th> 
                        <th>Categoria</th>
                            <th>fecha</th>
                                <th>Estado</th>
            <th>cantidad</th>
            <th>precio</th>
            <th>producto</th>


        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_pedido_detalle ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->id_pedido ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->nombreProductos ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->nombreCategorias ?></td>

                <td style="border:1px solid black;"><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y") ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->nombreEstados ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->cantidad ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->precio ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->producto ?></td>

            </tr>
    <?php
        }?>
    </table>
</div>
<br>
<a href="../index.html">Inicio</a>

<?php    
    /***  PIE */

?>