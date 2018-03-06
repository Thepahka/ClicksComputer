<?php $marcas = $this->Read($_GET["data"], $_GET["data2"]); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
    <title>Registrar marca</title>
  </head>
  <body>
    <div class="nav-btns">
      <div class="modal-content">
      <h1 class="titulo-newpc">Actualizar marca</h1>
    <form class="" action="MarcaActualizada" method="post">
      <input type="hidden" readonly name="data[]" value="<?php echo $marcas[0][1]; ?>">
      <input type="hidden" readonly name="data[]" value="<?php echo $marcas[0][0]; ?>">
      <input type="text" name="data[]" value="">
      <input type="submit" value="Actualizar marca">
    </form>
  </div>
    <form action="CrearMarca" method="post">
      <label for="Marca">Nombre de la marca</label>
      <input id="Marca" type="text" name="data[]">
      <input type="submit" name="" value="Registrar">
    </form>
  </div>
  <script type="text/javascript" src="views/assets/js/modal.js"></script>
  </body>
</html>
