<div class="EnterpriseProfile">
  <div class="Enterprise-img">
    <img class="img-enterprise" src="views/assets/image/default.jpg" alt="enterpriseP">
  </div>
  <div class="enterprise-name">
    <?php
   echo ($_SESSION["user"]["nombre"]);
  ?>
  </div>
  <div class="gestion">
    <a class="gest" href="MyDasboard">Gestionar productos</a>
    <a class="gest" href="">Gestionar perfil</a>
    <a class="gest" href="">Gestionar categorias</a>
    <a class="gest" href="GestionMarcas">Mis marcas</a>
  </div>
</div>
