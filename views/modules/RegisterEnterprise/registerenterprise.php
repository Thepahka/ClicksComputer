<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro cc para empresas</title>
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
    <form class="wrap-formulario" action="Registrado-emp" method="post">
      <div class="for-quest">
      <div class="for-quest">
        <label for="EmpId">NIT o ID de la empresa</label>
        <input class="EmpId" id="EmpId" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label for="EmpNom">Nombre de la empresa</label>
        <input class="EmpNom" id="EmpNombre" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label for="EmpDir" class="notrequired">Direccion de la empresa</label>
        <input class="EmpDir" id="EmpNombre2" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label for="EmpDesc">Descripcion de la empresa</label>
        <textarea class="EmpDesc" id="EmpApellido"name="data[]"></textarea>
      </div>
      <div class="for-quest">
        <label for="EmpTel" class="notrequired">Telefono de la empresa</label>
        <input class="EmpTel" id="EmpApellido2" type="text" name="data[]">
      </div>
        <label for="EmpCorreo">Correo electronico de la empresa</label>
        <input class="EmpCorreo" id="EmpCorreo" type="email" name="data[]">
      </div>
      <div class="for-quest">
        <label for="EmpContra">Contraseña</label>
        <input class="EmpContra" id="EmpContra" type="password" name="data[]">
      </div>
      <div class="for-quest">
        <input type="submit" id="validar" class="boton-registro" value="Registrarse"></input>
      </div>
    </form>
</div>
<?php include 'views/include/scope.header.php';
      include 'views/include/scope.menutopregistro.php';?>
  </body>
</html>
