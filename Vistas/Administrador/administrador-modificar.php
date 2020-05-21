<?php foreach($Llistat as $objecte){ 
    ?>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <input type="text" name="nombre" value="<?php echo $objecte->nombre ?>">
        <label class="label" for="nombre">Nombre</label>
      </div>
    </div>

    <div class="w-100 d-none d-md-block"></div>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <input type="text" name="apellidos" value="<?php echo $objecte->apellidos ?>">
        <label class="label" for="apellidos">Apellidos</label>
      </div>
    </div>

    <div class="w-100 d-none d-md-block"></div>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <input type="text" name="email" value="<?php echo $objecte->email ?>">
        <label class="label" for="email">E-mail</label>
      </div>
    </div>

    
<?php
}?>

