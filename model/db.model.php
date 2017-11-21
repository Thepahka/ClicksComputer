<?php

  class DataBase
  {
    private static $dbhost = "Localhost";
    private static $dbuser = "root";
    private static $dbpass = "";
    private static $dbname = "clickscomputer";

    private static $status = null;

    public static function open()
    {
      if(self::$status == null)
      {
        try
        {
          self::$status = new PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname,self::$dbuser,self::$dbpass);

          self::$status-> exec("SET CHARACTER SET utf8");

          return self::$status;
        }
        catch(PDOException $e)
        {
          die($e->getMessage());
        }
      }

    }

    public function close()
    {
      self::$status = null;
    }


  }

 ?>
