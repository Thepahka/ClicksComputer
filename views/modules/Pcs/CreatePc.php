<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Crear Pc</title>
    <header>
      <h1>Registrar Computador</h1>
    </header>
  </head>
  <body>
    <form class="" action="" method="post">
      <div class="">
        <label for="CreateId">Codigo del articulo</label>
        <input id="CreateId" type="text" name="data[]">
      </div>
      <div class="">
        <label for="CreateName">Nombre del computador</label>
        <input id="CreateName" type="text" name="data[]">
      </div>
      <div class="">
        <label for="CreateDesc">Descripcion del computador</label>
        <textarea id="CreateDesc" name="data[]"></textarea>
      </div>
      <div class="">
        <label for="CreateMod">Modelo del computador</label>
        <input id="CreateMod" type="text" name="data[]">
      </div>
      <div class="">
        <label for="CreateTip">Tipo de computador</label>
        <select id="CreateTip" name="data[]">
          <option value="">Seleccione</option>
        </select>
      </div>
      <div class="">
        <label for="CreateMarca">Marca del computador</label>
        <select id="CreateMarca" name="data[]">
        <option>Seleccione</option>
        </select>
      </div>
    </form>
  </body>
</html>
