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
  public function ReadDetailsPcs()
  {
    require_once "views/modules/Pcs/Detalles.php";
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
    return $result;
  }

  public function ReadDetailPc()
  {
    $empid = $_GET["data"];
    $pcid = $_GET["data2"];
    $result = $this->tienda->DetallePc($empid, $pcid);
    return $result;
  }

}

 ?>
