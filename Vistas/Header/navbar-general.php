<nav class="navbar">

  <div class="container">
    
    <?php if ($currentPage !== 'Tienda') {echo '
      <ul class="nav">
        <li class="active"><a href="#">Nosotros</a></li>
        <li><a href="#">Idea</a></li>
        <li><a href="#">Galeria</a></li>
      </ul>
    ';}?>

    <?php if ($currentPage === 'Tienda') {echo '
      <ul class="nav">
        <li><a href="index.php">Página de inicio</a></li>
      </ul>
    ';}?>

    <div class="logo-header">
      <a href="/index.php">
         <img   src="/Vistas/assets/img/logo_color.png">     
      </a>
    </div>
    <div class="nav-derecha">
      <ul >
        <li><a href='../Home/tienda.php'>Tienda</a></li> 

          <?php
            if(empty($_SESSION["id_usuario"])){ echo '<li><a type="button" data-toggle="modal" data-target="#loginModal">Acceso de usuarios</a></li>';}
            else 
            if(!empty($_SESSION["id_usuario"])){ 
                echo "<li class='user-box'>";
                if($_SESSION["rol"]=="Cliente"){
                    echo "<b>".$_SESSION["nombre"]." - ".$_SESSION["rol"]."</b>";
                    echo "<a class='c-999' href='../../Controladores/SesionesController.php?operacion=cerrarSesion'>Cerrar sesión</a>";
                    echo "<a href='cliente-perfil.php'>Mi cuenta</a>";
                     echo "<a href='../Pedido/contenidoCistella.php'>Mi cesta</a>";
                } else {
                  echo "<b>".$_SESSION["nombre"]." - ".$_SESSION["rol"]."</b>";
                  echo "<a class='c-999' href='../../Controladores/SesionesController.php?operacion=cerrarSesion'>Cerrar sesión</a>";
                  echo "<a href='admin.php'>Panel de control</a>";
                }
                
                echo "</li>";
            }  
          ?>

    </ul>
  </div>

</div>
</nav>

<!-- Modal login inicio -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content p-4 text-center">
      <form action="../../Controladores/UsuariosController.php?operacio=login" method="POST">
          <div class="row">
            <h4 class="col-12 mb-3">Acceso de usuarios</h4>
            <div class="col-12 mb-3">
              <div class="input-container">
                <input type="text" id="email" name="email" required="required">
                <label for="email" class="label">Tu e-mail</label>
              </div>
            </div>
            <div class="col-12 mb-3">
              <div class="input-container">
                <input type="text" id="password" name="password" required="required">
                <label for="password" class="label">Contraseña</label>
              </div>
            </div>
            <div class="col-12 mb-4">
              <input type="hidden" name="operacio" value="login">
              <input type="submit" class="btn btn-success btn-lg" value="Iniciar sesión">
            </div> 
            <div class="col-12">
              <a class="link" href="../../Vistas/Home/cliente-registro.php">No tengo cuenta, quiero registrarme</a>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal login fin -->

