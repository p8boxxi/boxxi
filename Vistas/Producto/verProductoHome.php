<?php    
/***  ENCABEZADO */
require_once "../../Controladores/ProductosController.php";

    //require '';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container tiendaProd">
<h1 class="titulo-main">mobiliario</h1>
  <div id="prod-recargar" class = "flex-container bloque ">

    <?php

    foreach($Llistat as $objecte){ 
      ?>

      <div class= "cat-<?php echo $objecte->id_categoria?>">
        <div class="container-bloque">
          <a  href="/Controladores/ProductosController.php?operacio=verProductoDetalle&producto=<?php echo $objecte->id_producto ?>" >
          <div class="bloquefoto">
            <?php if ($objecte->foto1!=null){   

              ?>
              <img  src="/Vistas/assets/img/productos/<?php echo $objecte->foto1 ?>" ></img>
              <?php
            } else{
              echo '<span style="width:220; height: 200px; display:block; background-color:#e6e6e6;">Imagen no disponible</span>' ;
            }?>        
          </div>
        </a>
          <ul>
            <li class = "tituloProducto"><?php echo $objecte->nombre; ?></li>
            <li class= "bloque-precio"><a><?php echo $objecte->precio ."€" ?></a></li>
            <li class="boton bt-comprar"><a  href="/Controladores/ProductosController.php?operacio=verProductoDetalle&producto=<?php echo $objecte->id_producto ?>" >Comprar</a></li>


          </ul>
        </div>
      </div>



      <?php
    }?>

  </div>
</div>
<br>
<script type="text/javascript">

$('button').click(function(event) {

  var text_barra1 = document.getElementById("salon");
  var text_barra2 = document.getElementById("comedor");
  var text_barra3 = document.getElementById("dormitorio");
  var text_barra4 = document.getElementById("infantil");
  var text_barra5 = document.getElementById("jardin");
  var text_barra6 = document.getElementById("almacenamiento");


  var divname= document.getElementsByClassName("cat-1");
  for (var i = 0; i < divname.length; i++){
    divname[i].style.display = 'none';
    text_barra1.classList.remove('active-nav');
  }
  var divname= document.getElementsByClassName("cat-2");
  for (var i = 0; i < divname.length; i++){
    divname[i].style.display = 'none';
    text_barra2.classList.remove('active-nav');
  }
  var divname= document.getElementsByClassName("cat-3");
  for (var i = 0; i < divname.length; i++){
    divname[i].style.display = 'none';
    text_barra3.classList.remove('active-nav');
  }
  var divname= document.getElementsByClassName("cat-4");
  for (var i = 0; i < divname.length; i++){
    divname[i].style.display = 'none';
    text_barra4.classList.remove('active-nav');
  }
  var divname= document.getElementsByClassName("cat-5");
  for (var i = 0; i < divname.length; i++){
    divname[i].style.display = 'none';
    text_barra5.classList.remove('active-nav');
  }
  var divname= document.getElementsByClassName("cat-6");
  for (var i = 0; i < divname.length; i++){
    divname[i].style.display = 'none';
    text_barra6.classList.remove('active-nav');
  }

  
  

  var empty = $(this).val();



  switch(empty) {
    case "cat-1":
    var elements = document.getElementsByClassName("cat-1");    
    text_barra1.classList.add('active-nav');
    for (var i = 0; i < elements.length; i++){
     elements[i].style.display = 'block';
   }
   break;
   case "cat-2":
   var elements = document.getElementsByClassName("cat-2");
   text_barra2.classList.add('active-nav');
   for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  break;
  case "cat-3":
  var elements = document.getElementsByClassName("cat-3");
  text_barra3.classList.add('active-nav');
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  break;
  case "cat-4":
  var elements = document.getElementsByClassName("cat-4");
  text_barra4.classList.add('active-nav');
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  break;
  case "cat-5":
  var elements = document.getElementsByClassName("cat-5");
  text_barra5.classList.add('active-nav');
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  break;
  case "cat-6":
  var elements = document.getElementsByClassName("cat-6");
  text_barra6.classList.add('active-nav');
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  break;
  case "todos":
  var elements = document.getElementsByClassName("cat-1");
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  var elements = document.getElementsByClassName("cat-2");
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  var elements = document.getElementsByClassName("cat-3");
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  var elements = document.getElementsByClassName("cat-4");
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  var elements = document.getElementsByClassName("cat-5");
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }
  var elements = document.getElementsByClassName("cat-6");
  for (var i = 0; i < elements.length; i++){
    elements[i].style.display = 'block';
  }

  break;
  default:
  var elements= "";
}

  });

</script>




<?php    
/***  PIE */

?>