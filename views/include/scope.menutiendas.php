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
    <form class="" action="Tiendas-<?php echo $row[0]; ?> ">
      <input type="submit" class="tienda-dis" value="<?php echo $row[2]; ?>">
    </form>
  </ul>
<?php } ?>
</div>
