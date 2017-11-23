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

    public function ValidateEmail($comprobar)
    {
      try
      {
        $sql = "CALL ConsultarEmail('$comprobar')";

        $query = $this->pdo->prepare($sql);

        $query->execute(array($comprobar));

        $result = $query->fetch(PDO::FETCH_BOTH);
      }
      catch(PDOException $e)
      {
        $result = $e->getMessage();
      }
      return $result;
    }
    // public function ValidatePassword($password)
    // {
    //   try
    //   {
    //     $sql = "SELECT usu_contra FROM usuario WHERE usu_contra = ?";
    //
    //     $query = $this->pdo->prepare($sql);
    //
    //     $query->execute(array($password));
    //
    //     $result = $query->fetch(PDO::FETCH_BOTH);
    //   }
    //   catch(PDOException $e)
    //   {
    //     $result = $e->getMessage();
    //   }
    //   return $result;
    // }

  }



?>
