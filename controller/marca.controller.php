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

      $idemp = $_SESSION["emp"]["id"];

      while(true)
       {
         $allmarcas = current($data);

         $asignarmarcas=(( $allmarcas !== false) ? $allmarcas : ", &nbsp;");

         $result = $this->marca->newMarca($allmarcas, $idemp);
         echo '<script language="javascript">alert("Marca(s) registrada(s) con exito!");</script>';
         echo "<script>window.location.href='GestionMarcas'</script>";

         $allmarcas = next($data);

         if($allmarcas === false && $allmarcas === false)
         {
           break;
         }
       }
  }

  public function Read()
  {
      $empid = $_SESSION["emp"]["id"];
      $result = $this->marca->allMarcas($empid);
      return $result;
  }

  public function Read2()
  {
      $empid = $_SESSION["emp"]["id"];
      $result = $this->marca->Marcas();
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

  public function DeleteMars()
  {
    $datos = $_POST["eliminarvarios"];
    $eliminar = implode(",",$datos);
    $idemp = $_SESSION["emp"]["id"];
    $result = $this->marca->EliminarVarios($idemp,$eliminar);
    echo '<script language="javascript">
    alert("Marca(s) eliminada(s) con exito");
    window.location.href="GestionMarcas"
    </script>';
  }

  public function UpdateCat()
  {

    // $result = $this->marca->allMarcas2($idcat, $empid);
    // print_r($result[0][1]);



    // $result2 = $this->marca->Update($newid, $oldid, $idemp);
    // echo '<script language="javascript">
    // alert("Marca actualizada con exito");
    // window.location.href="GestionMarcas"
    // </script>';
   }



}

?>
