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

      $emailvalidio = filter_var($data[4], FILTER_SANITIZE_EMAIL);

      $array = array("");

      if($data[0] == "")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Documento de identidad");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($comprobeId == $result4[0])
      {
        echo '<script language="javascript">alert("Ya existe un usuario/empresa registrado con ese documento/NIT");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(!is_numeric($data[0]))
      {
        echo '<script language="javascript">alert("Solo puede ingresar datos numéricos en el campo Documento de identidad");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($comprobeId == $result2[0])
      {
        echo '<script language="javascript">alert("Ya existe un usuario/empresa registrado con ese documento/NIT");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($data[1] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Nombre(s)");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(strstr($data[1],"1") or strstr($data[1],"2") or strstr($data[1],"3") or strstr($data[1],"4") or strstr($data[1],"5"))
      {
        echo '<script language="javascript">alert("Solo se puede ingresar letras en el campo Nombre(s)");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(strstr($data[1],"6") or strstr($data[1],"7") or strstr($data[1],"8") or strstr($data[1],"9") or strstr($data[1],"0"))
      {
        echo '<script language="javascript">alert("Solo se puede ingresar letras en el campo Nombre(s)");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($data[2] == "")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Apellido(s)");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(strstr($data[2],"1") or strstr($data[2],"2") or strstr($data[2],"3") or strstr($data[2],"4") or strstr($data[2],"5"))
      {
        echo '<script language="javascript">alert("Solo se puede ingresar letras en el campo Apellido(s)");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(strstr($data[2],"6") or strstr($data[2],"7") or strstr($data[2],"8") or strstr($data[2],"9") or strstr($data[2],"0"))
      {
        echo '<script language="javascript">alert("Solo se puede ingresar letras en el campo Apellido(s)");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(!is_numeric($data[3]))
      {
        echo '<script language="javascript">alert("Solo puede ingresar datos numéricos en el campo Telefono");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($data[4] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Correo electronico");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(!filter_var($emailvalidio, FILTER_VALIDATE_EMAIL))
      {
          echo '<script language="javascript">alert("Ingrese una direccion de correo electronico valida");</script>';
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
      elseif($data[5] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Fecha de nacimiento");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($data[6] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Contraseña");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(strlen($data[6]) < 8)
      {
        echo '<script language="javascript">alert("La contraseña debe ser minimo 8 caracteres");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(!preg_match('/(?=[a-z])/', $data[6]))
      {
        echo '<script language="javascript">alert("La contraseña debe contener al menos una letra");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(!preg_match('/(?=\d)/', $data[6]))
      {
        echo '<script language="javascript">alert("La contraseña debe contener al menos una número");</script>';
        echo "<script>history.back(1)</script>";
      }
      else
      {
          $result = $this->register->RegisterUser($data);
          echo '<script language="javascript">
          alert("Registrado con exito!");
          window.location.href="main";
          </script>';
      }
    }

  }


?>
