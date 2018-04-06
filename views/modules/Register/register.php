<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro cc</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-register" id="validaciones">
    <div class="container" id="container">
      <i class="fas fa-circle-notch fa-spin fa-6x spiner-pre"></i>
      <!-- <div class="preloader">
        <p>Cargando...</p> -->
      </div>
    </div>
    <input type="checkbox" id="cerrarres">
    <label for="cerrarres" id="btn-cerrarres">x</label>
    <div class="modalregis">
      <div class="contenido-resg">
          <ul>
            <h3>Por favor tenga en cuenta a la hora de registrarse que:</h3>
          </ul>
          <ul>
            <p>-Los campos Documento de identidad y Telefono solo aceptan números</p>
            <p>-Los campos Nombre(s) y Apellido(s) solo aceptan letras</p>
            <p>-El campo correo electronico solo acepta correos validos (que tengan @texto.texto)</p>
            <p>-Debe ingresar una fecha valida</p>
            <p>-El campo contraseña solo acepta minimo 8 caracteres y que contenga minimo una letra y un número</p>
          </ul>

    </div>
    </div>
    <div class="body-registro">
      <h1 class="registro-titulo">Formulario de Registro</h1>
        <div class="input-registrousuario">
          <form name="form" id="validate" class="wrap-formulario" action="Registrado" method="post">
            <input class="inputs-reg" id="UsuId" type="text" name="data[]"><br>
            <div class="" id="msg">
            </div>
            <input class="inputs-reg" id="UsuNombre" type="text" name="data[]"><br>
            <div class="" id="msg2">
            </div>
            <input class="inputs-reg" id="UsuApellido" type="text" name="data[]"><br>
            <input class="inputs-reg" id="UsuTelefono" type="text" name="data[]"><br>
            <input class="inputs-reg" id="UsuCorreo" type="text" name="data[]"><br>
            <input class="inputs-reg" id="UsuNacimiento" type="date" name="data[]"><br>
            <input class="inputs-reg" id="UsuContra" type="password" name="data[]"><br>
            <input name="boton" type="submit" id="validar" class="boton-registro" value="REGISTRARSE"></input>
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
  <?php require_once 'views/include/scope.header.php';
        require_once 'views/include/scope.menutopregistro.php';?>
  <script src="views/assets/js/validaciones.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="views/assets/js/cerrar.js"></script>
  <script type="text/javascript" src="views/assets/js/validaciones.js">
  </script>
</body>
</html>
