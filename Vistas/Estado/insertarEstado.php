<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Inserta un ESTADO</h1>
<form action="../../Controladores/EstadosController.php" method="POST">
    <div class="two fields">
        <div class="field">
            <label for="estado">Estado</label>
            <input type="text" name="nombre" placeholder="descripcion">
        </div>
        
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea ESTADO">
    </div>


<?php    
    /***  PIE */

?>