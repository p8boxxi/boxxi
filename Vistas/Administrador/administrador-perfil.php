<?php foreach($Llistat as $objecte){ 
    ?>

    <div class="col-md-6 mb-3">
      <div class="input-container disabled">
        <div class="input">
            <?php echo $objecte->nombre ?>
        </div>
        <span class="label sm">Nombre</span>
      </div>
    </div>

    <div class="w-100 d-none d-md-block"></div>

    <div class="col-md-6 mb-3">
      <div class="input-container disabled">
        <div class="input">
            <?php echo $objecte->apellidos ?>
        </div>
        <span class="label sm">Apellidos</span>
      </div>
    </div>

    <div class="w-100 d-none d-md-block"></div>

    <div class="col-md-6 mb-3">
      <div class="input-container disabled">
        <div class="input">
            <?php echo $objecte->email ?>
        </div>
        <span class="label sm">E-mail</span>
      </div>
    </div>

    
<?php
}?>
