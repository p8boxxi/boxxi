<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Inserta un Cliente</h1>
<form action="../../Controladores/ClientesController.php" method="POST">
    <div class="six fields">
        <div class="field">
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" placeholder="@">
        </div>
        <div class="field">
            <label for="paswword">Contraseña</label>
            <input type="password" name="password" placeholder="contraseña">
        </div>
        <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="nombre">
   
        </div>
        <div class="field">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" placeholder="Apellidos">
        </div>
        <div class="field">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" placeholder="Telefono">
        </div>
        <div class="field">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" placeholder="direccion">
        </div>
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea CLIENTE">
    </div>


<?php    
    /***  PIE */

?>