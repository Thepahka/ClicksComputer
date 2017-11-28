<?php
  require_once "model/registeruser.model.php";

  class RegisteruserController
  {
    private $register;

    public function __CONSTRUCT()
    {
      $this->register = new RegisteruserModel();
    }

    public function viewsRegister()
    {
      require_once "views/modules/Register/register.php";
    }

    public function Register()
    {
      $data = $_POST["data"];

      $comprobeId = $data[0];

      $comprobeEmail = $data[4];

      $result = $this->register->ValidateExistsEmail($comprobeEmail);

      $result2 = $this->register->ValidateExistsId($comprobeId);

      $result3 = $this->register->ValidateExistsEmail2($comprobeEmail);

      $result4 = $this->register->ValidateExistsId2($comprobeId);

      if($data[0] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Documento de identidad");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($comprobeId == $result4[0])
      {
        echo '<script language="javascript">alert("Ya existe un usuario/empresa registrado con ese documento/NIT");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($comprobeId == $result2[0])
      {
        echo '<script language="javascript">alert("Ya existe un usuario/empresa registrado con ese documento/NIT");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($data[4] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Correo electronico");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($comprobeEmail == $result3[0])
      {
        echo '<script language="javascript">alert("Ya existe un usuario/empresa registrado con ese correo electronico");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($comprobeEmail == $result[0])
      {
        echo '<script language="javascript">alert("Ya existe un usuario/empresa registrado con ese correo electronico");</script>';
        echo "<script>history.back(1)</script>";
      }
      else
      {
        if($data[1] =="")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Nombre(s)");</script>';
        }
        elseif($data[2] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Apellido(s)");</script>';
        }
        elseif($data[5] =="")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Fecha de nacimiento");</script>';
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
          $result = $this->register->RegisterUser($data);
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
