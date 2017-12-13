<?php
class MarcaModel
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

  public function newMarca($marca)
  {
    try
    {
      $sql = "CALL GuardarMarca(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($marca));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }
  public function newMarca2()
  {
    try
    {
      $sql = "CALL GuardarMarca2(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($_SESSION["emp"]["id"], $_SESSION["emp"]["idmar"]));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function ConsultIdEmp()
  {
    try
    {
      $sql = "CALL ConsultarIdEmpresa(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute($_SESSION["user"]["correo"]);

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function ConsultMarca($marca)
  {
    try
    {
      $sql = "CALL ConsultarMarca(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array(strtolower($marca)));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function allMarcas()
  {
    try
    {
      $sql = "SELECT mar_nombre FROM marca";

      $query = $this->pdo->prepare($sql);

      $query->execute();

      $result = $query->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }


}
?>
