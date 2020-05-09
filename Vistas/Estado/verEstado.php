<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Lista los Estados</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_estado</th>
            <th>nombre</th>

            <th> ELIMINAR </th>
            <th> MODIFICAR </th>
           
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_estado ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->nombre ?></td>

                <?php if (($objecte->id_estado)!=1){
                    ?>
                    <td style="border:1px solid black;"><a href="EstadosController.php?operacio=elimina&id_estado=<?php echo $objecte->id_estado ?>">ELIMINAR</a></td>
                    <td style="border:1px solid black;"><a href="EstadosController.php?operacio=modificar&id_estado=<?php echo $objecte->id_estado ?>">MODIFICAR</a></td>
                    <?php
                } ?>
                
                
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