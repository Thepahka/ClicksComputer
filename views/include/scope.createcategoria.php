<script>

    $(function(){
        $("#categoriaAdicional").on('click', function(){
            $("#nuevocategoria input:eq(0)").clone().appendTo("#nuevocategoria");
        });
    });
</script>
<div class="wrap-nav">
  <h1 class="nav-titulo">Mis categorias</h1>
  <hr>
  <div class="nav-btns">
    <a class="gest-pc" id="myBtn">Registrar categoria</a>
    <div class="wrap-categoria-int">
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
        <p class="model-textp">Registrar nueva categoria</p>
        <form id="nuevocategoria" class="" action="CrearCategoria" method="post">
          <input class="crear-fmodal" type="text" name="data[]" value="">
          <input class="btn-dash-mar" type="submit" value="Registrar categoria">
        </form>
        <input id="categoriaAdicional" type="submit" value="agregar producto">
      </div>
    </div>
  </div>
</div>
  <table id="categorias">
      <thead>
          <tr class="grid-item-ob">
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
                  <a class="btn-datagrid" href="ActualizarCategorias-<?php echo $row['fil_id']; ?>-<?php echo $_SESSION['emp']['id']; ?>"><i class="fas fa-pen-square"></i>Actualizar</a>
                  <a class="btn-datagrid" href="EliminarCategoria-<?php echo $row['fil_id']; ?>-<?php echo $_SESSION['emp']['id']; ?>"><i class="fas fa-trash-alt"></i>Eliminar</a>
              </td>
          </tr>
        <?php } ?>
      </tbody>
  </table>
<script type="text/javascript" src="views/assets/js/modal.js"></script>
</div>
