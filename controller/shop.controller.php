<?php
require_once "model/shop.model.php";

class ShopController
{
  private $shop;

  public function __CONSTRUCT()
  {
    $this->shop = new ShopModel();
  }

  public function shopDashboard()
  {
    if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
    {
    }
    else
    {
      header("Location: Email");
    }
    require_once "views/modules/Shop_User/Shop/DashboardShop.php";
  }
  public function Perfil()
  {
      if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
      {
      }
      else
      {
          header("Location: Email");
      }
      require_once "views/modules/Shop_User/Shop/gestionperfil.php";
      // require_once "views/include/scope.menutopdashboard.php";
      // require_once "views/include/scope.profileenterprise.php";
  }

  public function SessionOff()
  {
      session_destroy();
      echo "<script language='javascript'>
      alert('Cerraste Sesion');
      window.location.href='Email';
      </script>";
  }
  public function Leer()
  {
      $idempresa = $_SESSION["emp"]["id"];
      $result = $this->shop->selectdesc($idempresa);
      return $result;
  }

  public function Leer2()
  {
      $idempresa = $_SESSION["emp"]["id"];
      $result = $this->shop->selectnit($idempresa);
      return $result;
  }

  public function Leer3()
  {
      $idempresa = $_SESSION["emp"]["id"];
      $result = $this->shop->selectdir($idempresa);
      return $result;
  }

  public function Leer4()
  {
      $idempresa = $_SESSION["emp"]["id"];
      $result = $this->shop->selectcorreo($idempresa);
      return $result;
  }

  public function Leer5()
  {
      $idempresa = $_SESSION["emp"]["id"];
      $result = $this->shop->selecttel($idempresa);
      return $result;
  }

  public function Leer6()
  {
      $idempresa = $_SESSION["emp"]["id"];
      $result = $this->shop->selectnit2($idempresa);
      return $result;
  }

  public function Leer7()
  {
      $idempresa = $_SESSION["emp"]["id"];
      $result = $this->shop->seleccontra($idempresa);
      return $result;
  }


  public function updateInfo()
  {
      $idempresa = $_SESSION["emp"]["id"];

      $nit = $_POST["nit"];

      $complemento = $_POST["complemento"];

      $newnit = $nit."-".$complemento;

      $newdesc = $_POST["descripcion"];

      $newdir = $_POST["direccion"];

      $newcor = $_POST["correo"];

      $newtel = $_POST["telefono"];

      $result = $this->shop->selectcontra($idempresa);

      $contraseña = $_POST["contraseñaactual"];

      $contra = $result[0]["emp_contra"];

      $newcontra = $_POST["contraseña"];

      if(empty($nit) and !empty($complemento))
      {
        echo '<script language="javascript">alert("Complete los dos campos para actualizar el nit");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(!empty($nit) and empty($complemento))
      {
        echo '<script language="javascript">alert("Complete los dos campos para actualizar el nit");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(empty($nit) and empty($complemento))
      {
        echo '<script language="javascript">alert("Complete los dos campos para actualizar el nit");</script>';
        echo "<script>history.back(1)</script>";
      }
      else
      {
        $this->shop->updatenit($newnit, $idempresa);
        $_SESSION["emp"]["nit"] = $newnit;
        echo '<script language="javascript">alert("Nit actualizado con exito");</script>';
        echo "<script>window.location.href='GestionPerfil'</script>";
      }

  }



}
?>
