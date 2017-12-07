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
    <form class="" action="Registro-Completado" method="post">
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
        <input id="CreateTip" type="text" name="data[]">
        </input>
      </div>
      <div class="">
        <label for="CreateFicha">Ficha tecnica del computador</label>
        <input id="CreateFicha" type="text" name="data[]">
      </div>
      <!-- <div class="">
        <label for="CreateMarca">Marca del computador</label>
        <input id="CreateMarca" type="text" name="data[]">
      </div> -->
      <div class="">
        <input id="CreateEnter" type="submit" value="Registrar">
      </div>
    </form>
  </body>
</html>
