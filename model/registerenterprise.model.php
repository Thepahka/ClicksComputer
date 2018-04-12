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

  public function RegisterNewEnterprise($datos)
  {
    try
    {

      $sql = "CALL GuardarEmpresa(?,?,?,?,?,?,?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5], password_hash($datos[6], PASSWORD_BCRYPT),1));

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
