<?php
class PcModel
{
  private $pdo;

  public function __CONSTRUCT()
  {
    try
    {
      $this->pdo = Database::open();
      $this->pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
      die($e->getMessage());
    }
  }

  public function newPc($data)
  {
    try
    {
      $sql = "CALL GuardarPc(?,?,?,?,?,?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6]));

      $msn = "Se guardo con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }

    return $msn;
  }
  public function newPc2($marca)
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

  public function newPc3($data)
  {
    try
    {
      $sql = "CALL GuardarMarcaExistente(?,?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($_SESSION["marca"]["id"],$data[0]));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

  public function ConsultPc($pc)
  {
    try
    {
      $sql = "CALL ConsultarPc(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($pc));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

  public function consultType($tipo)
  {
    try
    {
      $sql = "CALL ConsultarTipo(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($tipo));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }
  }

  public function newPc4($data)
  {
    try
    {
      $sql = "CALL GuardarTipo(?)";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($_SESSION["tipo"]["nom"]));

      $result = $query->fetch(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }
  public function newPc5($marca)
  {
    try
    {
      $sql = "CALL GuardarMarca(?)";

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

  public function readPcById($data)
  {
    try
    {
      $sql = "SELECT * from tipopc INNER JOIN pc ON tipopc.tipopc_id=pc.fk_tipopc_id INNER JOIN mar_pc ON mar_pc.fk_pc_id=pc.pc_cod INNER JOIN marca ON marca.mar_id=mar_pc.fk_mar_id WHERE pc.pc_cod = ?";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($data));

      $result = $query->fetchALL(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }


  public function readAll()
  {
    try
    {
      $sql = "SELECT pc.pc_nom,pc.pc_desc,pc.pc_mod,pc.ficha_tecnica,tipopc.tipopc_nom,marca.mar_nombre from tipopc INNER JOIN pc ON tipopc.tipopc_id=pc.fk_tipopc_id INNER JOIN mar_pc ON mar_pc.fk_pc_id=pc.pc_id INNER JOIN marca ON marca.mar_id=mar_pc.fk_mar_id INNER JOIN emp_pc ON emp_pc.fk_pc_id=pc.pc_id INNER JOIN empresa ON empresa.emp_id=emp_pc.fk_emp_id WHERE empresa.emp_id = ?";

      $query = $this->pdo->prepare($sql);

      $query->execute();

      $result = $query->fetchALL(PDO::FETCH_BOTH);
    }
    catch(PDOException $e)
    {
      $result = $e->getMessage();
    }

    return $result;
  }

  public function update($data)
  {
    try
    {
      $sql = "UPDATE pc SET pc_nom = ?, pc_desc = ? WHERE pc_id =?";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($data[1],$data[2],$data[0]));

      $msn = "Se actualizo con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }

    return $msn;
  }

  public function delete($data)
  {
    try
    {
      $sql = "DELETE FROM pc WHERE pc_id = ?";

      $query = $this->pdo->prepare($sql);

      $query->execute(array($data));

      $msn = "Se elimino pc con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }

    return $msn;
  }
}

?>
