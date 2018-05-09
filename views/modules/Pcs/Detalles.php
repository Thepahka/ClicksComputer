<?php
$resultados = $this->ReadDetailPc($_GET["data"], $_GET["data2"]);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>detalle pc</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body>
    <div class="det-pc-co">
    <?php
    foreach($resultados as $row){
      $empnom = $row["emp_nom"];
      $imagen = $row["pc_img"];
      $pdf = $row["ficha_tecnica"];
      $ruta = "views/modules/Shop_User/$empnom/computadores/$imagen";
      $ruta2 = "views/modules/Shop_User/$empnom/computadores/$pdf";
      ?>
    <p class="nom-pc-de"><?php echo $row["pc_nom"]; ?></p>
    <img class="det-im-pc" src="<?php echo $ruta; ?>" alt="">
    <div class="detalles-con-det">
    <p class="detalle-pa">Modelo: <?php echo $row["pc_mod"]; ?></p>
    <p class="detalle-pa">Marca: <?php echo $row["mar_nombre"]; ?></p>
    <p class="detalle-pa">Categoria: <?php echo $row["fil_nom"] ?></p>
    <a class="detalle-pa ficha-de" target="_blank" href="<?php echo $ruta2; ?>">ficha tecnica</a>
    <p class="detalle-pa">Descripcion: <?php echo $row["pc_desc"]; ?></p>
    <p class="detalle-pa"><?php number_format($row["pc_precio"]); ?></p>
    <p class="detalle-pa">Tienda: <?php echo $row["emp_nom"]; ?></p>
  <?php } ?>
</div>
</div>
  </body>
  <?php require_once 'views/include/scope.header.php';
        require_once 'views/include/scope.menutoptienda.php';
        require_once 'views/include/scope.menutiendas.php';
 ?>
</html>
