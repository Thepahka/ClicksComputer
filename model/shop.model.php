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

      $result = $query->fetch(PDO::FETCH_BOTH);
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

  public function selectnit2($idempresa)
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

  public function selectnom($idempresa)
  {
    try
    {
      $sql = "CALL Nombre(?)";

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

  public function selectcontra($idempresa)
  {
    try
    {
      $sql = "CALL Contraseña(?)";

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

  public function updatedesc($newdesc, $idempresa)
  {
    try
    {
      $sql = "CALL ActualizarDescEmp(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newdesc, $idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

  public function updatedir($newdir, $idempresa)
  {
    try
    {
      $sql = "CALL ActualizarDirEmp(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newdir, $idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

  public function updatecor($newcor, $idempresa)
  {
    try
    {
      $sql = "CALL ActualizarCorEmp(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newcor, $idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

  public function updatetel($newtel, $idempresa)
  {
    try
    {
      $sql = "CALL ActualizarTelEmp(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newtel, $idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

  public function updatenit($newnit, $idempresa)
  {
    try
    {
      $sql = "CALL ActualizarNitEmp(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($newnit, $idempresa));

      $result = $query->fetchAll(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

  public function Pcs($empid)
  {
    try
    {
      $sql = "CALL ConsultPc(?)";

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

  public function Delete($data, $data2)
  {
    try
    {
      $sql = "CALL DeletePcEmpresa(?,?)";

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

}

?>
