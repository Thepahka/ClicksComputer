<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
    <title>Crear Pc</title>
    <header>
      <h1>Registrar Computador</h1>
    </header>
  </head>
  <body>
    <form class="wrap-pcnew" action="Registro-Completado" method="post">
        <label for="CreateId">Codigo del computador</label>
        <input id="CreateId" type="text" name="data[]"></br>
        <label for="CreateName">Nombre del computador</label>
        <input id="CreateName" type="text" name="data[]"></br>
        <label for="CreateDesc">Descripcion del computador</label>
        <textarea id="CreateDesc" name="data[]"></textarea></br>
        <label for="CreateMod">Modelo del computador</label>
        <input id="CreateMod" type="text" name="data[]"></br>
        <label for="CreateTip">Tipo de computador</label>
        <input id="CreateTip" type="text" name="data[]"></br>
        <label for="CreateFicha" class="pdf">Ficha tecnica del computador</label>
        <input id="CreateFicha" type="file" name="data[]"></br>
        <label for="CreateMarca">Marca del computador</label>
        <input id="CreateMarca" type="text" name="data[]"></br>
        <label for="CreatePrecio">Precio del computador</label>
        <input id="CreatePrecio" type="text" name="data[]"></br>
        <input id="CreateEnter" type="submit" value="Registrar">
    </form>

    <?php require_once 'views/include/scope.menutopdashboard.php';
          require_once 'views/include/scope.profileenterprise.php';?>
  </body>
</html>
