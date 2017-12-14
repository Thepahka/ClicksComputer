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


  public function newMarca()
  {
    try
    {
      $sql = "CALL GuardarMarca2(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($_SESSION["user"]["idmar"], $_SESSION["user"]["idemp"]));

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

  public function allMarcas($marid)
  {
    try
    {
      $sql = "CALL ConsultarMarEmp(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($marid));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }
  public function allMarcas2($mi, $ei)
  {
    try
    {
      $sql = "CALL ConsultarMarEmp2(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($mi, $ei));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function Delete($data, $data2)
  {
    try
    {
      $sql = "CALL DeleteMarca(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($data, $data2));

      $msn = "Se elimino la marca con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }
    return $msn;
  }
}
?>
