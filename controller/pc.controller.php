<?php
  require_once "model/pc.model.php";

  class PcController
  {
    private $savepc;

    public function __CONSTRUCT()
    {
      $this->savepc = new PcModel();
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

    public function SaveNewPc()
    {
      $data = $_POST["data"];

      $result = $this->savepc->newPc($data);

      echo "Se guardo el computador con exito";
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
