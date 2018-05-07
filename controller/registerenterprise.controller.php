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
      //la variable data me contiene todos los datos que ingresamos en el formulario
      $data = $_POST["data"];

      $complemento = $_POST["complemento"];

      $comprobeIdEnterprise = $data[0];

      $comprobeEmailEnterprise = $data[5];

      $result = $this->registerenterprise->ValidateEnterpriseEmail($comprobeEmailEnterprise);

      $result2 = $this->registerenterprise->ValidateEnterpriseId($comprobeIdEnterprise);

      $result3 = $this->registerenterprise->ValidateEnterpriseEmail2($comprobeEmailEnterprise);

      $result4 = $this->registerenterprise->ValidateEnterpriseId2($comprobeIdEnterprise);

      $emailvalidio = filter_var($data[5], FILTER_SANITIZE_EMAIL);

      $nit = $data[0]."-".$complemento;

      $datos = array($nit, $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);

      print_r($datos);

      // if($data[0] == "")
      // {
      //   echo '<script language="javascript">alert("Se debe completar el campo NIT o ID de la empresa");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif($result4[0] == $comprobeIdEnterprise)
      // {
      //   echo '<script language="javascript">alert("Ya existe una empresa/usuario registrado con ese NIT/ID");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif($result2[0] == $comprobeIdEnterprise)
      // {
      //   echo '<script language="javascript">alert("Ya existe una empresa/usuario registrado con ese NIT/ID");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif(!is_numeric($data[0]))
      // {
      //   echo '<script language="javascript">alert("Solo puede ingresar datos numéricos en el campo NIT O ID de la empresa");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif($result[0] == $comprobeEmailEnterprise)
      // {
      //   echo '<script language="javascript">alert("Ya existe una empresa/usuario registrado con ese correo electronico");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif($data[1] == "")
      // {
      //   echo '<script language="javascript">alert("Se debe completar el campo Nombre de la empresa");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif(strstr($data[1],"1") or strstr($data[1],"2") or strstr($data[1],"3") or strstr($data[1],"4") or strstr($data[1],"5"))
      // {
      //   echo '<script language="javascript">alert("Solo se puede ingresar letras en el campo Nombre de la empresa");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif(strstr($data[1],"6") or strstr($data[1],"7") or strstr($data[1],"8") or strstr($data[1],"9") or strstr($data[1],"0"))
      // {
      //   echo '<script language="javascript">alert("Solo se puede ingresar letras en el campo Nombre de la empresa");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif($data[3] =="")
      // {
      //   echo '<script language="javascript">alert("Se debe completar el campo Descripcion de la empresa");</script>';
      // }
      // elseif(!is_numeric($data[4]))
      // {
      //   echo '<script language="javascript">alert("Solo puede ingresar datos numéricos en el campo Telefono");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif($data[5] =="")
      // {
      //   echo '<script language="javascript">alert("Se debe completar el campo Correo electronico de la empresa");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif(!filter_var($emailvalido, FILTER_VALIDATE_EMAIL))
      // {
      //   echo '<script language="javascript">alert("Ingrese una direccion de correo electronico valida");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif($data[6] =="")
      // {
      //   echo '<script language="javascript">alert("Se debe completar el campo Contraseña");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif(strlen($data[6]) < 8)
      // {
      //   echo '<script language="javascript">alert("La contraseña debe ser minimo 8 caracteres");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif(!preg_match('/(?=[a-z])/', $data[6]))
      // {
      //   echo '<script language="javascript">alert("La contraseña debe contener al menos una letra");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // elseif(!preg_match('/(?=\d)/', $data[6]))
      // {
      //   echo '<script language="javascript">alert("La contraseña debe contener al menos una número");</script>';
      //   echo "<script>history.back(1)</script>";
      // }
      // else
      // {


        //el result accede a la funcion del modelo donde vamos a insertar los datos que pasamos por el formulario
        //en este caso los datos los contenemos en la variable $data o $datos y es lo que ponemos en el parentesis
        $result = $this->registerenterprise->RegisterNewEnterprise($datos);
        $ruta = "views/modules/Shop_User/$data[1]";
        $ruta2 = "$ruta/computadores";
        $ruta3 = "$ruta/piezas";
        if(!file_exists($ruta))
        {
          mkdir($ruta, 0777, true);
        }
        else
        {
        }
        if(!file_exists($ruta2))
        {
          mkdir($ruta2, 0777, true);
        }
        else
        {
        }
        if(!file_exists($ruta3))
        {
          mkdir($ruta3, 0777, true);
        }
        else
        {
        }
        //este script me muestra un mensaje de exito cuando se registra con exito
        //el window.location.href me redirije a una pagina cuando se registra con exito en este caso a main
        echo '<script language="javascript">
        alert("Registrado con exito!");
        window.location.href="main";
        </script>';
      // }
    }
  }


?>
