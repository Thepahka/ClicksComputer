<?php $registrosmarcas = $this->Read(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mis Marcas</title>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  </head>
  <body>
    <a href="NuevaMarca"><input type="submit" name="" value="Registrar nueva marca"></a>
    <h1>Mis marcas</h1>
    <table id="marcas">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
    </table>
    <script type="text/javascript" src="views/assets/js/datagrid.js"></script>
  </body>
</html>
