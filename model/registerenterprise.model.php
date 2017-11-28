<?php
class RegisterenterpriseModel
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

  public function RegisterNewEnterprise($data)
  {
    try
    {

      $sql = "CALL GuardarEmpresa(?,?,?,?,?,?,?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5], password_hash($data[6], PASSWORD_BCRYPT),1));

      $msn = "Se registro con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }

    return $msn;
  }

  public function ValidateEnterpriseEmail($comprobeEmailEnterprise)
  {
    try
    {
      $sql = "CALL ConsultarEmpEmail(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($comprobeEmailEnterprise));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }
  public function ValidateEnterpriseEmail2($comprobeEmailEnterprise)
  {
    try
    {
      $sql = "CALL ConsultarEmpEmail2(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($comprobeEmailEnterprise));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function ValidateEnterpriseId($comprobeIdEnterprise)
  {
    try
    {
      $sql = "CALL ConsultarEmpId(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($comprobeIdEnterprise));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;

  }

  public function ValidateEnterpriseId2($comprobeIdEnterprise)
  {
    try
    {
      $sql = "CALL ConsultarEmpId2(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($comprobeIdEnterprise));

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
