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
      <div class="wrap-labels-regem">
        <form class="wrap-formulario" action="Registrado-emp" method="post">
          <label class="labels-regem" for="EmpId">NIT o ID de la empresa</label><br>
          <label class="labels-regem" for="EmpNom">Nombre de la empresa</label><br>
          <label class="labels-regem" for="EmpDir" class="notrequired">Direccion de la empresa</label><br>
          <label class="labels-regem" for="EmpDesc">Descripcion de la empresa</label><br>
          <label class="labels-regem" for="EmpTel" class="notrequired">Telefono de la empresa</label><br>
          <label class="labels-regem" for="EmpCorreo">Correo de la empresa</label><br>
          <label class="labels-regem" for="EmpContra">Contraseña</label><br>
      </div>
        <div class="wrap-input-regem">
          <input class="input-regem" type="text" name="data[]"><br>
          <input class="input-regem" type="text" name="data[]"><br>
          <input class="input-regem" type="text" name="data[]"><br>
          <textarea class="input-regem" name="data[]"></textarea><br>
          <input class="input-regem" type="text" name="data[]"><br>
          <input class="input-regem" type="email" name="data[]"><br>
          <input type="input-regem" class="boton-registro" value="Registrarse"></input><br>
          <input class="input-regem" type="password" name="data[]"><br>
        </div>
    </form>
</div>
</div>
<?php include 'views/include/scope.header.php';
      include 'views/include/scope.menutopregistro.php';?>
  </body>
</html>
