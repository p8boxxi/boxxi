<?php foreach($Llistat as $objecte){ 
    ?>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <div class="input">
            <?php echo $objecte->nombre ?>
        </div>
        <span class="label sm">Nombre</span>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <div class="input">
            <?php echo $objecte->apellidos ?>
        </div>
        <span class="label sm">Apellidos</span>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <div class="input">
            <?php echo $objecte->email ?>
        </div>
        <span class="label sm">E-mail</span>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <div class="input">
            <?php echo $objecte->telefono ?>
        </div>
        <span class="label sm">Teléfono</span>
      </div>
    </div>

    <div class="col-md-12 mb-3">
      <div class="input-container">
        <div class="input">
            <?php echo $objecte->direccion ?>
        </div>
        <span class="label sm">Dirección</span>
      </div>
    </div>
    
<?php
}?>
