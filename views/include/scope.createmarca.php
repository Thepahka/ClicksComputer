<div class="wrap-nav">
  <h1>Mis marcas</h1>
  <table id="marcas">
      <thead>
          <tr>
              <th>Nombre</th>
              <th>Acciones</th>
          </tr>
      </thead>
      <tbody>
        <?php
        $item = 0;
        foreach($this->Read() as $row) {
            $item++;
            ?>
          <tr>
            <td><?php echo $row["mar_nombre"]; ?></td>
              <td>
                  <a>Actualizar</a>
                  <a>Eliminar</a>
                  <a><?php echo $_SESSION["user"]["idemp"] ?></a>
              </td>
          </tr>
        <?php } ?>
      </tbody>
  </table>
  <div class="nav-btns">
    <a class="gest-pc" id="myBtn">Registrar marca</a>
  </div>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
    <p class="model-textp">Registrar nueva marca</p>
    <form class="" action="CrearMarca" method="post">
      <input type="text" name="data[]" value="">
      <input type="submit" value="Registrar marca">
    </form>
  </div>
</div>
<script type="text/javascript" src="views/assets/js/modal.js"></script>
</div>
