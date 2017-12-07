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
        <label for="EmpId">NIT o ID de la empresa</label>
        <input class="EmpId" type="text" name="data[]"><br>
        <label for="EmpNom">Nombre de la empresa</label>
        <input class="EmpNom" type="text" name="data[]"><br>
        <label for="EmpDir" class="notrequired">Direccion de la empresa</label>
        <input class="EmpDir" type="text" name="data[]"><br>
        <label class="descrip-q" for="EmpDesc">Descripcion de la empresa</label>
        <textarea class="EmpDesc" name="data[]"></textarea><br>
        <label for="EmpTel" class="notrequired">Telefono de la empresa</label>
        <input class="EmpTel" type="text" name="data[]"><br>
        <label for="EmpCorreo">Correo de la empresa</label>
        <input class="EmpCorreo" type="email" name="data[]"><br>
        <label for="EmpContra">Contraseña</label>
        <input class="EmpContra" type="password" name="data[]"><br>
        <input type="submit" class="boton-registro" value="Registrarse"></input><br>
    </form>
</div>
</div>
<?php include 'views/include/scope.header.php';
      include 'views/include/scope.menutopregistro.php';?>
  </body>
</html>
