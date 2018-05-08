<?php
  require_once "model/pc.model.php";

  class PcController
  {
    private $savepc;

    public function __CONSTRUCT()
    {
      $this->savepc = new PcModel();
    }

    public function ViewsSavePc()
    {
      if (isset($_SESSION["user"]["auth"]) && $_SESSION["user"]["auth"] == true)
      {
      }
      else
      {
        header("Location: Email");
      }
      require_once "views/modules/Pcs/CreatePc.php";
    }

    public function CreatePc()
    {
      $empid = $_SESSION["emp"]["id"];
      $nombreemp = $_SESSION["user"]["nombre"];

      $data = $_POST["data"];

      $direccion = $_FILES["ficha"]["tmp_name"];
      $nombre = $_FILES["ficha"]["name"];
      $direccion2 = $_FILES["imagen"]["tmp_name"];
      $nombre2 = $_FILES["imagen"]["name"];

      $datos = array($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $nombre, $data[7], $nombre2, $empid);

      $ruta = "views/modules/Shop_User/$nombreemp/computadores";

      if(file_exists($ruta))
      {
        move_uploaded_file($direccion, "views/modules/Shop_User/$nombreemp/computadores/$nombre");
        move_uploaded_file($direccion2, "views/modules/Shop_User/$nombreemp/computadores/$nombre2");
        $this->savepc->RegisterPc($datos);
      }
      else
      {
        mkdir($ruta, 0777, true);
        move_uploaded_file($direccion, "views/modules/Shop_User/$nombreemp/computadores/$nombre");
        move_uploaded_file($direccion2, "views/modules/Shop_User/$nombreemp/computadores/$nombre2");
        $this->savepc->RegisterPc($datos);
      }



    }

    public function Filtros()
    {
      $empid = $_SESSION["emp"]["id"];
      $result = $this->savepc->allCategorias($empid);
      return $result;
    }

    public function Tipos()
    {
      $result = $this->savepc->allTypes();
      return $result;
    }

    public function Marcas()
    {
      //empid contiene el id de la empresa logeada
      $empid = $_SESSION["emp"]["id"];
      //el result me contiene la consulta llamada desde el modelo
      $result = $this->savepc->allMarcas($empid);
      //el return result me trae el resultado de la consulta, ya sean los datos o el error de la consulta
      return $result;
    }

    public function ReadPcId($data)
    {

      $result = $this->savepc->readPcById($data);

      return $result;
    }

    public function ReadAllPc()
    {
      $result = $this->savepc->readAll();

      return $result;
    }

    public function UpdatePc()
    {
      $data = $_POST["data"];

      $result = $this->savepc->update($data);

      return $result;
    }

    public function DeletePc()
    {
      $result = $this->savepc->delete($data);

      echo "Se elimino el pc con exito";
    }
  }

?>
