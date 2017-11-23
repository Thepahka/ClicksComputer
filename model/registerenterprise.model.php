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
      $sql = "SELECT emp_correo FROM empresa WHERE emp_correo = ?";

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
      $sql = "SELECT emp_nit, fk_rol_id, emp_correo FROM empresa WHERE emp_nit = ?";

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
