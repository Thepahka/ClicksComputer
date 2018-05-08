<?php
$result = $this->ReadPc($_GET["data"]);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tiendas</title>
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
  </head>
  <body class="body-tienda">
    <?php
    require_once 'views/include/scope.menutiendaspc.php';
    ?>

    <?php
    foreach($result as $row)
    {
      $empnom = $row["emp_nom"];
      $imagen = $row["pc_img"];
      $pdf = $row["ficha_tecnica"];
      $ruta = "views/modules/Shop_User/$empnom/computadores/$imagen";
      $ruta2 = "views/modules/Shop_User/$empnom/computadores/$pdf";
     ?>
     <div class="producto-ti-lado">
           <div class="pro-ti-co-la">
             <img class="img-prod" src="<?php echo $ruta ?>">
             <div class="atri-con">
             <p class="atribu-pro"><?php echo $row["pc_nom"]; ?></p>
             <p class="atribu-pro"><?php echo number_format($row["pc_precio"]); ?></p>
             <p class="atribu-pro"><?php echo $row["mar_nombre"]; ?></p>
             </div>
           </div>
         </div>
  <?php } ?>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="Javascript" src="views/assets/js/ajax.js"></script>
  </body>
  <?php require_once 'views/include/scope.header.php';
  require_once 'views/include/scope.menutoptiendapc.php'; ?>
</html>
