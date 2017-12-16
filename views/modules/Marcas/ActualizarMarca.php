<?php $marcas = $this->Read($_GET["data"], $_GET["data2"]); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar marca</title>
  </head>
  <body>
    <form class="" action="MarcaActualizada" method="post">
      <input type="hidden" readonly name="data[]" value="<?php echo $marcas[0][1]; ?>">
      <input type="hidden" readonly name="data[]" value="<?php echo $marcas[0][0]; ?>">
      <input type="text" name="data[]" value="">
      <input type="submit" value="Actualizar marca">
    </form>
  </body>
</html>
