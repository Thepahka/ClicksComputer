<?php $categorias = $this->Read($_GET["data"], $_GET["data2"]); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
    <title>Actualizar categoria</title>
  </head>
  <body class="body-dash">
    <div class="wrap-nav modal">
      <h1 class="titulo-newpc">Actualizar categoria</h1>
    <form class="" action="CategoriaActualizada" method="post">
      <input type="hidden" readonly name="data[]" value="<?php echo $categorias[0][1]; ?>">
      <input type="hidden" readonly name="data[]" value="<?php echo $categorias[0][0]; ?>">
      <input type="text" name="data[]" value="">
      <input type="submit" value="Actualizar categoria">
    </form>
  </div>
  <script type="text/javascript" src="views/assets/js/modal.js"></script>
  </body>
</html>
