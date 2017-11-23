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

      $sql = "CALL GuardarUsuario(?,?,?,?,?,?,?,?,?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7], password_hash($data[8], PASSWORD_BCRYPT),2));

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
      $sql = "SELECT usu_correo, fk_rol_id, usu_num_doc FROM usuario WHERE usu_correo= ?";

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
      $sql = "SELECT usu_num_doc FROM usuario WHERE usu_num_doc = ?";

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
