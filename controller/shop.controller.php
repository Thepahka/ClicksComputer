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

  public function updateDesc()
  {
    $desc = $_POST["descripcion"];
    $id = array($_SESSION["emp"]["id"]);

    $newdesc = $desc[0];
    $idemp = $id[0];

    if($newdesc == "")
    {
        echo '<script language="javascript">alert("Ingresa una descripcion valida para actualizar");</script>';
        echo '<script language="javascript">window.location.href="GestionPerfil";</script>';
    }
    else
    {
      $result = $this->shop->actdesc($newdesc, $idemp);
      echo '<script language="javascript">alert("La descripcion de su tienda se actualizo con exito!");</script>';
      echo '<script language="javascript">window.location.href="GestionPerfil";</script>';
    }
  }
  public function updateDir()
  {
    $dir = $_POST["direccion"];
    $id = array($_SESSION["emp"]["id"]);

    $newdir = $dir[0];
    $idemp = $id[0];

    if($newdir == "")
    {
        echo '<script language="javascript">alert("Ingresa una dirección valida para actualizar");</script>';
        echo '<script language="javascript">window.location.href="GestionPerfil";</script>';
    }
    else
    {
      $result = $this->shop->actdir($newdir, $idemp);
      echo '<script language="javascript">alert("La dirección de su tienda se actualizo con exito!");</script>';
      echo '<script language="javascript">window.location.href="GestionPerfil";</script>';
    }
  }

  public function updateCor()
  {
    $cor = $_POST["correo"];
    $id = array($_SESSION["emp"]["id"]);

    $newcor = $cor[0];
    $idemp = $id[0];

    if($newcor == "")
    {
        echo '<script language="javascript">alert("Ingresa un correo valido para actualizar");</script>';
        echo '<script language="javascript">window.location.href="GestionPerfil";</script>';
    }
    else
    {
      $result = $this->shop->actcor($newcor, $idemp);
      echo '<script language="javascript">alert("El correo de su tienda se actualizo con exito!");</script>';
      echo '<script language="javascript">window.location.href="GestionPerfil";</script>';
    }
  }

  public function updateTel()
  {
    $tel = $_POST["telefono"];
    $id = array($_SESSION["emp"]["id"]);

    $newtel = $tel[0];
    $idemp = $id[0];

    if($newtel == "")
    {
        echo '<script language="javascript">alert("Ingresa un telefono valido para actualizar");</script>';
        echo '<script language="javascript">window.location.href="GestionPerfil";</script>';
    }
    elseif(!is_numeric($newtel))
    {
      echo '<script language="javascript">alert("Su telefono solo puede contener números");</script>';
      echo '<script language="javascript">window.location.href="GestionPerfil";</script>';
    }
    else
    {
      $result = $this->shop->acttel($newtel, $idemp);
      echo '<script language="javascript">alert("El telefono de su tienda se actualizo con exito!");</script>';
      echo '<script language="javascript">window.location.href="GestionPerfil";</script>';
    }
  }

}
?>
