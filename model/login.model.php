<?php
  class LoginModel
  {
    private $pdo;

    public function __CONSTRUCT()
    {
      try
      {
        $this->pdo = Database::open();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e)
      {
        die($e->getMessage());
      }
    }

    public function ValidateEmail()
    {

    }

    public function ValidateEmailPassword()
    {

    }


  }



?>
