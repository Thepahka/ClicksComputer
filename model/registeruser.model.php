<?php
class RegisteruserModel
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

  public function RegisterUser($data)
  {
    try
    {

      $sql = "INSERT INTO usuario (usu_num_doc, usu_nom, usu_nom2, usu_ape, usu_ape2, usu_tel, usu_correo, usu_nac, usu_contra, fk_rol_id) VALUES(?,?,?,?,?,?,?,?,?,?)";
      $query = $this->pdo->prepare($sql);
      $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7], $data[8],2));

      $msn = "Se registro con exito";
    }
    catch(PDOException $e)
    {
      $msn = $e->getMessage();
    }

    return $msn;
  }


}


?>
