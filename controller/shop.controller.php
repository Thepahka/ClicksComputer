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

}
?>
