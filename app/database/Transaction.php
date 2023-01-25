<?php

namespace app\database;

use PDO;

class Transaction
{
  private static ?PDO $conn = null;

  public static function open()
  {
    self::$conn = Connection::connect();
    self::$conn->beginTransaction();
  }

  public static function getConnection()
  {
    if (self::$conn) {
      return self::$conn;
    }
  }

  public static function rollback()
  {
    if (self::$conn) {
      self::$conn->rollBack();
      self::$conn = null;
    }
  }

  public static function close()
  {
    if (self::$conn) {
      self::$conn->commit();
      self::$conn = null;
    }
  }
}
