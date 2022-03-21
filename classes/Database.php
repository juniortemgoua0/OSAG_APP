<?php

class Database
{

  public static  $host = 'localhost';
  public static  $port = '3306';
  public static  $dbName = 'osag';
  public static  $username = 'root';
  public static  $password = '';

  public static function connect(): PDO
  {
    try {
      $pdo = new PDO('mysql:host=' . self::$host . ';port=' . self::$port . ';dbname=' . self::$dbName ,self::$username, self::$password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo 'Connexion reussite';
      return $pdo;
    }catch (PDOException $exception){
      echo 'Connexion echoue : ' . $exception->getMessage();
    }
  }

  /**
   * @param string $query  represente la requete a executer
   * @param array $params  Represente le tableau de parametre ou de valeur fournir en drapeau dans la requete
   * @return array|false|void retourne un tableau de donnees dans le cas ou il s'agirai d'une requete de type SELECT
   */
  public static function query(string $query, array $params = array())
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
