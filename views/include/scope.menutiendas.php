<div class="contenedor-tien-lado">
  <p class="tiendas-disponibles">Tiendas disponibles</p>
  <?php
  $item = 0;
  foreach($this->Read()  as $row){
  $item++
  ?>
  <ul>
  <li class="tienda-dis"><?php echo $row[2]; ?></li>
  </ul>
<?php } ?>
</div>
