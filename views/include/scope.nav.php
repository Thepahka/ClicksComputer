<?php  $pc = $this->ReadPc();?>
<i id="cosa-no-c" class="fas fa-comment-dots"></i>
<div class="wrap-nav">
  <h1 class="nav-titulo">Mis productos</h1>
  <div class="nav-btns">
    <a class="gest-pc" id="myBtn">Registrar producto</a>
  </div>
  <table id="datapc">
      <thead>
          <tr class="grid-item-ob">
              <th>Nombre</th>
              <th>Modelo</th>
              <th>Tipo</th>
              <th>precio</th>
              <th>marca</th>
              <!-- <th>Acciones</th> -->
          </tr>
      </thead>
      <tbody>
        <?php
        foreach($pc as $row)
        {
        ?>
        <tr>
          <td><?php echo $row["pc_nom"]; ?></td>
          <td><?php echo $row["pc_mod"]; ?></td>
          <td><?php echo $row["tipopc_nom"]; ?></td>
          <td><?php echo $row["pc_precio"]; ?></td>
          <td><?php echo $row["mar_nombre"]; ?></td>
          <!-- <td></td> -->
        </tr>
      <?php } ?>
      </tbody>
  </table>
<div id="myModal" class="modal">
  <div class="modal-content-crearpro">
    <span class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
    <p class="model-textp">¿que tipo de producto desea registrar?</p>
    <a class="btn-dash" href="Registrar-Computador">Computador</a>
    <a class="btn-dash" href="Registrar-">pieza</a>
  </div>
</div>
<script type="text/javascript" src="views/assets/js/modal.js"></script>
</div>

<input type="checkbox" id="cerrarres2">
<div class="modalregis2">
  <div class="contenido-resg2">
    <ul>
      <h3 class="mod-regis">La dashboard no esta disponible para dispositivos moviles, puede actualizar sus datos aqui:</h3>
      <a class="bt-dash-res" href="GestionPerfil">Gestor de perfil</a>
    </ul>
  </div>
</div>
