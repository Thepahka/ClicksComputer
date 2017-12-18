<?php $marcas = $this->Read($_GET["data"], $_GET["data2"]); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
    <title>Actualizar marca</title>
  </head>
  <body class="body-dash">
    <div class="wrap-nav">
      <h1 class="titulo-newpc">Actualizar marca</h1>
    <form class="" action="MarcaActualizada" method="post">
      <input type="hidden" readonly name="data[]" value="<?php echo $marcas[0][1]; ?>">
      <input type="hidden" readonly name="data[]" value="<?php echo $marcas[0][0]; ?>">
      <input type="text" name="data[]" value="">
      <input type="submit" value="Actualizar marca">
    </form>
  </div>
    <?php require_once 'views/include/scope.menutopdashboard.php';
    require_once 'views/include/scope.profileenterprise.php';?>
  </body>
</html>
