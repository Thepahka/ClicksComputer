<div class="wrap-nav">
  <h1 class="nav-titulo">Mis marcas</h1>
  <hr>
  <div class="nav-btns">
    <a class="gest-pc" id="myBtn">Registrar marca</a>
    <div class="wrap-marca-int">
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
        <p class="model-textp">Registrar nueva marca</p>
        <form class="" action="CrearMarca" method="post">
          <input class="crear-marca-fmodal" type="text" name="data[]" value="">
          <input class="btn-dash-mar" type="submit" value="Registrar marca">
        </form>
      </div>
    </div>
  </div>
</div>
  <table id="marcas">
      <thead>
          <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Acciones</th>
          </tr>
      </thead>
      <tbody class="table-grid">
        <?php
          $item = 0;
          foreach($this->Read() as $row) {
            $item++
            ?>
          <tr>
            <td><?php echo $item; ?></td>
            <td><?php echo ucwords($row["mar_nombre"]); ?></td>
              <td>
                  <a class="btn-datagrid" href="ActualizarMarcas-<?php echo $row['mar_id']; ?>-<?php echo $_SESSION['emp']['id']; ?>">Actualizar</a>
                  <a class="btn-datagrid" href="EliminarMarca-<?php echo $row['mar_id']; ?>-<?php echo $_SESSION['emp']['id']; ?>">Eliminar</a>
              </td>
          </tr>
        <?php } ?>
      </tbody>
  </table>
<script type="text/javascript" src="views/assets/js/modal.js"></script>
</div>
