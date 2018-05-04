<?php
  class EggModel
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

    public function ValidateEmail($user)
    {
      try
      {
        $sql = "CALL ConsultarEmail4(?)";

        $query = $this->pdo->prepare($sql);

        $query->execute(array($user));

        $result = $query->fetch(PDO::FETCH_BOTH);
      }
      catch(PDOException $e)
      {
        $result = $e->getMessage();
      }
      return $result;
    }

    public function export()
    {
      $usuario = "root";
      $password = "";
      $servidor = "localhost";
      $basededatos = "clickscomputer";

      $conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");

      $db = mysqli_select_db($conexion, $basededatos) or die ("Upps! no se pudo conectar a la base de datos");

      $nombre_archivo = "planos/cli_emp.txt";

      $delimitador = "|";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_emp_id|fk_usu_id";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM cli_emp";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_emp_id"].$delimitador.$columna["fk_usu_id"];;
          fwrite($archivo, "\r\n".$mensaje);
      }

      $nombre_archivo = "planos/comentarios.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "com_id|com_desc|calificacion";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM comentarios";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["com_id"].$delimitador.$columna["com_desc"].$delimitador.$columna["calificacion"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/com_pc.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_pc_id|fk_com_id|fk_usu_id";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM com_pc";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_pc_id"].$delimitador.$columna["fk_com_id"].$delimitador.$columna["fk_usu_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/com_pie.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_pi_cod|fk_com_id|fk_usu_id";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM com_pie";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_pi_cod"].$delimitador.$columna["fk_com_id"].$delimitador.$columna["fk_usu_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/empresa.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "emp_id|emp_nit|emp_nom|emp_dir|emp_desc|emp_tel|emp_correo|emp_contra|fk_rol_id";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM empresa";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["emp_id"].$delimitador.$columna["emp_nit"].$delimitador.$columna["emp_nom"].$delimitador.$columna["emp_dir"].$delimitador.$columna["emp_desc"].$delimitador.$columna["emp_tel"].$delimitador.$columna["emp_correo"].$delimitador.$columna["emp_contra"].$delimitador.$columna["fk_rol_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/emp_pc.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_emp_id|fk_pc_id";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM emp_pc";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_emp_id"].$delimitador.$columna["fk_pc_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/emp_pie.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_emp_id|fk_pi_cod";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM emp_pie";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_emp_id"].$delimitador.$columna["fk_pi_cod"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/filtros.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fil_id|fil_nom|fk_pc_id|fk_pi_cod";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM filtros";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fil_id"].$delimitador.$columna["fil_nom"].$delimitador.$columna["fk_pc_id"].$delimitador.$columna["fk_pi_cod"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/fil_emp.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_fil_id|fk_emp_id|";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM fil_emp";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_fil_id"].$delimitador.$columna["fk_emp_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/galeria.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "gal_id|gal_img";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM galeria";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["gal_id"].$delimitador.$columna["gal_img"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/gal_pc.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_gal_id|fk_pc_id";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM gal_pc";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_gal_id"].$delimitador.$columna["fk_pc_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/gal_pie.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_gal_id|fk_pi_cod";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM gal_pie";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_gal_id"].$delimitador.$columna["fk_pi_cod"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/inventario.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "inv_id|inv_pre_uni|inv_pre_total|inv_fecha|inv_cant|inv_val_compra|inv_val_venta";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM inventario";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["inv_id"].$delimitador.$columna["inv_pre_uni"].$delimitador.$columna["inv_pre_total"].$delimitador.$columna["inv_fecha"].$delimitador.$columna["inv_cant"].$delimitador.$columna["inv_val_compra"].$delimitador.$columna["inv_val_venta"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/marca.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "mar_id|mar_nombre|fk_pc_id|fk_emp_id|fk_pi_cod";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM marca";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["mar_id"].$delimitador.$columna["mar_nombre"].$delimitador.$columna["fk_pc_id"].$delimitador.$columna["fk_emp_id"].$delimitador.$columna["fk_pc_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/pc.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "pc_id|pc_cod|pc_nom|pc_desc|pc_mod|fk_tipopc_id|ficha_tecnica|pc_precio";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM pc";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["pc_id"].$delimitador.$columna["pc_cod"].$delimitador.$columna["pc_nom"].$delimitador.$columna["pc_desc"].$delimitador.$columna["pc_mod"].$delimitador.$columna["fk_tipopc_id"].$delimitador.$columna["ficha_tecnica"].$delimitador.$columna["pc_precio"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/pc_inv.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_pc_id|fk_inv_id";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM pc_inv";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_pc_id"].$delimitador.$columna["fk_inv_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/pc_pie.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_pc_id|fk_pi_cod";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM pc_pie";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_pc_id"].$delimitador.$columna["fk_pi_cod"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/piezas.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "pi_cod|pi_nom|pi_desc|fk_tipo_id";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM piezas";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["pi_cod"].$delimitador.$columna["pi_nom"].$delimitador.$columna["pi_desc"].$delimitador.$columna["fk_tipo_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/pi_inv.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "fk_inv_id|fk_pi_cod";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM pi_inv";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["fk_inv_id"].$delimitador.$columna["fk_pi_cod"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/rol.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "rol_id|rol_nom";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM rol";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["rol_id"].$delimitador.$columna["rol_nom"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/tipopc.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "tipopc_id|tipopc_nom";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM tipopc";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["tipopc_id"].$delimitador.$columna["tipopc_nom"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/tipopieza.txt";

      $delimitador = "|";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "tipo_id|tipo_nombre";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM tipopieza";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["tipo_id"].$delimitador.$columna["tipo_nombre"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/usuario.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "usu_id|usu_num_doc|usu_nom|usu_ape|usu_tel|usu_correo|usu_nac|usu_contra|fk_rol_id";

      fwrite($archivo, $mensaje );

      $consulta = "SELECT * FROM usuario";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["usu_id"].$delimitador.$columna["usu_num_doc"].$delimitador.$columna["usu_nom"].$delimitador.$columna["usu_ape"].$delimitador.$columna["usu_tel"].$delimitador.$columna["usu_correo"].$delimitador.$columna["usu_nac"].$delimitador.$columna["usu_contra"].$delimitador.$columna["fk_rol_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      fclose($archivo);

      $nombre_archivo = "planos/egg.txt";

      $archivo = fopen($nombre_archivo, "a");

      $mensaje = "egg_id|egg_nom|egg_correo|egg_contra|egg_contra2|fk_rol_id";

      fwrite($archivo, $mensaje);

      $consulta = "SELECT * FROM egg";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo fallo en la consulta");

      while($columna = mysqli_fetch_array($resultado))
      {
          $mensaje = $columna["egg_id"].$delimitador.$columna["egg_nom"].$delimitador.$columna["egg_correo"].$delimitador.$columna["egg_contra"].$delimitador.$columna["egg_contra2"].$delimitador.$columna["fk_rol_id"];
          fwrite($archivo, "\r\n".$mensaje);
      }
      mysqli_close($conexion);
      fclose($archivo);

      echo "Datos Importados con Exito";
    }

    public function import()
    {
      $usuario = "root";
      $password = "";
      $servidor = "localhost";
      $basededatos = "clickscomputer";

      $conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");

      $db = mysqli_select_db($conexion, $basededatos) or die ("Upps! no se pudo conectar a la base de datos");

      $delimitador = "|";

      $archivo = fopen("planos/tipopieza.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      $consulta = "CALL EliminarTodos()";

      $resultado = mysqli_query($conexion, $consulta) or die ("Algo salio mal");

      echo $consulta;

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $tipo_id = $aDatos[0];
        $tipo_nombre = $aDatos[1];

        $consulta = "INSERT INTO tipopieza (tipo_id, tipo_nombre) VALUES ($tipo_id, '".$tipo_nombre."')";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/tipopc.txt", "rb");

      $aDatos = fgetcsv($archivo, 10000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 10000, $delimitador);

        $tipopc_id = $aDatos[0];
        $tipopc_nom = $aDatos[1];

        $consulta = "INSERT INTO tipopc (tipopc_id, tipopc_nom) VALUES ($tipopc_id, '".$tipopc_nom."')";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/rol.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $rol_id = $aDatos[0];
        $rol_nom = $aDatos[1];

        $consulta = "INSERT INTO rol (rol_id, rol_nom) VALUES ($rol_id, '".$rol_nom."')";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }

      $archivo = fopen("planos/egg.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $egg_id = $aDatos[0];
        $egg_nom = $aDatos[1];
        $egg_correo = $aDatos[2];
        $egg_contra = $aDatos[3];
        $egg_contra2 = $aDatos[4];
        $fk_rol_id = $aDatos[5];

        $consulta = "INSERT INTO egg (egg_id,egg_nom,egg_correo,egg_contra,egg_contra2,fk_rol_id) VALUES ($egg_id, '".$egg_nom."', '".$egg_correo."', '".$egg_contra."', '".$egg_contra2."', '".$fk_rol_id."')";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/inventario.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $inv_id = $aDatos[0];
        $inv_pre_uni = $aDatos[1];
        $inv_pre_total = $aDatos[2];
        $inv_fecha = $aDatos[3];
        $inv_cantidad = $aDatos[4];
        $inv_val_compra = $aDatos[5];
        $inv_val_venta = $aDatos[6];

        $consulta = "INSERT INTO inventario (inv_id,inv_pre_uni,inv_pre_total,inv_fecha,inv_cant,inv_val_compra,inv_val_venta) VALUES ($inv_id,$inv_pre_uni,$inv_pre_total,'".$inv_fecha."',$inv_cantidad,$inv_val_compra,$inv_val_venta)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/galeria.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $gal_id = $aDatos[0];
        $gal_img = $aDatos[1];

        $consulta = "INSERT INTO galeria (gal_id, gal_img) VALUES ($gal_id, '".$gal_img."')";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/comentarios.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $com_id = $aDatos[0];
        $com_desc = $aDatos[1];
        $calificacion = $aDatos[2];

        $consulta = "INSERT INTO comentarios (com_id, com_desc, calificacion) VALUES ($com_id, '".$com_desc."', $calificacion)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/usuario.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $usu_id = $aDatos[0];
        $usu_num_doc = $aDatos[1];
        $usu_nom = $aDatos[2];
        $usu_ape = $aDatos[3];
        $usu_tel = $aDatos[4];
        $usu_correo = $aDatos[5];
        $usu_nac = $aDatos[6];
        $usu_contra = $aDatos[7];
        $fk_rol_id = $aDatos[8];

        $consulta = "INSERT INTO usuario (usu_id,usu_num_doc,usu_nom,usu_ape,usu_tel,usu_correo,usu_nac,usu_contra,fk_rol_id) VALUES ($usu_id,$usu_num_doc,'".$usu_nom."','".$usu_ape."',$usu_tel,'".$usu_correo."','".$usu_nac."','".$usu_contra."',$fk_rol_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/piezas.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $pi_cod = $aDatos[0];
        $pi_nom = $aDatos[1];
        $pi_desc = $aDatos[2];
        $fk_tipo_id = $aDatos[3];

        $consulta = "INSERT INTO piezas (pi_cod, pi_nom, pi_desc, fk_tipo_id) VALUES ($pi_cod, '".$pi_nom."', '".$pi_desc."', $fk_tipo_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/pc.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $pc_id = $aDatos[0];
        $pc_cod = $aDatos[1];
        $pc_nom = $aDatos[2];
        $pc_desc = $aDatos[3];
        $pc_mod = $aDatos[4];
        $fk_tipopc_id = $aDatos[5];
        $ficha_tecnica = $aDatos[6];
        $pc_precio = $aDatos[7];

        $consulta = "INSERT INTO pc (pc_id,pc_cod,pc_nom,pc_desc,pc_mod,fk_tipopc_id,ficha_tecnica,pc_precio) VALUES ($pc_id,$pc_cod,'".$pc_nom."','".$pc_desc."','".$pc_mod."',$fk_tipopc_id,'".$ficha_tecnica."',$pc_precio)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/marca.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $mar_id = $aDatos[0];
        $mar_nom = $aDatos[1];
        $fk_pc_id = $aDatos[2];
        $fk_emp_id = $aDatos[3];
        $fk_pi_cod = $aDatos[4];


        $consulta = "INSERT INTO marca (mar_id,mar_nom,fk_pc_id,fk_emp_id,fk_pi_cod) VALUES ($mar_id,'".$mar_nom."',$fk_pc_id,$fk_emp_id,$fk_pi_cod)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/filtros.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $fil_id = $aDatos[0];
        $fil_nom = $aDatos[1];
        $fk_pc_id = $aDatos[2];
        $fk_pi_cod = $aDatos[3];

        $consulta = "INSERT INTO filtros (fil_id,fil_nom) VALUES ($fil_id,'".$fil_nom."')";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/empresa.txt", "rb");

      $aDatos = fgetcsv($archivo, 2000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 2000, $delimitador);

        $emp_id = $aDatos[0];
        $emp_nit = $aDatos[1];
        $emp_nom = $aDatos[2];
        $emp_dir = $aDatos[3];
        $emp_desc = $aDatos[4];
        $emp_tel = $aDatos[5];
        $emp_correo = $aDatos[6];
        $emp_contra = $aDatos[7];
        $fk_rol_id = $aDatos[8];

        $consulta = "INSERT INTO empresa (emp_id,emp_nit,emp_nom,emp_dir,emp_desc,emp_tel,emp_correo,emp_contra,fk_rol_id) VALUES ($emp_id,'".$emp_nit."',".chr(34).$emp_nom.chr(34).",'".$emp_dir."',".chr(34).$emp_desc.chr(34).",'".$emp_tel."','".$emp_correo."','".$emp_contra."',$fk_rol_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);


      $archivo = fopen("planos/cli_emp.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $fk_emp_id = $aDatos[0];
        $fk_usu_id = $aDatos[1];

        $consulta = "INSERT INTO cli_emp (fk_emp_id, fk_usu_id) VALUES ($fk_fil_id, $fk_emp_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/com_pc.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $fk_pc_id = $aDatos[0];
        $fk_com_id = $aDatos[1];
        $fk_usu_id = $aDatos[1];

        $consulta = "INSERT INTO com_pc (fk_pc_id, fk_com_id, fk_usu_id) VALUES ($fk_pc_id, $fk_com_id, $fk_usu_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/com_pie.txt", "rb");

      $aDatos = fgetcsv($archivo, 1000, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 1000, $delimitador);

        $fk_pi_cod = $aDatos[0];
        $fk_com_id = $aDatos[1];
        $fk_usu_id = $aDatos[1];

        $consulta = "INSERT INTO com_pie (fk_pi_cod, fk_com_id, fk_usu_id) VALUES ($fk_pi_cod, $fk_com_id, $fk_usu_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/emp_pc.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $fk_emp_id = $aDatos[0];
        $fk_pc_id = $aDatos[1];

        $consulta = "INSERT INTO emp_pc (fk_emp_id, fk_pc_id) VALUES ($fk_emp_id, $fk_pc_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/emp_pie.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $fk_emp_id = $aDatos[0];
        $fk_pi_cod = $aDatos[1];

        $consulta = "INSERT INTO emp_pie (fk_emp_id, fk_pi_cod) VALUES ($fk_emp_id, $fk_pi_cod)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/fil_emp.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $fk_fil_id = $aDatos[0];
        $fk_emp_id = $aDatos[1];

        $consulta = "INSERT INTO fil_emp (fk_fil_id, fk_emp_id) VALUES ($fk_fil_id, $fk_emp_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/gal_pc.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $fk_gal_id = $aDatos[0];
        $fk_pc_id = $aDatos[1];

        $consulta = "INSERT INTO gal_pc (fk_gal_id, fk_pc_id) VALUES ($fk_gal_id, $fk_pc_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/gal_pie.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $fk_gal_id = $aDatos[0];
        $fk_pi_cod = $aDatos[1];

        $consulta = "INSERT INTO gal_pie (fk_gal_id, fk_pi_cod) VALUES ($fk_gal_id, $fk_pi_cod)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/pc_inv.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $fk_pc_id = $aDatos[0];
        $fk_inv_id = $aDatos[1];

        $consulta = "INSERT INTO pc_inv (fk_pc_id, fk_inv_id) VALUES ($fk_pc_id, $fk_inv_id)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/pc_pie.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $fk_pc_id = $aDatos[0];
        $fk_pi_cod = $aDatos[1];

        $consulta = "INSERT INTO pc_pie (fk_pc_id, fk_pi_cod) VALUES ($fk_pc_id, $fk_pi_cod)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      $archivo = fopen("planos/pi_inv.txt", "rb");

      $aDatos = fgetcsv($archivo, 100, $delimitador);

      echo "</br>";

      while(feof($archivo) == false)
      {
        $aDatos = fgetcsv($archivo, 100, $delimitador);

        $fk_inv_id = $aDatos[0];
        $fk_pi_cod = $aDatos[1];

        $consulta = "INSERT INTO pi_inv (fk_inv_id, fk_pi_cod) VALUES ($fk_inv_id, $fk_pi_cod)";

        echo "</br>";

        echo $consulta;

        $resultado = mysqli_query($conexion, $consulta) or die ("Algo a salido mal en la insercion");
      }
      fclose($archivo);

      echo "<h1>Datos importados con exito</h1>";

      mysqli_close($conexion);
    }

  }

?>
