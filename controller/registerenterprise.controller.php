<?php
  require_once "model/registerenterprise.model.php";

  class RegisterenterpriseController
  {
    private $register;

    public function __CONSTRUCT()
    {
      $this->register = new RegisterenterpriseModel();
    }

    public function viewsRegisterEnterprise()
    {
      require_once "views/modules/RegisterEnterprise/registerenterprise.php";
    }

    public function RegisterEnterprise()
    {
      $data = $_POST["data"];


      if($data[0] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo NIT o ID de la empresa");</script>';
      }
      elseif($data[1] == "")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Nombre de la empresa");</script>';
      }
      elseif($data[3] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Descripcion de la empresa");</script>';
      }
      elseif($data[5] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Correo electronico de la empresa");</script>';
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
        $result = $this->register->RegisterEnterprise($data);

        header("Location: main");
      }

    }

  }


?>
