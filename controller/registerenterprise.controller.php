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

      $emailvalidio = filter_var($data[5], FILTER_SANITIZE_EMAIL);


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
      elseif(!is_numeric($data[0]))
      {
        echo '<script language="javascript">alert("Solo puede ingresar datos numéricos en el campo ID/NIT de la empresa");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($result[0] == $comprobeEmailEnterprise)
      {
        echo '<script language="javascript">alert("Ya existe una empresa/usuario registrado con ese correo electronico");</script>';
        echo "<script>history.back(1)</script>";
      }
      if($data[1] == "")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Nombre de la empresa");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(strstr($data[1],"1") or strstr($data[1],"2") or strstr($data[1],"3") or strstr($data[1],"4") or strstr($data[1],"5"))
      {
        echo '<script language="javascript">alert("Solo se puede ingresar letras en el campo Nombre de la empresa");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(strstr($data[1],"6") or strstr($data[1],"7") or strstr($data[1],"8") or strstr($data[1],"9") or strstr($data[1],"0"))
      {
        echo '<script language="javascript">alert("Solo se puede ingresar letras en el campo Nombre de la empresa");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($data[3] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Descripcion de la empresa");</script>';
      }
      elseif(!is_numeric($data[4]))
      {
        echo '<script language="javascript">alert("Solo puede ingresar datos numéricos en el campo Telefono");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif($data[5] =="")
      {
        echo '<script language="javascript">alert("Se debe completar el campo Correo electronico de la empresa");</script>';
        echo "<script>history.back(1)</script>";
      }
      elseif(!filter_var($emailvalido, FILTER_VALIDATE_EMAIL))
      {
        echo '<script language="javascript">alert("Ingrese una direccion de correo electronico valida");</script>';
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
        $result = $this->registerenterprise->RegisterNewEnterprise($data);
        echo '<script language="javascript">
        alert("Registrado con exito!");
        window.location.href="main";
        </script>';
      }
    }
  }


?>
