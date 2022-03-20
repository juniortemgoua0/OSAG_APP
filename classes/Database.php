<?php

class Database
{

  public static string $host = 'localhost';
  public static string $port = '3306';
  public static string $dbName = 'osag';
  public static string $username = 'root';
  public static string $password = 'root';

  public static function connect(): PDO
  {
    $pdo = new PDO('mysql:host=' . self::$host . ';port=' . self::$port . ';dbname=' . self::$dbName . ';charset=utf8',
      self::$username, self::$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion reussite';
    return $pdo;
  }

  public static function query($query, $params = array())
  {
    $statement = self::connect()->prepare($query);
    $statement->execute($params);
    if (explode(' ', $query)[0] == 'SELECT') {
      $data = $statement->fetchAll();
      return $data;
    }
  }
}

?>
