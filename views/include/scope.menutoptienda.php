<div>
<?php
require_once("scope.header.php");
 ?>
</div>

  <div class="menu-top">
    <div class="cc">
      <a>clickscomputer</a>
      <img class="logo" src="views/assets/image/logo.png">
    </div>
    <div class="busc-cont">
      <i class="fas fa-search lupa-busqued"></i>
      <input class="busca-tien" type="text">
    </div>
    <div class="wrap--btn">
      <ul class="buttons-menu">
        <a class="item" href="ManualDeUsuario"><i class="fas fa-book manual-libro" aria-hidden="true"></i>Manual de usuario</a>
        <input class="item" id="mostrar-modal2" name="modal2" type="radio" />
        <label style="cursor:pointer;" for="mostrar-modal2" class="item">Productos</label style="cursor:pointer;">
        <input id="cerrar-modal2" name="modal2" type="radio" />
        <label for="cerrar-modal2"><i class="fas fa-times-circle fa-2x"></i></label>
        <div id="modal2">
          <input type="text" class="barra-busqueda" placeholder="Buscar..."></input>
          <p class="t-buscador">Productos</p>
          <i class="fas fa-search fa-2x icon-bus"></i>
        </div>
        <a class="item" href="main">regresar</a>
      </ul>
    </div>
</div>
