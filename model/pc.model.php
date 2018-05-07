<?php
class PcModel
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

  public function allTypes()
  {
    try
    {
      $sql = "CALL CosultarTipoEmp()";

      $query = $this->pdo->prepare($sql);

      $query->execute();

      $result = $query->fetchAll(PDO::FETCH_BOTH);
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
      //contiene la consulta
      $sql = "CALL ConsultarMarEmp(?)";
      //prepara la consulta
      $query = $this->pdo->prepare($sql);
      //ejecuta la consulta
      $query->execute(array($empid));
      //trae la consulta
      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    //catch captura el error en la variable $e
    catch(PDOException $e)
    {
      //me muestra el error en $e
      $result = $e->getMessage();
    }
    //retorna el resultado
    return $result;
  }

}
?>
