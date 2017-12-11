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
    require_once "views/modules/Marcas/Marcaprincipal.php";
  }
  public function ViewNewMarca()
  {
    require_once "views/modules/Marcas/NewMarca.php";
  }
  public function ViewUpdateMarca()
  {
    require_once "views/modules/Marcas/ActualizarMarca.php.php";
  }

  public function CreateMarca()
  {
    $data = $_POST["data"];

    $marca = strtolower($data[0]);

    $result = $this->marca->ConsultIdEmp($_SESSION["user"]["correo"]);

    $result2 = $this->marca->ConsultMarca($marca);

    $_SESSION["emp"]["id"] = $result[0];

    $_SESSION["emp"]["idmar"] = $result2[0];

    if(strtolower($data[0]) == strtolower($result2[1]))
    {
      $result3 = $this->marca->newMarca2($_SESSION["emp"]["id"], $_SESSION["emp"]["idmar"]);
      echo '<script language="javascript">
      alert("Se registro la marca con exito");
      // window.location.href="MyDashboard";
      </script>';
    }
    else
    {
      $result4 = $this->marca->newMarca($marca);
      $result3 = $this->marca->newMarca2($_SESSION["emp"]["id"], $_SESSION["emp"]["idmar"]);
      // echo '<script language="javascript">
      // alert("Se registro la marca con exito");
      // // window.location.href="MyDashboard";
      // </script>';
    }
  }



}

?>
