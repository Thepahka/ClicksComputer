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
  public function selectdesc($idempresa)
  {
    try
    {
      $sql = "CALL Descripcion(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }
  public function selectnit($idempresa)
  {
    try
    {
      $sql = "CALL NIT(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }
  public function selectdir($idempresa)
  {
    try
    {
      $sql = "CALL Direccion(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }
  public function selectcorreo($idempresa)
  {
    try
    {
      $sql = "CALL Correo(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }
  public function selecttel($idempresa)
  {
    try
    {
      $sql = "CALL Telefono(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

  public function actdesc($newdesc, $idemp)
  {
    try
    {
      $sql = "CALL ActualizarDescEmp(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newdesc, $idemp));

      $msn = "se actualizo con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }
    return $msn;
  }

  public function actdir($newdir, $idemp)
  {
    try
    {
      $sql = "CALL ActualizarDirEmp(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newdir, $idemp));

      $msn = "se actualizo con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }
    return $msn;
  }

  public function actcor($newcor, $idemp)
  {
    try
    {
      $sql = "CALL ActualizarCorEmp(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newcor, $idemp));

      $msn = "se actualizo con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }
    return $msn;
  }

  public function acttel($newtel, $idemp)
  {
    try
    {
      $sql = "CALL ActualizarTelEmp(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newtel, $idemp));

      $msn = "se actualizo con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }
    return $msn;
  }

}

?>
