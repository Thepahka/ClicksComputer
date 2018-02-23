<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesion</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-login">
    <div class="wrap-login">
      <h2 class="titulo-up">Iniciar sesion</h2>
      <i class="fa fa-lock pass-icon fa-5x" aria-hidden="true"></i>
    <form class="" action="ConsultaP" method="post">
        <input class="log-pass des-logc" id="LoginPass" type="password" name="data[]">
        <label for="LoginPass" class="des-con">Contraseña</label>
        <input class="log-btn" id="PassEmail" type="submit" name="" value="Ingresar">
        <p class="mini-foot">Lorem ipsum dolor sit dasda est laborum.</p>
    </form>
  </div>
  </body>
  <?php include 'views/include/scope.header.php';
        include 'views/include/scope.menutopregistro.php';?>
</html>
