<!DOCTYPE html>
<html class="noneed-overflow">
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesion</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-login">
    <div class="container" id="container">
      <i class="fas fa-circle-notch fa-spin fa-6x spiner-pre"></i>
    </div>
  </div>
    <div class="wrap-login">
      <h2 class="titulo-up">Iniciar sesion</h2>
      <i class="fa fa-lock email-icon fa-4x" aria-hidden="true"></i>
    <form class="" action="ConsultaP" method="post">
        <input class="log-email des-log" id="LoginPass" type="password" name="data[]">
        <label for="LoginPass" class="des-con">Contraseña</label>
        <input class="log-btn" id="PassEmail" type="submit" name="" value="Ingresar">
        <p class="mini-foot">la contraseña debe de coincidir con el correo ingresado anterior mente para abrir la vista del usuario segun su rol.</p>
    </form>
  </div>
    <script type="text/javascript" src="views/assets/js/cerrar.js"></script>
  </body>
  <?php include 'views/include/scope.header.php';
        include 'views/include/scope.menutopregistro.php';?>
</html>
