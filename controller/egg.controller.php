<?php
require_once "model/egg.model.php";

  class EggController
  {
    private $egg;

    public function __CONSTRUCT()
    {
      $this->egg = new EggModel;
    }

    public function Dash()
    {
      if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
      {
      }
      else
      {
        header("Location: Email");
      }
      require_once "views/modules/Shop_user/Shop/DashboardShopegg.php";
    }

    public function useradmin()
    {
      if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
      {
      }
      else
      {
        header("Location: Email");
      }
      require_once "views/include/scope.useradminegg.php";
    }

    public function ImportExport()
    {
      if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
      {
      }
      else
      {
        header("Location: Email");
      }
      require_once "views/include/scope.importexport.php";
    }

    public function ConsultEmail()
    {
      $comprobar = $_POST["data"];

      $_SESSION["correoelectronico"] = $comprobar;

      $user = $comprobar[0];

      $contra = $comprobar[1];

      $result = $this->egg->ValidateEmail($user);

      if($comprobar[0] = "" or $comprobar[1] == "")
          {
            echo '<script language="javascript">alert("Complete los campos");</script>';
            echo "<script>history.back(1)</script>";
          }
          elseif($user == $result[1] && password_verify($contra, $result[4]))
          {
            header("Location: ImportExport");
          }
          else
          {
            echo '<script language="javascript">alert("Algo salio mal");</script>';
            echo "<script>history.back(1)</script>";
          }

      }

      public function export()
      {
        $result = $this->egg->export();
        return $result;
      }

      public function import()
      {
        $result = $this->egg->import();
        return $result;
      }

    }

?>
