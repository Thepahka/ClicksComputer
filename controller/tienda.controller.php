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
}

 ?>
