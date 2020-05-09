<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Inserta un PEDIDO</h1>
<form action="../../Controladores/PedidosController.php" method="POST">
    <div class="six fields">
        <div class="field">
            <label for="fecha">fecha</label>
            <input type="text" name="fecha" placeholder="fecha">
        </div>
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea PEDIDO">
    </div>


<?php    
    /***  PIE */

?>