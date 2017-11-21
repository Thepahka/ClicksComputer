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

      if($data[0] =="")
      {
        echo "<p>Se debe completar el campo 'Documento de identidad'</p>";
      }
      elseif($data[1] =="")
      {
        echo "<p>Se debe completar el campo 'Primer Nombre'</p>";
      }
      elseif($data[3] =="")
      {
        echo "<p>Se debe completar el campo 'Primer Apellido'</p>";
      }
      elseif($data[6] =="")
      {
        echo "<p>Se debe completar el campo 'Correo Electronico'</p>";
      }
      elseif($data[7] =="")
      {
        echo "<p>Se debe completar el campo 'Fecha de nacimiento'</p>";
      }
      elseif($data[8] =="")
      {
        echo "<p>Se debe completar el campo 'Contraseña'</p>";
      }
      else
      {
        $result = $this->register->RegisterUser($data);

        header("Location: main");
      }

    }
  }


?>
