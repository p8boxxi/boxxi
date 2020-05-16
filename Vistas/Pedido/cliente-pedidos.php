<table class="table">
  <thead>
    <tr>
      <th scope="col">Identificador</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estado</th>
      <th scope="col" class="text-right">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($Llistat as $objecte){ 
        ?>
        <tr>
            <td><?php echo $objecte->id_pedido ?></td>
            <td><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y")  ?></td>
            <td><?php echo $objecte->nombre ?></td>
            <td class="text-right"><a href="#" class="btn btn-success">Ver detalle</a></td>
        </tr>
    <?php
        }?>
  </tbody>
</table>

