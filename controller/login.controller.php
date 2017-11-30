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

    public function ConsultPassword()
    {
      $comprobarcorreo = $_SESSION["correoelectronico"];

      $comprobarpass = $_POST["data"];

      $pass = $comprobarpass[0];

      $result = $this->login->ValidateEmail($_SESSION["correoelectronico"][0]);

      $result2 = $this->login->ValidateEmail2($_SESSION["correoelectronico"][0]);

      if(password_verify($pass,$result[1]))
      {
        $_SESSION["user"]["correo"] = $comprobarcorreo;
        $_SESSION["user"]["contra"] = $pass;
        echo '<script language="javascript">
        alert("Guelcom user");
        window.location.href="main";
        </script>';

      }
      elseif(password_verify($pass,$result2[1]))
      {
        $_SESSION["user"]["correo"] = $comprobarcorreo;
        $_SESSION["user"]["contra"] = $pass;
        echo '<script language="javascript">
        alert("Guelcom tienda");
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
