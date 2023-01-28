<?php

namespace app\database;

use PDO;

class Connection
{
  private static ?PDO $connection = null;

  public static function connect()
  {
    $database = $_ENV['DATABASE_NAME'];
    $user = $_ENV['DATABASE_USER'];
    $host = $_ENV['DATABASE_HOST'];
    $password = $_ENV['DATABASE_PASSWORD'];
    if (!self::$connection) {
      self::$connection = new PDO("mysql:host={$host};dbname={$database}", $user, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
      ]);
    }

    return self::$connection;
  }
}
