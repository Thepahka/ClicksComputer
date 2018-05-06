<!-- <script>
function letrasynumeros(e){
  key=e.keyCode || e.which;

  teclado=String.fromCharCode(key).toLowerCase();

  letras="abcdefghijklmnopqrstuvwxyzñ";

  especiales="8-37-38-46-164";

  teclado_especial=false;

  for(var i in especiales){
    if(key==especiales[i]){
      teclado_especial=true;break;
    }
  }
  if(letras.indexOf(teclado)==-1 && !teclado_especial){
    return false;
  }
}
</script> -->
<div class="wrap-nav">
  <h1 class="nav-titulo">Mis categorias</h1>
  <div class="nav-btns">
    <a class="gest-pc" id="myBtn">Registrar categoria</a>
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
        <p class="model-textp">Registrar nueva categoria</p>
        <?php
         foreach($this->Read2() as $row)
         {
        ?>
        <form id="nuevocategoria" class="form-conta" action="CrearCategoria" method="post">
          <input  type="checkbox" name="data[]" id="ch-bx" value="<?php echo $row["fil_id"]; ?>">
        <label for="ch-bx" class="ch-name"><?php echo $row["fil_nom"] ?></label>
        <?php } ?>
        <input class="btn-dash-mar" type="submit" value="Registrar categoria">
    </form>
        <p class="indicacion-res">Selecciona las categorias que quieres añadir a tu tienda.</p>
      </div>
    </div>
</div>
<form class="" action="EliminarCategorias" method="post">
  <table id="categorias">
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
                <input type="checkbox" name="eliminarvarios[]" value="<?php echo $row['fil_id']; ?>">
            </td>
            <td><?php  echo $item; ?></td>
            <td><?php  echo ucwords($row["fil_nom"]); ?></td>
              <td>
                  <a class="btn-datagrid" href="ActualizarCategorias-<?php  echo $row['fil_id']; ?>-<?php  echo $_SESSION['emp']['id']; ?>"><i class="fas fa-pen-square icono-accion"></i>Actualizar</a>
                  <a class="btn-datagrid" href="EliminarCategoria-<?php  echo $row['fil_id']; ?>-<?php  echo $_SESSION['emp']['id']; ?>" onclick="return confirmar(this)"><i class="fas fa-trash-alt icono-accion"></i>Eliminar</a>
                  <script type="text/javascript">
                  function confirmar()
                  {
                      if (confirm("Eliminar categoria(s)?")==false)
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
        <?php  } ?>
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
