<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Inserta un PEDIDO_DETALLE</h1>
<form action="../../Controladores/PedidoDetallesController.php" method="POST">
    <div class="six fields">
        <div class="field">
            <label for="cantidad">cantidad</label>
            <input type="text" name="cantidad" placeholder="cantidad">
        </div>
        <div class="field">
            <label for="precio">precio</label>
            <input type="text" name="precio" placeholder="precio">
        </div>
        <div class="field">
            <label for="producto">producto (TIENE QUE VENIR DE PRODUCTOS(nombre)!!)</label>
            <input type="text" name="producto" placeholder="producto">
        </div>
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea PEDIDO_DETALLE">
    </div>


<?php    
    /***  PIE */

?>