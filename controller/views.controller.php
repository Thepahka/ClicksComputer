<?php

  class ViewsController
  {

    public function Main()
    {
      require_once "views/include/scope.header.php";
      require_once "views/include/scope.menutop.php";
      require_once "views/landingpage.php";
    }

    // public function ManualDeUsuario()
    // {
    //   require_once "views/modules/manual_de_usuario/indexmanual.html";
    // }

  }



?>
