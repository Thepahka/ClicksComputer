<?php
require_once "model/tienda.model.php";

class TiendaController
{
  private $tienda;

  public function __CONSTRUCT()
  {
    $this->tienda=new TiendaModel();
  }

  public function ViewTienda()
  {
    require_once "views/modules/tienda/tiendas.php";
  }

  public function ReadPcs()
  {
    require_once "views/modules/tienda/tiendaspc.php";
  }

  public function Read()
  {
    $result = $this->tienda->Tiendas();
    return $result;
  }

  public function ReadPc()
  {
    $empid = $_GET["data"];
    $result = $this->tienda->PcTiendas($empid);

    foreach($result as $row)
    {
      $empnom = $row["emp_nom"];
      $imagen = $row["pc_img"];
      $pdf = $row["ficha_tecnica"];

      $ruta = "views/modules/Shop_User/$empnom/computadores/$imagen";
      $ruta2 = "views/modules/Shop_User/$empnom/computadores/$pdf";
    echo "<div class='atri-con' id='Resultadospcs'>";
      echo "<p>".$row["pc_nom"]."</p>";
      echo "<img width='100px' height='300px' src=".$ruta."></img>";
      echo "<p>".$row['pc_precio']."</p>";
      echo "<p>".$row['mar_nombre']."</p>";
    echo "</div>";
    }

  }

}

 ?>
