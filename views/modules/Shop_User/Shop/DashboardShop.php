<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-dash">

    <?php
  //  echo "Gestion"." ".($_SESSION["user"]["nombre"]);
  ?>
<!--
    <a class="gest-pc" href="Registrar-Computador">Registrar un nuevo computador</a>
    <a class="gest-pc" href="Actualizar-Computador">Actualizar computador</a> -->

    <?php require_once 'views/include/scope.menutopdashboard.php';
          require_once 'views/include/scope.profileenterprise.php';?>

  </body>
</html>
