<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro cc</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-register">
    <div class="body-registro">
      <h1 class="registro-titulo">formulario de Registro</h1>
      <form id="validate" class="wrap-formulario" action="Registrado" method="post">
        <label for="UsuId">Documento de Identidad</label>
        <input class="UsuId" id="UsuId" type="text" name="data[]" onkeyup="validate();"><br>
        <label for="UsuNombre">Nombre(s)</label>
        <input class="UsuNombre" id="UsuNombre" type="text" name="data[]"><br>
        <label for="UsuApellido">Apellido(s)</label>
        <input class="UsuApellido" id="UsuApellido" type="text" name="data[]"><br>
        <label for="UsuTelefono" class="notrequired">Telefono</label>
        <input class="UsuTelefono" id="UsuTelefono" type="text" name="data[]"><br>
        <label for="UsuCorreo">Correo Electronico</label>
        <input class="UsuCorreo" id="UsuCorreo" type="email" name="data[]"><br>
        <label for="UsuNacimiento">Fecha de Nacimiento</label>
        <input class="UsuNacimiento" id="UsuNacimiento" type="date" name="data[]"><br>
        <label for="UsuContra">Contraseña</label>
        <input class="UsuContra" id="UsuContra" type="password" name="data[]"><br>
        <input type="submit" id="validar" class="boton-registro" value="REGISTRARSE"></input>
      </div>
    </form>
    <?php include 'views/include/scope.header.php';
      include 'views/include/scope.menutopregistro.php';?>
      <script src="views/assets/js/validaciones.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
