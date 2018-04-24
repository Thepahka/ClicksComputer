<div>
<?php
require_once("scope.header.php");
 ?>
</div>
  <div class="menu-top">
    <div class="cc">
      <i class="fas fa-bars icon-r"></i>
      <a class="cc-letra">clickscomputer</a>
      <img class="logo" src="views/assets/image/logo.png">
    </div>
    <div class="wrap--btn">
      <ul class="buttons-menu">
        <a class="item" href="views/modules/manual_de_usuario/indexmanual.html"><i class="fas fa-book manual-libro" aria-hidden="true"></i>Manual de usuario</a>
        <a class="item" href="Tiendas"><i aria-hidden="true"></i>Tiendas</a>
        <input class="item" id="mostrar-modal2" name="modal2" type="radio" />
        <label style="cursor:pointer;" for="mostrar-modal2" class="item">Productos</label style="cursor:pointer;">
        <input id="cerrar-modal2" name="modal2" type="radio" />
        <label for="cerrar-modal2"><i class="fas fa-times-circle fa-2x"></i></label>
        <div id="modal2">
          <input type="text" class="barra-busqueda" placeholder="Buscar..."></input>
          <p class="t-buscador">Productos</p>
          <i class="fas fa-search fa-2x icon-bus"></i>
          <div class="contenedor-productos">
            <h3 style=" color:black;">feo</h3><br>
            <h3 style=" color:black;">feo</h3><br>
            <h3 style=" color:black;">feo</h3><br>
            <h3 style=" color:black;">feo</h3><br>
            <h3 style=" color:black;">feo</h3><br>
          </div>
        </div>
        <a class="item" href="Email"><i class="fa fa-user-plus f-re" aria-hidden="true"></i>acceder</a>
      </ul>
    </div>
    <?php require_once 'views/include/scope.header.php';?>
</div>
