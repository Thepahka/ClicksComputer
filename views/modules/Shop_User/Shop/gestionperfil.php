<?php
    $descripcion = $this->leer();
    $nit = $this->Leer2();
    $direccion = $this->Leer3();
    $correo = $this->Leer4();
    $telefono = $this->Leer5();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="views/assets/image/logo.png">
        <title>gestion de perfil</title>
    </head>
    <body class="body-dash">
      <div class="wrap-nav">
        <h1 class="nav-titulo">Gestion del perfil de <?php echo ucwords($_SESSION["user"]["nombre"]); ?></h1>
        <form class="" action="ActualizarDesc" method="post">
        <p>Actualizar descripcion de tienda(<i>Ingrese la nueva descripcion de su tienda</i>)</p>
        <textarea name="descripcion" placeholder="<?php print_r(ucfirst($descripcion[0][0])); ?>"></textarea></br>
        <input type="submit" name="" value="Actualizar descripcion de mi tienda">
        </form>
        <form class="" action="ActualizarNit" method="post">
        <p>Actualizar NIT de la Empresa(<i>Ingrese su nuevo NIT</i>)</p>
        <input type="text" name="nit" placeholder="<?php print_r($nit[0][0]); ?>"><p>-</p></input><input type="text" name="complemento"></br>
        <input type="submit" name="" value="Actualizar mi NIT">
        </form>
        <form class="" action="ActualizarDir" method="post">
        <p>Actualizar Dirección de la Empresa(<i>Ingrese su nueva dirección</i>)</p>
        <input name="direccion" type="text" placeholder="<?php print_r($direccion[0][0]); ?>"></input></br>
        <input type="submit" name="" value="Actualizar mi dirección">
        </form>
        <form class="" action="ActualizarCor" method="post">
        <p>Actualizar Correo electronico de la Empresa(<i>Ingrese su nuevo correo electronico</i>)</p>
        <input type="text" name="correo" placeholder="<?php print_r($correo[0][0]); ?>"></input></br>
        <input type="submit" name="" value="Actualizar mi correo electronico">
        </form>
        <form class="" action="ActualizarTel" method="post">
        <p>Actualizar Telefono de la Empresa(<i>Ingrese su nuevo Telefono</i>)</p>
        <input type="text" name="telefono" placeholder="<?php print_r($telefono[0][0]); ?>"></input></br>
        <input type="submit" name="" value="Actualizar mi telefono">
      </div>
      </form>
      <?php require_once 'views/include/scope.menutopdashboard.php';
            require_once 'views/include/scope.profileenterprise.php';?>
    </body>
</html>
