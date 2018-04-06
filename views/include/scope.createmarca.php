<script>

    $(function(){
        $("#marcaAdicional").on('click', function(){
            $("#nuevamarca input:eq(0)").clone().addClass("crear-clon").appendTo("#nuevamarca");
        });
    });
</script>
<script>
function letrasynumeros(e){
  key=e.keyCode || e.which;

  teclado=String.fromCharCode(key).toLowerCase();

  letras="abcdefghijklmnopqrstuvwxyz";

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
</script>
<div class="wrap-nav">
  <h1 class="nav-titulo">Mis marcas</h1>
  <div class="nav-btns">
    <a class="gest-pc" id="myBtn">Registrar marca</a>
    <div class="wrap-marca-int">
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
        <p class="model-textp">Registrar nueva marca</p>
        <p class="indicacion-res">Escribe el nombre de las marcas aqui.</p>
        <input class="btn-dash-mar" id="marcaAdicional" type="submit" value="agregar marca">
        <form id="nuevamarca" class="form-conta" action="CrearMarca" method="post">
          <input class="crear-fmodal" type="text" name="data[]" value="" onkeypress="return letrasynumeros(event)" onpaste="return false">
          <input class="btn-dash-mar" type="submit" value="Registrar marca">
        </form>
      </div>
    </div>
  </div>
</div>
  <table id="marcas">
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
            <td><?php echo ucwords($row["mar_nombre"]); ?></td>
              <td>
                  <a id="myBtn" class="btn-datagrid" onclick="abrir('<?php echo $row["mar_nom"]; ?>',<?php echo $row['mar_id']; ?>,<?php echo $_SESSION['emp']['id'];?>)"><i class="fas fa-pen-square icono-accion"></i>Actualizar</a>
                  <a class="btn-datagrid" href="EliminarMarca-<?php echo $row['mar_id']; ?>-<?php echo $_SESSION['emp']['id']; ?>" onclick="return confirmar(this)"><i class="fas fa-trash-alt icono-accion"></i>Eliminar</a>
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
      </tbody>
  </table>
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
