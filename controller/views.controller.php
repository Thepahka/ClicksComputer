<?php

  class ViewsController
  {

    public function Main()
    {
      require_once "views/include/scope.header.php";
      require_once "views/include/scope.menutop.php";
      require_once "views/landingpage.php";
    }
  }


?>
