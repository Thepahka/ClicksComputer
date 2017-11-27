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

    public function ValidateEmail($email)
    {
      try
      {
        $sql = "CALL ConsultarEmail(?)";

        $query = $this->pdo->prepare($sql);

        $query->execute(array($email));

        $result = $query->fetch(PDO::FETCH_BOTH);
      }
      catch(PDOException $e)
      {
        $result = $e->getMessage();
      }
      return $result;
    }
  

  }



?>
