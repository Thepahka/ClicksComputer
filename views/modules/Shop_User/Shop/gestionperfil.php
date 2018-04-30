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
        <form class="for-update" action="ActualizarDesc" method="post">
        <p class="cpc">Actualizar descripcion de tienda(<i>Ingrese la nueva descripcion de su tienda</i>)</p>
        <textarea class="in-cpcarea-perfil" name="descripcion" placeholder="<?php print_r(ucfirst($descripcion[0][0])); ?>"></textarea></br>
        <input class="btn-aupdateperfil-area" type="submit" name="" value="Actualizar descripcion de mi tienda">
        </form>
        <form class="for-update" action="ActualizarNit" method="post">
        <p class="cpc">Actualizar NIT de la Empresa(<i>Ingrese su nuevo NIT</i>)</p>
        <input class="in-cpcod-uptien-nit" type="text" name="nit" placeholder="<?php print_r(substr($nit[0][0],-100,-2)); ?>"> <label class="migadepan">-</label> </input><input name="complemento" placeholder="<?php print_r(substr($nit[0][0],-1)); ?>" class="in-cpcod-uptien-complemento" type="text"></br>
        <input class="btn-aupdateperfil" type="submit" name="" value="Actualizar mi NIT">
        </form>
        <form class="for-update" action="ActualizarDir" method="post">
        <p class="cpc">Actualizar Dirección de la Empresa(<i>Ingrese su nueva dirección</i>)</p>
        <input class="in-cpcod-uptien" name="direccion" type="text" placeholder="<?php print_r($direccion[0][0]); ?>"></input></br>
        <input class="btn-aupdateperfil" type="submit" name="" value="Actualizar mi dirección">
        </form>
        <form class="for-update" action="ActualizarCor" method="post">
        <p class="cpc">Actualizar Correo electronico de la Empresa(<i>Ingrese su nuevo correo electronico</i>)</p>
        <input class="in-cpcod-uptien" type="text" name="correo" placeholder="<?php print_r($correo[0][0]); ?>"></input></br>
        <input class="btn-aupdateperfil" type="submit" name="" value="Actualizar mi correo electronico">
        </form>
        <form class="for-update" action="ActualizarTel" method="post">
        <p class="cpc">Actualizar Telefono de la Empresa(<i>Ingrese su nuevo Telefono</i>)</p>
        <input class="in-cpcod-uptien" type="text" name="telefono" placeholder="<?php print_r($telefono[0][0]); ?>"></input></br>
        <input class="btn-aupdateperfil" type="submit" name="" value="Actualizar mi telefono">
      </div>
      </form>
      <?php require_once 'views/include/scope.menutopdashboard.php';
            require_once 'views/include/scope.profileenterprise.php';?>
    </body>
</html>
