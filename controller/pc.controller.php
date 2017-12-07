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

      $marca = $data[6];

      $pc = $data[0];

      $tipo = $data[4];

      $result2 = $this->savepc->newPc2($marca);

      $result4 = $this->savepc->ConsultPc($pc);

      $_SESSION["marca"]["id"] = $result2[0];

      $result5 = $this->savepc->Consulttype($tipo);


      if(strtolower($data[4]) == "")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Tipo de computador");</script>';
        echo "<script>history.back(1)</script>";
      }
      if(strtolower($data[4]) == strtolower($result5[1]))
      {
      }
      elseif(strtolower($data[6]) == "")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Marca del computador");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(strtolower($data[6]) == strtolower($result2[1]))
      {
        $result = $this->savepc->newPc3($data);
      }
      else
      {
        if($data[0] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Codigo del computador");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[0] == $result4[1])
        {
          echo '<script language="javascript">alert("Ya existe un computador registrado con ese codigo");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[1] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo nombre del computador");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[2] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Descripcion del computador");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[3] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Modelo del computador");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[5] == "")
        {
          if($data[0] == "")
          {
            echo '<script language="javascript">alert("Se debe completar el campo Codigo del computador");</script>';
            echo "<script>history.back(1)</script>";
          }
          elseif($data[0] == $result4[1])
          {
            echo '<script language="javascript">alert("Ya existe un computador registrado con ese codigo");</script>';
            echo "<script>history.back(1)</script>";
          }
          elseif($data[1] == "")
          {
            echo '<script language="javascript">alert("Se debe completar el campo nombre del computador");</script>';
            echo "<script>history.back(1)</script>";
          }
          elseif($data[2] == "")
          {
            echo '<script language="javascript">alert("Se debe completar el campo Descripcion del computador");</script>';
            echo "<script>history.back(1)</script>";
          }
          elseif($data[3] == "")
          {
            echo '<script language="javascript">alert("Debe montar un archivo que contenga la ficha tecnica del computador");</script>';
            echo "<script>history.back(1)</script>";
          }
          elseif
        }
      }

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
