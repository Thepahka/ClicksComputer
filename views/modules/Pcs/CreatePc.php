<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
    <title>Crear Pc</title>
    <?php require_once 'views/include/scope.menutopdashboard.php';
          require_once 'views/include/scope.profileenterprise.php';?>
  </head>
  <body class="body-dash">
    <div class="wrap-nav">
    <h1 class="nav-titulo">Registrar Computador</h1>
    <hr>
    <form class="wrap-pcnew" action="Registro-Completado" method="post">
        <label for="CreateId" class="cpc">Codigo del computador</label>
        <input id="CreateId" type="text" name="data[]" class="in-cpcod"></br>
        <label for="CreateName" class="cpc">Nombre del computador</label>
        <input id="CreateName" type="text" name="data[]" class="in-cpcname"></br>
        <label for="CreateDesc" class="cpc desc">Descripcion del computador</label>
        <textarea id="CreateDesc" name="data[]" class="in-cpcarea"></textarea></br>
        <label for="CreateMod" class="cpc">Modelo del computador</label>
        <input id="CreateMod" type="text" name="data[]" class="in-cpcmodel"></br>
        <label for="CreateTip" class="cpc">Tipo de computador</label>
        <input id="CreateTip" type="text" name="data[]" class="in-cpctipo"></br>
        <label for="CreateFicha" class="pdf cpc">Ficha tecnica del computador</label>
        <input id="CreateFicha" type="file" name="data[]" class="in-cpcficha custom-file-input"></br>
        <label for="CreateMarca" class="cpc">Marca del computador</label>
        <input id="CreateMarca" type="text" name="data[]" class="in-cpcmarca"></br>
        <label for="CreatePrecio" class="cpc">Precio del computador</label>
        <input id="CreatePrecio" type="text" name="data[]" class="in-cpcprecio"></br>
        <input id="CreateEnter" type="submit" class="btn-cpc" value="Registrar">
      </div>
    </form>
  <!-- <script type="text/javascript" src="views/assets/js/unputfile.js"></script> -->
  </body>
</html>
