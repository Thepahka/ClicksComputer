<?php
require_once "model/marca.model.php";

class MarcaController
{
  private $marca;

  public function __CONSTRUCT()
  {
    $this->marca = new MarcaModel;
  }

  public function ViewMarca()
  {
    require_once "views/modules/marcas.php";
  }

  public function ReadAll()
  {
    try
    {
      $result = $this->marca->readMarca();

      print_r($result);
    }
    catch(PDOException $e)
    {
      $e->getMessage();
    }
  }
}

?>
