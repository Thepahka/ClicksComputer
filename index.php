<?php
  session_start();
  require_once "model/db.model.php";

  if(isset($_REQUEST["c"]))
  {
    $controller = strtolower($_REQUEST["c"]);
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'Controller';
    $controller = new $controller;
    //preguntar si hay accion
    $action = isset($_REQUEST["a"])? $_REQUEST["a"]: "main";
    call_user_func(array($controller,$action));
  }
  else
  {
    $controller = "views";
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'Controller';
    $controller = new $controller;

    //accion por defecto
    $controller->main();
  }

?>
