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

  public function updateDesc()
  {
      $idempresa = $_SESSION["emp"]["id"];

      $newdesc = $_POST["descripcion"];

      if($newdesc == "")
      {
          echo '<script language="javascript">alert("Por favor ingresa una descripcion valida para actualizar");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
      else
      {
          $this->shop->updatedesc($newdesc, $idempresa);
          echo '<script language="javascript">alert("La descripcion de su empresa se actualizo con exito");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
  }

  public function updateNit()
  {
      $idempresa = $_SESSION["emp"]["id"];

      $nit = $_POST["nit"];

      $complemento = $_POST["complemento"];

      $newnit = $nit."-".$complemento;

      if($nit == "")
      {
          echo '<script language="javascript">alert("Por favor ingresa un nit valido para actualizar");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
      elseif($complemento == "")
      {
          echo '<script language="javascript">alert("Por favor ingresa un nit valido para actualizar");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
      else
      {
          $this->shop->updatenit($newnit, $idempresa);
          echo '<script language="javascript">alert("El nit de su empresa se actualizo con exito");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
  }

  public function updateDir()
  {
      $idempresa = $_SESSION["emp"]["id"];

      $newdir = $_POST["direccion"];

      if($newdir == "")
      {
          echo '<script language="javascript">alert("Por favor ingresa una dirección valida para actualizar");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
      else
      {
          $this->shop->updatedir($newdir, $idempresa);
          echo '<script language="javascript">alert("La dirección de su empresa se actualizo con exito");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
  }

  public function updateCor()
  {
      $idempresa = $_SESSION["emp"]["id"];

      $newcor = $_POST["correo"];

      if($newcor == "")
      {
          echo '<script language="javascript">alert("Por favor ingresa un correo valido para actualizar");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
      else
      {
          $this->shop->updatecor($newcor, $idempresa);
          echo '<script language="javascript">alert("El correo de su empresa se actualizo con exito");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
  }

  public function updateTel()
  {
      $idempresa = $_SESSION["emp"]["id"];

      $newtel = $_POST["telefono"];

      if($newtel == "")
      {
          echo '<script language="javascript">alert("Por favor ingresa un telefono valido para actualizar");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
      else
      {
          $this->shop->updatetel($newtel, $idempresa);
          echo '<script language="javascript">alert("El telefono de su empresa se actualizo con exito");</script>';
          echo "<script>window.location.href='GestionPerfil'</script>";
      }
  }

}
?>
