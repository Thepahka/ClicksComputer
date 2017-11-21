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

      $consulta = "SELECT * FROM usuario WHERE usu_num_doc=".$data[0];

      if($data[0] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Documento de identidad");</script>';
      }
      elseif($data[1] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Primer nombre");</script>';
      }
      elseif($data[3] == "")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Primer Apellido");</script>';
      }
      elseif($data[6] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Correo electronico");</script>';
      }
      elseif($data[7] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Fecha de nacimiento");</script>';
      }
      elseif($data[8] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Contraseña");</script>';
      }
      elseif(mysqli_result($consulta) > 0)
       {
        $resultadofinal = $consulta->num_rows;
        echo "Ya existe un registro con ese documento de identidad";
        die(mysqli_result($consulta));
      }
      // else
      // {
      //   $result = $this->register->RegisterUser($data);
      //
      //   header("Location: main");
      // }

    }

  }


?>
