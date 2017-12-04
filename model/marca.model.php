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

  public function readMarca()
  {
    try
    {
      $sql = "CALL ConsultarMarca";

      $query = $this->pdo->prepare($sql);

      $query->execute();

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOEXception $e)
    {
      $result = $e->getMessage();
    }
    return $result;
  }

}
?>
