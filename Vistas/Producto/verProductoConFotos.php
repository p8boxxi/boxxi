<?php    
    /***  ENCABEZADO */

    //require '';
   
?>

<h1>Lista TODOS los PRODUCTOS</h1>

<div>

    <table style="border:1px solid black;">
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

            <th> ACCION </th>
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_producto ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_categoria ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->nombre ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->subtitulo ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->stock ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->precio ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->descripcion ?></td>

                <td style="border:1px solid black;">
                    <?php if ($objecte->foto1!=null){   
                        ?>
                        <img src="../../Vistas/assets/img/productos/<?php echo $objecte->foto1 ?>" width="80" height="60">
                        <?php
                    } ?>
                </td>
                <td style="border:1px solid black;">
                    <?php if ($objecte->foto2!=null){   
                        ?>
                        <img src="../../Vistas/assets/img/productos/<?php echo $objecte->foto2 ?>" width="80" height="60">
                        <?php
                    } ?>
                </td>
                <td style="border:1px solid black;">
                    <?php if ($objecte->foto3!=null){   
                        ?>
                        <img src="../../Vistas/assets/img/productos/<?php echo $objecte->foto3 ?>"  width="80" height="60">
                        <?php
                    } ?>
                </td>

                <?php if (($objecte->id_producto)!=1){    //1 es el "NULO
                    ?>
                    <td style="border:1px solid black;"><a href="../../ProductosController.php?operacio=eliminar&producto=<?php echo $objecte->id_producto ?>">ELIMINAR</a></td>
                    <?php
                } ?>

            </tr>
    <?php
        }?>
    </table>
</div>
<br>
<a href="../../index.php">Inicio</a>

<?php    
    /***  PIE */

?>