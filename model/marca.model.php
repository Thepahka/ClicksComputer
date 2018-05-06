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
      $sql = "CALL ConsultarMar(?)";

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

  public function Marcas()
  {
    try
    {
      $sql = "CALL MarcasExistentes";

      $query = $this->pdo->prepare($sql);

      $query->execute(array());

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function allMarcas2($idcat, $empid)
  {
    try
    {
      $sql = "CALL ConsultarCatEmp2(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($idcat, $empid));

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

  public function EliminarVarios($idemp,$eliminar)
  {
    try
    {
      $sql = "DELETE FROM mar_emp WHERE fk_emp_id = ? AND fk_mar_id IN($eliminar)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($idemp));

      $msn = "Se Elimino la marca con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }
  }

}
?>
