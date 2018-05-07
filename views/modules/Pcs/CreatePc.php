<?php
  $filtros = $this->Filtros();
  $Tipos = $this->Tipos();
  $Marcas = $this->Marcas();
?>
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
    <form class="wrap-pcnew" action="Computador-Registrado" method="post" enctype="multipart/form-data">
        <label for="CreateId" class="cpc">Codigo del computador</label>
        <input id="CreateId" type="text" name="data[]" class="in-cpcod"></br>
        <label for="CreateName" class="cpc">Nombre del computador</label>
        <input id="CreateName" type="text" name="data[]" class="in-cpcname"></br>
        <label for="CreateDesc" class="cpc desc">Descripcion del computador</label>
        <textarea id="CreateDesc" name="data[]" class="in-cpcarea"></textarea></br>
        <label for="CreateMod" class="cpc">Modelo del computador</label>
        <input id="CreateMod" type="text" name="data[]" class="in-cpcmodel"></br>
        <label for="CreateMarca" class="cpc">Marca del computador</label>
        <select id="CreateMarca" type="text" name="data[]" class="in-cpcmarca">
          <?php
          foreach($Marcas as $row3)
          {
          ?>
          <option value="<?php echo $row3["mar_id"] ?>"><?php echo $row3["mar_nombre"]; ?></option><br>
        <?php } ?>
      </select><br>

        <label for="CreateTip" class="cpc">Tipo de computador</label>
        <select id="CreateTip" name="data[]" class="in-cpctipo"></br>
          <?php
            foreach($Tipos as $row2)
            {
          ?>
          <option value="<?php echo $row2["tipopc_id"]; ?>"><?php echo $row2["tipopc_nom"]; ?></option></br>
        <?php } ?>
      </select><br>
        <label for="CreateTip" class="cpc">Categoria del computador</label>
        <select id="CreateTip" name="data[]" class="in-cpctipo2">
          <?php
          foreach($filtros as $row)
          {
            ?>
          <option value="<?php echo $row["fil_id"]; ?>"><?php echo $row["fil_nom"] ?></option>
        <?php } ?>
      </select><br>
        <label for="CreateFicha" class="pdf cpc">Ficha tecnica del computador</label>
        <input id="CreateFicha" type="file" name="ficha" class="custom-file-input input-filep2"></br>
        <label for="CreatePrecio" class="cpc">Precio del computador</label>
        <input id="CreatePrecio" type="text" name="data[]" class="in-cpcprecio"></br>
        <label for="CreatePrecio" class="cpc">Imagen del producto.</label>
        <input type="file" name="imagen" value="" class="custom-file-input input-filep"><br>
        <input id="CreateEnter" type="submit" class="createpc" value="Registrar producto">
      </div>
    </form>
  <!-- <script type="text/javascript" src="views/assets/js/unputfile.js"></script> -->
  </body>
</html>
