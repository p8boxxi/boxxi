<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Lista TODOS los Administradores</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_administrador</th>
            <th>id_usuario</th>
            <th>email</th>
            <th>password</th>
            <th>nombre</th>
            <th>apellidos</th>
            <th>telefono</th>
            <th>Dirección</th>
        </tr>
    <?php
        
        foreach($Llistat as $administrador){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $administrador->id_administrador ?></td>
                <td style="border:1px solid black;"><?php echo $administrador->id_usuario ?></td>
                <td style="border:1px solid black;"><?php echo $administrador->email ?></td>
                <td style="border:1px solid black;"><?php echo $administrador->password ?></td>
                <td style="border:1px solid black;"><?php echo $administrador->nombre ?></td>
                <td style="border:1px solid black;"><?php echo $administrador->apellidos ?></td>
                <td style="border:1px solid black;"><?php echo $administrador->telefono ?></td>
                
                <td style="border:1px solid black;"><?php echo $administrador->direccion ?></td>
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