<?php
  require_once "model/registerenterprise.model.php";

  class RegisterenterpriseController
  {
    private $registerenterprise;

    public function __CONSTRUCT()
    {
      $this->registerenterprise = new RegisterenterpriseModel();
    }

    public function viewsRegisterEnterprise()
    {
      require_once "views/modules/RegisterEnterprise/registerenterprise.php";
    }

    public function RegisterEnterprise()
    {
      $data = $_POST["data"];

      $comprobeIdEnterprise = $data[0];

      $comprobeEmailEnterprise = $data[5];

      $result = $this->registerenterprise->ValidateEnterpriseEmail($comprobeEmailEnterprise);

      $result2 = $this->registerenterprise->ValidateEnterpriseId($comprobeIdEnterprise);

      $result3 = $this->registerenterprise->ValidateEnterpriseEmail2($comprobeEmailEnterprise);

      $result4 = $this->registerenterprise->ValidateEnterpriseId2($comprobeIdEnterprise);

      if($data[0] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo NIT o ID de la empresa");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($result4[0] == $comprobeIdEnterprise)
      {
        echo '<script language="javascript">alert("Ya existe una empresa/usuario registrado con ese NIT/ID");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($result2[0] == $comprobeIdEnterprise)
      {
        echo '<script language="javascript">alert("Ya existe una empresa/usuario registrado con ese NIT/ID");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($data[5] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Correo electronico de la empresa");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($resul4[0] == $comprobeEmailEnterprise)
      {
        echo '<script language="javascript">alert("Ya existe una empresa/usuario registrado con ese correo electronico");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($result[0] == $comprobeEmailEnterprise)
      {
        echo '<script language="javascript">alert("Ya existe una empresa/usuario registrado con ese correo electronico");</script>';
        echo "<script>history.back(1)</script>";
      }
      else
      {
        if($data[1] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Nombre de la empresa");</script>';
        }
        elseif($data[3] =="")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Descripcion de la empresa");</script>';
        }
        elseif($data[6] =="")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Contraseña");</script>';
        }
        elseif(strlen($data[6]) < 8)
        {
          echo '<script language="javascript">alert("La contraseña debe ser minimo 8 caracteres");</script>';
        }
        elseif(!preg_match('/(?=[a-z])/', $data[6]))
        {
          echo '<script language="javascript">alert("La contraseña debe contener al menos una letra");</script>';
        }
        elseif(!preg_match('/(?=\d)/', $data[6]))
        {
          echo '<script language="javascript">alert("La contraseña debe contener al menos una número");</script>';
        }
        elseif(!preg_match('/(?=[@#%&]|-|_)/', $data[6]))
        {
          echo '<script language="javascript">alert("La contraseña debe contener al menos uno de estos simbolos: @#%&-_");</script>';
        }
        else
        {
          $result = $this->registerenterprise->RegisterNewEnterprise($data);
          echo '<script language="javascript">
          alert("Registrado con exito!");
          window.location.href="main";
          </script>';
        }
        echo "<script>history.back(1)</script>";
      }

    }

  }


?>
