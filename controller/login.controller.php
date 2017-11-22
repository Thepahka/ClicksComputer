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
    
  }

?>
