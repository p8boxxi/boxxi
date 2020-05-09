<nav class="navbar">

  <div class="container">

    <ul class="nav">
      <li class="active"><a href="#">Nosotros</a></li>
      <li><a href="#">Idea</a></li>
      <li><a href="#">Galeria</a></li>
    </ul>

    <div class="logo-header">
      <a href='../../index.php'>
     <img   src="../../Vistas/assets/img/logo_color.png" >     
   </a>
   </div>
   <div class="nav-derecha">
    <ul >
      <li <?php if ($currentPage === 'Tienda') {echo 'class="active-tienda"';} ?> ><a href='../Home/tienda.php'>Tienda</a></li>  
      <?php
      if(empty($_SESSION["id_usuario"])){ echo "<li><a href='../../formLoginPrueba.php'>Acceso</a></li>";}  
      ?>
      <?php
      if(!empty($_SESSION["id_usuario"])){ 
        echo "<li><a href='#'>usuario" .$_SESSION["id_usuario"]. "</a></li>";
        echo "<li><a href='../../Controladores/SesionesController.php?operacion=cerrarSesion'>Salir de  La Sesion</a></li>";
      }  
      ?>

    </ul>
  </div>

</div>
</nav>