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
    require_once "views/modules/Shop_User/Shop/DashboardShop.php";
  }

  public function SessionOff()
  {
      echo "<script language='javascript'>
      alert('Cerraste Sesion');
      window.location.href='Email';
      </script>";
  }
}
?>
