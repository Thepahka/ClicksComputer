<!DOCTYPE html>
<html class="noneed-overflow">
  <head>
    <meta charset="utf-8">
    <title>Registro cc para empresas</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-regisem">
    <div class="container" id="container">
      <i class="fas fa-circle-notch fa-spin fa-6x spiner-pre"></i>
    </div>
    <input type="checkbox" id="cerrarres">
    <label for="cerrarres" id="btn-cerrarres">x</label>
    <div class="modalregis">
      <div class="contenido-resg">
        <ul>
          <h3 class="mod-regis">Por favor tenga en cuenta a la hora de registrar su Tienda/Empresa que:</h3>
        </ul>
        <ul>
          <p class="mod-regis-p">-Debe registrar su Tienda/Empresa con un NIT valido</p>
          <p class="mod-regis-p">-Los campos NIT o ID de la empresa y telefono de la empresa solo aceptan datos númericos</p>
          <p class="mod-regis-p">-El campo Nombre de la empresa solo acepta letras</p>
          <p class="mod-regis-p">-Puede colocar una descripcion corta de la empresa y luego modificarla</p>
          <p class="mod-regis-p">-El campo correo electronico solo acepta correos validos(que tengan @texto.texto)</p>
          <p class="mod-regis-p">-El campo contraseña solo acepta minimo 8 caracteres y que contenga minimo una letra y un número</p>
        </ul>
      </div>
    </div>
    <div class="inicio-sesionregis">
    <div class="body-registroem">
      <h1 class="titulo-em">Registro de empresa</h1>
      <div class="wrap-labels-regem">
        <!-- la accion del formulario llama a la funcion que esta en el controlador -->
        <!-- el metodo post es como se van a enviar los datos para que se resivan en php -->
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
          <div class="contenedornit">
            <!-- los campos $data[] almacenan los datos que se van a insertar en la base de datos  -->
          <input class="input-regem" type="text" name="data[]" style="bottom:3px; width:180px;">
          <label class="migadepan2">-</label>
          <input type="text" name="complemento" class="input-regem" style="width:87px; bottom:3px;">
        </div>
          <input class="input-regem" type="text" name="data[]"><br>
          <input class="input-regem" type="text" name="data[]"><br>
          <textarea class="input-regem" name="data[]"></textarea><br>
          <input class="input-regem" type="text" name="data[]"><br>
          <input class="input-regem" type="text" name="data[]"><br>
          <input class="input-regem" type="password" name="data[]"><br>
          <!-- el boton dentro del formulario me ejecuta la accion que tiene el formulario -->
          <input  type="submit" class="boton-registroem input-regem" value="Registrarse"></input><br>
        </div>
    </form>
</div>
</div>
<?php require_once 'views/include/scope.header.php';
      require_once 'views/include/scope.menutopregistro.php';?>
      <script type="text/javascript" src="views/assets/js/cerrar.js"></script>
  </body>
</html>
