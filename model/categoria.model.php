<?php
class CategoriaModel
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


  public function newCategoria($nomcategoria, $idempresa)
  {
    try
    {
      $sql = "CALL GuardarCategoriaEmpresa(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array(strtolower($nomcategoria), $idempresa));

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

  public function ConsultCategoria($categoria)
  {
    try
    {
      $sql = "CALL ConsultarCategoria(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array(strtolower($categoria)));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

  public function allCategorias($empid)
  {
    try
    {
      $sql = "CALL ConsultarFil(?)";

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

  public function Categorias($empid)
  {
    try
    {
      $sql = "CALL CategoriasExistentes(?)";

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

  public function allCategorias2($idcat, $empid)
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
      $sql = "CALL DeleteCategoriaEmpresa(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($data, $data2));

      $msn = "Se elimino la categoria con exito";
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
      $sql = "CALL ActualizarCategoriaEmpresa(?,?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newid, $oldid, $idemp));

      $msn = "Se actualizo la categoria con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }
  }

}
?>
