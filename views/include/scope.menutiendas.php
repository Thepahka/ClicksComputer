<div class="contenedor-tien-lado">
  <div class="busc-cont">
    <i class="fas fa-search lupa-busqued"></i>
    <input class="busca-tien" type="text" placeholder="Buscar Tienda">
  </div>
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
