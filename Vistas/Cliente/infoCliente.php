<?php foreach($Llistat as $objecte){ 
    ?>
    
    <b>Nombre</b>
    <br>
    <?php echo $objecte->nombre ?>
    <br>
    <br>

    <b>Apellidos</b>
    <br>
    <?php echo $objecte->apellidos ?>
    <br>
    <br>

    <b>E-mail</b>
    <br>
    <?php echo $objecte->email ?>
    <br>
    <br>

    <b>Teléfono</b>
    <br>
    <?php echo $objecte->telefono ?>
    <br>
    <br>

    <b>Dirección</b>
    <br>
    <?php echo $objecte->direccion ?>
    <br>
    <br>

    
<?php
}?>
