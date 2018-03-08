<?php
require_once "model/categoria.model.php";

class CategoriaController
{
  private $categoria;

  public function __CONSTRUCT()
  {
    $this->categoria = new CategoriaModel;
  }

  public function ViewCategoria()
  {
    if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
    {
    }
    else
    {
      header("Location: Email");
    }
    require_once "views/modules/Categorias/Categoriaprincipal.php";
  }

  public function ViewNewCategoria()
  {
    if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
    {
    }
    else
    {
      header("Location: Email");
    }
    require_once "views/modules/Categorias/NewCategoria.php";
  }

  public function ViewUpdateCategoria()
  {
    if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
    {
    }
    else
    {
      header("Location: Email");
    }
    require_once "views/modules/Categorias/ActualizarCategoria.php";
  }

  public function CreateCategoria()
  {
      $data = $_POST["data"];

      $idempresa = $_SESSION["emp"]["id"];

      $nomcategoria = $data[0];

      $result = $this->categoria->ConsultCategoria($nomcategoria);

      if($data[0] == "")
      {
          echo '<script language="javascript">alert("Completa el campo con el nombre de la categoria que desea registrar");</script>';
          echo "<script>history.back(1)</script>";
      }
      elseif($result[3] == $idempresa)
      {
          echo '<script language="javascript">alert("Esta categoria ya esta registrada en tu tienda");</script>';
          echo "<script>history.back(1)</script>";
      }
      else
      {
          $this->categoria->newCategoria($nomcategoria ,$idempresa);
          echo '<script language="javascript">alert("Categoria registrada con exito");</script>';
          echo "<script>history.back(1)</script>";
      }
      // $this->categoria->newCategoria($nomcategoria, $idempresa);
  }

  public function Read()
  {
      $empid = $_SESSION["emp"]["id"];
      $result = $this->categoria->allCategorias($empid);
      return $result;
  }

  public function DeleteCat()
  {
    $data = $_GET["data"];
    $data2 = $_GET["data2"];
    $result = $this->categoria->Delete($data, $data2);
    echo '<script language="javascript">
    alert("Categoria eliminada con exito");
    window.location.href="GestionCategorias"
    </script>';
  }

  public function UpdateCat()
  {
    $data = $_POST["data"];

    print_r($data);

    $categoria = $data[2];

    $result = $this->categoria->ConsultCategoria($categoria);

    $newid = $result[0];

    $oldid = $data[0];

    $idemp = $_SESSION["emp"]["id"];

    $result3 = $this->categoria->AllCategorias2($newid, $idemp);

    if($result3[0][0] == $oldid && $result3[0][1] == $idemp)
    {
      echo '<script language="javascript">alert("Esta categoria ya se encuentra registrada en su tienda");</script>';
      echo "<script>history.back(1)</script>";
    }
    else
    {
      $result2 = $this->categoria->Update($newid, $oldid, $idemp);
      echo '<script language="javascript">
      alert("Categoria actualizada con exito");
      window.location.href="GestionCategorias"
      </script>';
    }
   }


}

?>