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
    require_once "views/modules/Marcas/ActualizarMarca.php";
  }

  public function CreateMarca()
  {
    $data = $_POST["data"];

    $marca = strtolower($data[0]);

    $result = $this->marca->ConsultIdEmp($_SESSION["user"]["correo"]);

    $result2 = $this->marca->ConsultMarca($marca);

    $mi = $result2[0];

    $ei = $_SESSION["emp"]["id"];

    $result3 = $this->marca->AllMarcas2($mi, $ei);

    $_SESSION["user"]["idmar"] = $result2[0];
    $_SESSION["user"]["idemp"] = $result[0];


    if($data[0] == "")
    {
      echo '<script language="javascript">alert("Completa el campo con el nombre de la marca que desea registrar");</script>';
      echo "<script>history.back(1)</script>";
    }
    else
    {
      if($result3[0][0] == $result2[0] && $result3[0][1] == $_SESSION["emp"]["id"])
      {
        echo '<script language="javascript">alert("Esta marca ya se encuentra registrada en su tienda");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($marca == $result2[1])
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
    $marid = $_SESSION["emp"]["id"];
    $result = $this->marca->allMarcas($marid);
    return $result;
  }

  public function DeleteMar()
  {
    $data = $_GET["data"];
    $data2 = $_GET["data2"];
    $result = $this->marca->Delete($data, $data2);
    echo '<script language="javascript">
    alert("Marca eliminada con exito");
    window.location.href="GestionMarcas"
    </script>';
  }

  public function UpdateMar()
  {
    $data = $_POST["data"];

    $marca = $data[2];

    $result = $this->marca->ConsultMarca($marca);

    $newid = $result[0];

    $oldid = $data[0];

    $idemp = $_SESSION["emp"]["id"];

    $result3 = $this->marca->AllMarcas2($newid, $idemp);

    if($result3[0][0] == $oldid && $result3[0][1] == $idemp)
    {
      echo '<script language="javascript">alert("Esta marca ya se encuentra registrada en su tienda");</script>';
      echo "<script>history.back(1)</script>";
    }
    else
    {
      $result2 = $this->marca->Update($newid, $oldid, $idemp);
      echo '<script language="javascript">
      alert("Marca actualizada con exito");
      window.location.href="GestionMarcas"
      </script>';
    }
  }


}

?>
