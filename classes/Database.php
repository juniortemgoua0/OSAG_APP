<?php
class Database
{
<<<<<<< HEAD
    
  public static string $host = 'localhost';
  public static string $port = '3306';
  public static string $dbName = 'osag';
  public static string $username = 'root';
  public static string $password = '';

  public static function connect(): PDO
=======
  public static  $host = 'localhost';
  public static  $port = '3306';
  public static  $dbName = 'ges_stock';
  public static  $username = 'root';
  public static  $password = '';

  public static function connect() 
>>>>>>> 6be8a624ad6ce9928a628976d7fd246eb0e6f7f8
  {
    try {
      $pdo = new PDO('mysql:host=' . self::$host . ';port=' . self::$port . ';dbname=' . self::$dbName ,self::$username, self::$password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
