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

  public function Read()
  {
    $result = $this->tienda->Tiendas();
    return $result;
  }

  public function ReadPc()
  {
    $empid = $_GET["data"];
    $result = $this->tienda->PcTiendas($empid);
    $tienda = $result[0][14];
    $pdf = $result[0][8];
    $img = $result[0][10];
    $pc = $result[0][2];

    $ruta = "views/modules/Shop_User/$tienda/computadores/$img";
    $ruta2 = "views/modules/Shop_User/$tienda/computadores/$pdf";

    echo "<img src=".$ruta."></img>";

  }

}

 ?>
