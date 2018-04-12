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
        <title></title>
    </head>
    <body>
        <p>Gestion del perfil de <?php echo ucwords($_SESSION["user"]["nombre"]); ?></p>
        <form class="" action="ActualizarDescripcion" method="post">
        <p>Actualizar descripcion de tienda(<i>Ingrese la nueva descripcion de su tienda</i>)</p>
        <textarea  name="descripcion[]" placeholder="<?php print_r(ucfirst($descripcion[0][0])); ?>"></textarea></br>
        <input type="submit"  value="Actualizar descripcion de mi tienda" onclick="jabon()">
        </form>
        <form class="" action="" method="post">
        <p>Actualizar NIT de la Empresa(<i>Ingrese su nuevo NIT</i>)</p>
        <input name="NIT" type="text" placeholder="<?php print_r($nit[0][0]); ?>"></input></br>
        <input type="submit" name="" value="Actualizar mi NIT">
        </form>
        <form class="" action="ActualizarDireccion" method="post">
        <p>Actualizar Dirección de la Empresa(<i>Ingrese su nueva dirección</i>)</p>
        <input name="direccion[]" type="text" placeholder="<?php print_r($direccion[0][0]); ?>"></input></br>
        <input type="submit" name="" value="Actualizar mi dirección">
        </form>
        <form class="" action="ActualizarCorreo" method="post">
        <p>Actualizar Correo electronico de la Empresa(<i>Ingrese su nuevo correo electronico</i>)</p>
        <input name="correo[]" type="text" placeholder="<?php print_r($correo[0][0]); ?>"></input></br>
        <input type="submit" name="" value="Actualizar mi correo electronico">
        </form>
        <form class="" action="ActualizarTelefono" method="post">
        <p>Actualizar Telefono de la Empresa(<i>Ingrese su nuevo Telefono</i>)</p>
        <input name="telefono[]" type="text" placeholder="<?php print_r($telefono[0][0]); ?>"></input></br>
        <input type="submit" name="" value="Actualizar mi telefono">
        </form>
    </body>
</html>
