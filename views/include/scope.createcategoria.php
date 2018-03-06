<div class="wrap-nav">
  <h1 class="nav-titulo">Mis categorias</h1>
  <div class="nav-btns">
    <a class="gest-pc" id="myBtn">Registrar categoria</a>
    <div class="wrap-categoria-int">
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
        <p class="model-textp">Registrar nueva categoria</p>
        <form class="" action="CrearCategoria" method="post">
          <input type="text" name="data[]" value="">
          <input type="submit" value="Registrar categoria">
        </form>
      </div>
    </div>
  </div>
</div>
  <table id="categorias">
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
            <td><?php echo ucwords($row["fil_nom"]); ?></td>
              <td>
                  <a class="btn-datagrid" href="ActualizarCategorias-<?php echo $row['fil_id']; ?>-<?php echo $_SESSION['emp']['id']; ?>">Actualizar</a>
                  <a class="btn-datagrid" href="EliminarCategoria-<?php echo $row['fil_id']; ?>-<?php echo $_SESSION['emp']['id']; ?>">Eliminar</a>
              </td>
          </tr>
        <?php } ?>
      </tbody>
  </table>
<script type="text/javascript" src="views/assets/js/modal.js"></script>
</div>
