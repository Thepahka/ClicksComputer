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

  public function SessionOff()
  {
      session_destroy();
      echo "<script language='javascript'>
      alert('Cerraste Sesion');
      window.location.href='Email';
      </script>";
  }

}
?>
