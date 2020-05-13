<?php    
    /***  ENCABEZADO */

    //require '';
require_once "../../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();

if (!isset($_SESSION["cistella"])){
    $_SESSION["cistella"] = new Cistella();
}

    require_once "../../Controladores/ProductosController.php";
?>

<h1>AÑADIR un PRODUCTO en el PEDIDO de "ahora"</h1>
<form action="../../Controladores/PedidosController.php" method="POST">

<?php print_r($_SESSION) ?>






        <div>
            <select name="producto">
                <option value="0">Seleccione:</option>
        <?php
            
            $productos = new ProductosController();
            $valoresProductos = $productos->selectProducto();
            ?>  
                <div class="field">
                <label for="nombre">Producto</label>
            <?php
            foreach ($valoresProductos as $prod){
                echo "<option value=$prod->id_producto>".$prod->nombre." -- ".
                                                        "STOCK: "."$prod->stock"." -- ".
                                                        "PRECIO: "."$prod->precio"." -- ".
                                                        "DESCRIPCION: "."$prod->descripcion"." -- ".
                                                        "</option>";
            }
        ?>
            </select>

            
            <label for="cantidad">cantidad</label>
            <input type="text" name="cantidad" placeholder="cantidad">
            
        

        </div>


        <input type="hidden" name="operacio" value="anadirApedido">
        <input type="submit" value="Añadir Al PEDIDO">



</form>


<br>
    


<?php 
    
    echo "<br>";

    if (isset($_SESSION["cistella"])){
        echo "<<<<<<   PEDIDO   >>>>>>><br><br>";
        echo "<table border=1><th>ID</th><th>NOMBRE</th><th>PRECIO</th><th>CANTIDAD</th>";
        $valorCistella = $_SESSION["cistella"]->mostraProductesCistella();
        
        $vectorAux = array();
        $vector = array();
        if ($valorCistella!=null){
            for ($i=0;$i<count($valorCistella["idProducte"]);$i++){
                $cantidad = $valorCistella["quantitatProducte"][$i];
    
                $objecteProducte = new ProductosController();
                $infoProducte= $objecteProducte->retornaInfoProducto($valorCistella["idProducte"][$i]);
    
                foreach ($infoProducte as $informacioProducte){
                    echo "<tr>";
                    echo "<td>".$informacioProducte->id_producto."</td><td>".$informacioProducte->nombre."</td><td>".$informacioProducte->precio."</td>";
                    array_push($vectorAux, $informacioProducte->id_producto, $informacioProducte->nombre, $informacioProducte->precio);
                }
                echo "<td>".$cantidad."</td></tr>"; 
                array_push($vectorAux, $cantidad);
            }
            //array_push($vectorCistella, $vectorAux);

            echo "</table>";
            echo "<br>";
            echo " <a href='../../Controladores/PedidosController.php?accio=creaPedido'>CREAR el PEDIDO</a>";
        }
        $_SESSION["carro"]=$vectorAux;
    }

    

?>





<?php    
    /***  PIE */

?>