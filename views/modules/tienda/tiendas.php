<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tiendas</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-tienda">
    <div class="tex-tie-ayu">
      <p><i class="fas fa-arrow-alt-circle-left"></i>Porfavor seleccione una tienda.</p>
    </div>
    <?php
    require_once 'views/include/scope.menutiendas.php';
    ?>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="Javascript" src="views/assets/js/ajax.js"></script>
  </body>
  <?php require_once 'views/include/scope.header.php';
  require_once 'views/include/scope.menutoptienda.php'; ?>
</html>
