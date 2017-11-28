<?php
class RegisteruserModel
{
  private $pdo;

  public function __CONSTRUCT()
  {
    try
    {
      $this->pdo = Database::open();
      $this->pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
      die($e->getMessage());
    }
  }

  public function RegisterUser($data)
  {
    try
    {

      $sql = "CALL GuardarUsuario(?,?,?,?,?,?,?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5], password_hash($data[6], PASSWORD_BCRYPT),2));

      $msn = "Se registro con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }

    return $msn;
  }

  public function ValidateExistsEmail($comprobeEmail)
  {
    try
    {
      $sql = "CALL ConsultarEmail(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($comprobeEmail));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function ValidateExistsEmail2($comprobeEmail)
  {
    try
    {
      $sql = "CALL ConsultarEmail2(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($comprobeEmail));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function ValidateExistsId($comprobeId)
  {
    try
    {
      $sql = "CALL ConsultarId(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($comprobeId));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function ValidateExistsId2($comprobeId)
  {
    try
    {
      $sql = "CALL ConsultarId2(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($comprobeId));

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
