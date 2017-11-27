<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro cc para empresas</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-regisem">
    <div class="inicio-sesionregis">
    <div class="body-registroem">
      <h1 class="titulo-em">Registro de empresa</h1>
    <form class="wrap-formulario" action="Registrado-emp" method="post">
      <div class="for-quest">
      <div class="for-quest">
        <label for="EmpId">NIT o ID de la empresa</label>
        <input class="EmpId" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label for="EmpNom">Nombre de la empresa</label>
        <input class="EmpNom" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label for="EmpDir" class="notrequired">Direccion de la empresa</label>
        <input class="EmpDir" type="text" name="data[]">
      </div>
      <div class="for-quest">
        <label class="descrip-q" for="EmpDesc">Descripcion de la empresa</label>
        <textarea class="EmpDesc" name="data[]"></textarea>
      </div>
      <div class="for-quest">
        <label for="EmpTel" class="notrequired">Telefono de la empresa</label>
        <input class="EmpTel" type="text" name="data[]">
      </div>
        <label for="EmpCorreo">Correo electronico de la empresa</label>
        <input class="EmpCorreo" type="email" name="data[]">
      </div>
      <div class="for-quest">
        <label for="EmpContra">Contraseña</label>
        <input class="EmpContra" type="password" name="data[]">
      </div>
      <div class="for-quest">
        <input type="submit" class="boton-registro" value="Registrarse"></input>
      </div>
    </form>
</div>
<?php include 'views/include/scope.header.php';
      include 'views/include/scope.menutopregistro.php';?>
  </body>
</html>
