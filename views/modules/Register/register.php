<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro cc</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-register">
    <div class="container" id="container">
      <div class="preloader">
        <i class="fas fa-circle-notch fa-spin fa-6x spiner-pre"></i>
        <p>Cargando...</p>
      </div>
    </div>
    <div class="body-registro">
      <h1 class="registro-titulo">Formulario de Registro</h1>
        <div class="input-registrousuario">
          <form id="validate" class="wrap-formulario" action="Registrado" method="post">
            <input class="inputs-reg" id="UsuId" type="text" name="data[]" onkeyup="validate();"><br>
            <input class="inputs-reg" id="UsuNombre" type="text" name="data[]"><br>
            <input class="inputs-reg" id="UsuApellido" type="text" name="data[]"><br>
            <input class="inputs-reg" id="UsuTelefono" type="text" name="data[]"><br>
            <input class="inputs-reg" id="UsuCorreo" type="email" name="data[]"><br>
            <input class="inputs-reg" id="UsuNacimiento" type="date" name="data[]"><br>
            <input class="inputs-reg" id="UsuContra" type="password" name="data[]"><br>
            <input type="submit" id="validar" class="boton-registro" value="REGISTRARSE"></input>
        </div>
        <div class="label-registrousuario">
          <label class="labels-reg" for="UsuId">Documento de Identidad</label>
          <label class="labels-reg" for="UsuNombre">Nombre(s)</label>
          <label class="labels-reg" for="UsuApellido">Apellido(s)</label>
          <label class="labels-reg" for="UsuTelefono" class="notrequired">Telefono</label>
          <label class="labels-reg" for="UsuCorreo">Correo Electronico</label>
          <label class="labels-reg" for="UsuNacimiento">Fecha de Nacimiento</label>
          <label class="labels-reg" for="UsuContra">Contraseña</label>
        </div>
      </div>
    </form>
    <?php include 'views/include/scope.header.php';
      include 'views/include/scope.menutopregistro.php';?>
      <script src="views/assets/js/validaciones.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="views/assets/js/cerrar.js"></script>
  </body>
</html>
