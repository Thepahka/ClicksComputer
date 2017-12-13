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
    if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
    {
    }
    else
    {
      header("Location: Email");
    }
    require_once "views/modules/Marcas/Marcaprincipal.php";
  }
  public function ViewNewMarca()
  {
    if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
    {
    }
    else
    {
      header("Location: Email");
    }
    require_once "views/modules/Marcas/NewMarca.php";
  }
  public function ViewUpdateMarca()
  {
    if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
    {
    }
    else
    {
      header("Location: Email");
    }
    require_once "views/modules/Marcas/ActualizarMarca.php.php";
  }

  public function CreateMarca()
  {
    $data = $_POST["data"];

    $marca = strtolower($data[0]);

    $result = $this->marca->ConsultIdEmp($_SESSION["user"]["correo"]);

    $result2 = $this->marca->ConsultMarca($marca);

    $_SESSION["user"]["idmar"] = $result2[0];
    $_SESSION["user"]["idemp"] = $result[0];

    if($data[0] == "")
    {
      echo '<script language="javascript">alert("Completa el campo con el nombre de la marca que desea registrar");</script>';
      echo "<script>history.back(1)</script>";
    }
    else
    {
      if($marca == $result2[1])
      {
        $this->marca->newMarca($_SESSION["user"]["idmar"], $_SESSION["user"]["correo"]);
        echo '<script language="javascript">
        alert("Marca registrada con exito");
        window.location.href="GestionMarcas"
        </script>';
      }
    }


  }

  public function Read()
  {
    $marid = $_SESSION["user"]["idemp"];
    $result = $this->marca->allMarcas($marid);
    return $result;
  }


}

?>
