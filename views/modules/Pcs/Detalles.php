<?php
$resultados = $this->ReadDetailPc($_GET["data"], $_GET["data2"]);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    foreach($resultados as $row){
      $empnom = $row["emp_nom"];
      $imagen = $row["pc_img"];
      $pdf = $row["ficha_tecnica"];
      $ruta = "views/modules/Shop_User/$empnom/computadores/$imagen";
      $ruta2 = "views/modules/Shop_User/$empnom/computadores/$pdf";
      ?>
    <p><?php echo $row["pc_nom"]; ?></p>
    <img src="<?php echo $ruta; ?>" alt="">
    <p>Modelo: <?php echo $row["pc_mod"]; ?></p>
    <p>Marca: <?php echo $row["mar_nombre"]; ?></p>
    <p>Categoria: <?php echo $row["fil_nom"] ?></p>
    <a target="_blank" href="<?php echo $ruta2; ?>">ficha tecnica</a>
    <p>Descripcion: <?php echo $row["pc_desc"]; ?></p>
    <p><?php number_format($row["pc_precio"]); ?></p>
    <p>Tienda: <?php echo $row["emp_nom"]; ?></p>


  <?php } ?>
  </body>
</html>
