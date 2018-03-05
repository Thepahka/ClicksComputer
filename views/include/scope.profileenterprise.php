<div class="EnterpriseProfile">
  <div class="Enterprise-img">
    <img class="img-enterprise" src="views/assets/image/default.jpg" alt="enterpriseP">
  </div>
  <div class="enterprise-name">
    <?php
   echo ($_SESSION["user"]["nombre"]);
  ?>
  </div>
  <ul class="gestion">
    <a href="MyDashboard"><li class="gest">Gestionar productos</li></a>
    <a href=""><li class="gest">Gestionar perfil</li></a>
    <a href="GestionCategoria"><li class="gest">Mis Categorias</li></a>
    <a href="GestionMarcas"><li class="gest">Mis marcas</li></a>
  </ul>
</div>
