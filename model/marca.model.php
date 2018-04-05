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


  public function newMarca($nommarca, $idempresa)
  {
    try
    {
      $sql = "CALL GuardarMarcaEmpresa(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array(strtolower($nommarca), $idempresa));

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

  public function allMarcas($empid)
  {
    try
    {
      $sql = "CALL ConsultarMarEmp(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($empid));

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
      $sql = "CALL DeleteMarcaEmpresa(?,?)";

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

  public function Update($newid, $oldid, $idemp)
  {
    try
    {
      $sql = "CALL ActualizarMarcaEmpresa(?,?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newid, $oldid, $idemp));

      $msn = "Se actualizo la marca con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }
  }
}
?>
