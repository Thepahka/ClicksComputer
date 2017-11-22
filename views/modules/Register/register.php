<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro cc</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body>
    <div class="inicio-sesion">
      <div class="wrap-btn">
        <i class="fa fa-user-circle fa-5x user-icon" aria-hidden="true"></i>
        <p class="titulo-sesion">si ya tienes cuenta inicia sesion aqui!</p>
        <a href="Email"><input type="submit" class="btn-inicio" name="" value="Iniciar Sesion"></a>
      </div>
    </div>
    <div class="body-registro">
      <h1 class="registro-titulo">formulario de Registro</h1>
    <form class="wrap-formulario" action="Registrado" method="post">
      <div class="for-quest">
      <div class="for-quest">
        <label for="UsuId">Documento de Identidad</label>
        <input class="UsuId" id="UsuId" type="text" name="data[]" onkeyup="validate();">
      </div>
      <div class="for-quest">
        <label for="UsuNombre">Primer Nombre</label>
        <input class="UsuNombre" id="UsuNombre" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label for="UsuNombre2" class="notrequired">Segundo Nombre</label>
        <input class="UsuNombre2" id="UsuNombre2" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label for="UsuApellido">Primer Apellido</label>
        <input class="UsuApellido" id="UsuApellido" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label for="UsuApellido2" class="notrequired">Segundo Apellido</label>
        <input class="UsuApellido2" id="UsuApellido2" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label for="UsuTelefono" class="notrequired">Telefono</label>
        <input class="UsuTelefono" id="UsuTelefono" type="text" name="data[]">
      </div>
        <label for="UsuCorreo">Correo Electronico</label>
        <input class="UsuCorreo" id="UsuCorreo" type="email" name="data[]">
      </div>
      <div class="for-quest">
        <label for="UsuNacimiento">Fecha de Nacimiento</label>
        <input class="UsuNacimiento" id="UsuNacimiento" type="date" name="data[]">
      </div>
      <div class="for-quest">
        <label for="UsuContra">Contraseña</label>
        <input class="UsuContra" id="UsuContra" type="password" name="data[]">
      </div>
      <div class="for-quest">
        <input type="submit" id="validar" class="boton-registro" value="REGISTRARSE"></input>
        <h5 class="btn-mid"> o si tiene una empresa ingrese en :</h5>
        <input type="submit" id="validar" class="boton-empresa" value="EMPRESA"></input>
      </div>
    </form>
</div>
<?php include 'views/include/scope.header.php';
      include 'views/include/scope.menutopregistro.php';?>
  </body>
</html>
