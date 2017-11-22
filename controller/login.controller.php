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
      $email = $_POST["data"];

      $comprobar = $email[0];

      $result=$this->login->ValidateEmail($comprobar);

      if($result[0] == $comprobar)
      {
        require_once "views/modules/Login/LoginPassword.php";
      }
      else
      {
        echo '<script language="javascript">alert("No existe un usuario registrado con ese correo");</script>';
        echo "<script>history.back(1)</script>";
      }
     }

    public function ConsultPassword()
    {
      $pass = $_POST["data"];

      $password = $pass[0];

      $result = $this->login->ValidatePassword($password);

      if($result[0] == password_verify($password, PASSWORD_BCRYPT))
      {
          echo '<script language="javascript">alert("Guelcom user");</script>';
      }
      else
      {
        echo '<script language="javascript">alert("puto");</script>';
      }
    }
  }

?>
