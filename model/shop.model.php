<?php
class ShopModel
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

  public function selectname()
  {
    try
    {
      $sql = "CALL ConsultarTienda(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($_SESSION["user"]["name"]));

      $result = $query->fetch(FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

}

?>
