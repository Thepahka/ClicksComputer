<?php
  require_once "model/login.model.php";

  class LoginController
  {
    private $login;

    public function __CONSTRUCT()
    {
      $this->login = new LoginModel();
    }

    public function viewsEmail()
    {
      require_once "views/modules/Login/LoginEmail.php";
    }
    public function viewsPassword()
    {
      require_once "views/modules/Login/LoginPassword.php";
    }

    public function ConsultEmail()
    {
      $comprobar = $_POST["data"];

      $_SESSION["correoelectronico"] = $comprobar;

      $email = $comprobar[0];

      $result = $this->login->ValidateEmail($email);

      $result2 = $this->login->ValidateEmail2($email);

      $emailvalido = filter_var($comprobar[0], FILTER_SANITIZE_EMAIL);

      $_SESSION["nom"] = $result2[3];

      if(!filter_var($emailvalido, FILTER_VALIDATE_EMAIL) === false)
      {
          if($email == "")
          {
            echo '<script language="javascript">alert("Debe completar el campo con un correo");</script>';
            echo "<script>history.back(1)</script>";
          }
          elseif($result[0] == $email)
          {
            header("Location: Pass");
          }
          elseif($result2[0] == $email)
          {
            header("Location: Pass");
          }
          else
          {
            echo '<script language="javascript">alert("No existe un usuario registrado con ese correo");</script>';
            echo "<script>history.back(1)</script>";
          }
      }
      else
      {
          echo '<script language="javascript">alert("Ingrese una direccion de correo electronico valida");</script>';
          echo "<script>history.back(1)</script>";
      }

    }

    public function ConsultPassword()
    {
      $comprobarcorreo = $_SESSION["correoelectronico"];

      $comprobarname = $_SESSION["nom"];

      $comprobarpass = $_POST["data"];

      $pass = $comprobarpass[0];

      $result = $this->login->ValidateEmail($_SESSION["correoelectronico"][0]);

      $result2 = $this->login->ValidateEmail2($_SESSION["correoelectronico"][0]);

      $idempresa = $result2[4];

      if(password_verify($pass,$result[1]))
      {
        $_SESSION["user"]["correo"] = $comprobarcorreo;
        $_SESSION["user"]["contra"] = $pass;
        $_SESSION["user"]["nombre"] = $comprobarname;
        $_SESSION["user"]["auth"] = true;
        echo '<script language="javascript">
        alert("Bienvenido '.ucwords($_SESSION["user"]["nombre"]).'");
        window.location.href="main";
        </script>';

      }
      elseif(password_verify($pass,$result2[1]))
      {
        $_SESSION["user"]["correo"] = $comprobarcorreo;
        $_SESSION["emp"]["id"] = $idempresa;
        $_SESSION["user"]["contra"] = $pass;
        $_SESSION["user"]["nombre"] = $comprobarname;
        $_SESSION["user"]["auth"] = true;
        $_SESSION["emp"]["nit"] = $result2["emp_nit"];
        echo '<script language="javascript">
        alert("Bienvenido '.ucwords($_SESSION["user"]["nombre"]).'");
        window.location.href="MyDashboard";
        </script>';
      }
      else
      {
        echo '<script language="javascript">alert("La contraseña no coincide con el correo");</script>';
        echo "<script>history.back(1)</script>";
      }
    }
  }

?>
