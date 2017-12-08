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

      $_SESSION["tipo"]["nom"] = $result5[1];

        if($data[0] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Codigo del computador");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[0] == $result4[1])
        {
          echo '<script language="javascript">alert("Lo lamento ya existe un computador registrado con ese codigo");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[1] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Nombre del computador");</script>';
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
        elseif($data[4] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Tipo de computador");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[5] == "")
        {
          echo '<script language="javascript">alert("Debe adjuntar la ficha tecnica del computador");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[6] == "")
        {
          echo '<script language="javascript">alert("Debe llenar el campo Marca del computador");</script>';
          echo "<script>history.back(1)</script>";
        }
        elseif($data[7] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Precio del computador");</script>';
          echo "<script>history.back(1)</script>";
        }
        else
        {
          if(strtolower($result2[1]) == strtolower($data[6]))
          {
            if(strtolower($result5[1]) == strtolower($data[4]))
            {
              $result = $this->savepc->newPc($data);
              $result2 = $this->savepc->newPc3($data);
              echo '<script language="javascript">
              alert("Computador registrado con exito!");
              </script>';
            }
            else
            {
              $result = $this->savepc->newPc($data);
              $result2 = $this->savepc->newPc3($data);
              $result3 = $this->savepc->newPc4($data);
              echo '<script language="javascript">
              alert("Computador registrado con exito!");
              </script>';
            }
          }
          else
          {
            $result = $this->savepc->newPc($data);
            $result3 = $this->savepc->newPc4($data);
            $result3 = $this->savepc->newPc5($data);
            $result2 = $this->savepc->newPc3($data);
            echo '<script language="javascript">
            alert("Computador registrado con exito!")
            </script>';
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
