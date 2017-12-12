<?php
  require_once "model/pc.model.php";

  class PcController
  {
    private $savepc;

    public function __CONSTRUCT()
    {
      $this->savepc = new PcModel();
    }

    public function ViewsSavePc1()
    {
      if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
      {
      }
      else
      {
        header("Location: Email");
      }
      require_once "views/modules/Pcs/Step1.php";
    }

    public function ViewsSavePc2()
    {
      if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
      {
      }
      else
      {
        header("Location: Email");
      }
      require_once "views/modules/Pcs/Step2.php";
    }

    public function ViewsSavePc()
    {
      if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
      {
      }
      else
      {
        header("Location: Email");
      }
      require_once "views/modules/Pcs/CreatePc.php";
    }

    public function Step1()
    {
      $data = $_POST["data"];

      $marca = strtolower($data[0]);

      $_SESSION["pc"]["marca"] = strtolower($data[0]);

      $result = $this->savepc->newPc2($marca);

      if($data[0] == "")
      {
        echo '<script language="javascript">alert("Completa el campo para seguir con el registro");</script>';
        echo "<script>history.back(1)</script>";
      }
      else
      {
        if(strtolower($data[0]) == strtolower($result[1]))
        {
          header("Location: Registrar-Computador2");
        }
        else
        {
          $result1 = $this->savepc->newPc5(strtolower($marca));
          header("Location: Registrar-Computador2");
        }
      }
    }

    public function Step2()
    {
      $data = $_POST["data"];

      $tipo = strtolower($data[0]);

      $_SESSION["pc"]["tipo"] = strtolower($data[0]);

      $result = $this->savepc->consultType($tipo);

      print_r($result);
      // if(strtolower($data[0]) == strtolower($result[1]))
      // {
      //   print_r($data);
      //   print_r($result);
      // }
      // else
      // {
      // }
    }

    public function ReadPcId($data)
    {

      $result = $this->savepc->readPcById($data);

      return $result;
    }

    public function ReadAllPc()
    {
      $result = $this->savepc->readAll();

      return $result;
    }

    public function UpdatePc()
    {
      $data = $_POST["data"];

      $result = $this->savepc->update($data);

      return $result;
    }

    public function DeletePc()
    {
      $result = $this->savepc->delete($data);

      echo "Se elimino el pc con exito";
    }
  }





?>
