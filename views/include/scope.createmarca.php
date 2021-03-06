<div class="wrap-nav">
  <h1 class="nav-titulo">Mis marcas</h1>
  <div class="nav-btns">
    <a class="gest-pc" id="myBtn">Registrar marca</a>
    <div class="wrap-marca-int">
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
        <p class="model-textp">Registrar nueva marca</p>
        <?php
        foreach($this->Read2() as $row2)
        {
        ?>
        <form id="nuevamarca" class="form-conta" action="CrearMarca" method="post">
          <div class="check-marca-c">
          <input  type="checkbox" name="data[]" id="" value="<?php echo $row2["mar_id"]; ?>">
          <label for="" class=""><?php echo $row2["mar_nombre"] ?></label>
      </div>
        <?php } ?>
          <input class="btn-dash-mar" type="submit" value="Registrar marca">
        </form>
        <p class="indicacion-res">Selecciona las marcas que quieres añadir a tu tienda.</p>
      </div>
    </div>
  </div>
</div>
<form class="" action="EliminarMarcas" method="post">
  <table id="marcas">
      <thead>
          <tr class="grid-item-ob">
              <th></th>
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
            <td>
              <input type="checkbox" name="eliminarvarios[]" value="<?php echo $row['mar_id']; ?>">
            </td>
            <td><?php echo $item; ?></td>
            <td><?php echo ucwords($row["mar_nombre"]); ?></td>
              <td>
                <a class="btn-datagrid" href="ActualizarMarcas-<?php  echo $row['mar_id']; ?>-<?php  echo $_SESSION['emp']['id']; ?>"><i class="fas fa-pen-square icono-accion"></i>Actualizar</a>
                <a class="btn-datagrid" href="EliminarMarca-<?php  echo $row['mar_id']; ?>-<?php  echo $_SESSION['emp']['id']; ?>" onclick="return confirmar(this)"><i class="fas fa-trash-alt icono-accion"></i>Eliminar</a>
                  <script type="text/javascript">
                  function confirmar()
                  {
                      if (confirm("Eliminar marca?")==false)
                      {
                          return false;
                      }
                      else
                      {
                          return true;
                      }
                  }
                  </script>
              </td>
          </tr>
        <?php } ?>
        <input class="btn-eliminarsc" type="submit" name="" value="Eliminar todos los seleccionados" onclick="return confirmar(this)">
      </tbody>
  </table>
</form>
  <div class="modal" id="myModal2">
    <div class="modal-content">
      <span class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
      <p class="model-textp">Actualizar categoria</p>
      <p class="indicacion-res">Escribe el nombre de la nueva categoria.</p>
      <form class="" action="CategoriaActualizada" method="post">
        <input class="crear-fmodalam" type="text" name="data[]" value=""  id="nombreCat">
        <input class="btn-dash-maram" type="submit" value="Actualizar categoria">
        <input type="hidden" readonly name="data[]" value="<?php echo $categorias[0][1]; ?>">
        <input type="hidden" readonly name="data[]" value="<?php echo $categorias[0][0]; ?>">
      </form>
    </div>
  </div>
<script type="text/javascript" src="views/assets/js/modal.js"></script>
</div>
