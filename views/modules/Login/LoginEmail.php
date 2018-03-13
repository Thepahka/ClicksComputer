<?php
//session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-login">
    <div class="container" id="container">
      <i class="fas fa-circle-notch fa-spin fa-6x spiner-pre"></i>
      <!-- <div class="preloader">
        <p>Cargando...</p>
      </div> -->
    </div>
    <div class="wrap-login">
      <h2 class="titulo-up">Iniciar sesion</h2>
      <i class="fa fa-envelope email-icon fa-4x" aria-hidden="true"></i>
    <form class="formulario" action="Consulta" method="post">
        <input class="log-email des-log" id="LoginEmail" type="email" name="data[]" required>
        <label for="LoginEmail" class="des-co">Correo electronico</label>
        <input class="log-btn" id="EmailButton" type="submit" name="" value="Acceder">
    </form>
    <p class="mini-foot">Lorem ipsum dolor sit dasda est laborum.</p>
  </div>
  <script type="text/javascript" src="views/assets/js/cerrar.js"></script>
  </body>
  <?php include 'views/include/scope.header.php';
        include 'views/include/scope.menutopregistro.php';?>
</html>
