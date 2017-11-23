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

      $comprobeEmail = $data[6];

      $result = $this->register->ValidateExistsEmail($comprobeEmail);

      $result2 = $this->register->ValidateExistsId($comprobeId);

      if($data[0] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Documento de identidad");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($comprobeId == $result2[0])
      {
        echo '<script language="javascript">alert("Ya existe un usuario registrado con ese documento");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($data[6] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Correo electronico");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($comprobeEmail == $result[0])
      {
        echo '<script language="javascript">alert("Ya existe un usuario registrado con ese correo electronico");</script>';
        echo "<script>history.back(1)</script>";
      }
      else
      {
        if($data[1] =="")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Primer nombre");</script>';
        }
        elseif($data[3] == "")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Primer Apellido");</script>';
        }
        elseif($data[7] =="")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Fecha de nacimiento");</script>';
        }
        elseif($data[8] =="")
        {
          echo '<script language="javascript">alert("Se debe completar el campo Contraseña");</script>';
        }
        elseif(strlen($data[8]) < 8)
        {
          echo '<script language="javascript">alert("La contraseña debe ser minimo 8 caracteres");</script>';
        }
        elseif(!preg_match('/(?=[a-z])/', $data[8]))
        {
          echo '<script language="javascript">alert("La contraseña debe contener al menos una letra");</script>';
        }
        elseif(!preg_match('/(?=\d)/', $data[8]))
        {
          echo '<script language="javascript">alert("La contraseña debe contener al menos una número");</script>';
        }
        elseif(!preg_match('/(?=[@#%&]|-|_)/', $data[8]))
        {
          echo '<script language="javascript">alert("La contraseña debe contener al menos uno de estos simbolos: @#%&-_");</script>';
        }
        else
        {
          $result = $this->register->RegisterUser($data);

          header("Location: main");
        }
        echo "<script>history.back(1)</script>";
      }

     }

  }


?>
