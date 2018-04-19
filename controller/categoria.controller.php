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

      $idemp = $_SESSION["emp"]["id"];

      while(true)
       {
         $allcategorias = current($data);

         $asignarcategorias=(( $allcategorias !== false) ? $allcategorias : ", &nbsp;");

         $result = $this->categoria->newCategoria($allcategorias, $idemp);
         echo '<script language="javascript">alert("Categoria(s) registrada(s) con exito!");</script>';
         echo "<script>window.location.href='GestionCategorias'</script>";

         $allcategorias = next($data);

         if($allcategorias === false && $allcategorias === false)
         {
           break;
         }
       }
  }

  public function Read()
  {
      $empid = $_SESSION["emp"]["id"];
      $result = $this->categoria->allCategorias($empid);
      return $result;
  }

  public function Read2()
  {
      $empid = $_SESSION["emp"]["id"];
      $result = $this->categoria->Categorias();
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

  public function DeleteCats()
  {
    $datos = $_POST["eliminarvarios"];
    $eliminar = implode(",",$datos);
    $idemp = $_SESSION["emp"]["id"];
    $result = $this->categoria->EliminarVarios($idemp,$eliminar);
    echo '<script language="javascript">
    alert("Categoria(s) eliminada(s) con exito");
    window.location.href="GestionCategorias"
    </script>';
  }

  public function UpdateCat()
  {

    // $result = $this->categoria->allCategorias2($idcat, $empid);
    // print_r($result[0][1]);



    // $result2 = $this->categoria->Update($newid, $oldid, $idemp);
    // echo '<script language="javascript">
    // alert("Categoria actualizada con exito");
    // window.location.href="GestionCategorias"
    // </script>';
   }



}

?>
