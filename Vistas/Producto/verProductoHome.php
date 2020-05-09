<?php    
/***  ENCABEZADO */

    //require '';

?>

<h1 class="titulo-main">mobiliario</h1>
<div class="container">
<div class = "flex-container bloque ">
    <?php

    foreach($Llistat as $objecte){ 
        ?>
        <div class="container-bloque">
            <div class="bloquefoto">
                <?php if ($objecte->foto1!=null){   
                    ?>
                    <img src="../../Vistas/assets/img/productos/<?php echo $objecte->foto1 ?>" width="220" height="200">
                    <?php
                } else{
                    echo '<span style="width:220; height: 200px; display:block; background-color:#e6e6e6;">Imagen no disponible</span>' ;}?>
            </div>
            <ul>
                <li class = "tituloProducto"><a><?php echo $objecte->nombre ?></a></li>
                <li class= "bloque-precio"><a><?php echo $objecte->precio ."€" ?></a></li>
                  <li class="boton bt-comprar"><a  href="#">Comprar</a></li>
              </ul>
        </div>



          <?php
      }?>

  </div>
    </div>
  <br>


  <?php    
  /***  PIE */

  ?>