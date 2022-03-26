<?php 

class Utils {

  /**
   * Undocumented function
   *
   * @param string $username  
   * @param string $password
   * @return void
   */ 
    public static function login(string $username , string $password) 
    {
      $status = false; // va etre retourner par la fonction , true si tout se passe bien et false dans le cas contraire 
      $sql = "SELECT * FROM utilisateur as u, fonction as f , agence as a 
        WHERE EMAIL = ? 
        AND u.ID_AG = a.ID_AG 
        AND u.ID_FONCTION = f.ID_FONCTION";
      $result =  Database::query($sql , [$username]);

      if(count($result) > 0){
        if($result[0]['PASSWORD'] == $password){
          $_SESSION['connect'] = true;
          $_SESSION['user'] = $result[0];
          $status = true ;
          return $status;
        }else{
          $_SESSION['error_login'] = "Mot de passe incorrect";
          return $status ;
        }
      }else {
        $_SESSION['error_login'] = "Nom d'utilisateur incorrect";
        return $status ;
      }
    }

    /**
     * Undocumented function
     * Renvoie tous les produits presents en base de donnees
     * 
     * @return array
     */
  public static function getAllProducts() : array
  {
    
    $sql = "SELECT * FROM produit as p, categorie as c 
    WHERE p.ID_CAT = c.ID_CAT
    AND p.STATUT = 0" ;
    return Database::query($sql);
  }


    /**
     * Undocumented function
     *Reccepere tout les utilisateurs faisant partir de la meme agence que l'utilisateur courant
     * @param integer $id_agence identifiant de l'agence de l'utilisateur courant
     * @return array
     */
    public static function getUsers(int $id_agence) : array
    {
      $sql = "SELECT * FROM utilisateur as u, fonction as f , agence as a
      WHERE u.ID_FONCTION = f.ID_FONCTION 
      AND a.ID_AG = ?
      AND a.ID_AG = u.ID_AG
      AND u.STATUT = 0
      ";

      return Database::query($sql , [$id_agence]);
    }

    /**
     * Undocumented function
     * Renvoi un tableau contenant toutes les agences 
     * @return array
     */
    public static function getAgences(): array 
    {
    
      $sql = "SELECT * FROM agence" ;
      return Database::query($sql);
    }

    /**
     * Undocumented function
     *Renvoi un tableau contenant toutes les fonctions 
     * @return array
     */
    public static function getFonctions(): array {

      $sql = "SELECT * FROM fonction" ;
      return Database::query($sql);
    }

    public static function getAllCategories(): array {
      $sql = "SELECT * FROM categorie" ;
      return Database::query($sql);
    }


    public static function getEntrer(){
      $sql = "SELECT e.ID_ENTRER , p.DESIGNATION , e.QUANTITE , e.QUANTITE_EN_COURS , p.MARQUE , c.LIBELLE_CAT , e.DATE_AJOUT FROM entrer AS e , produit AS p , utilisateur AS u , categorie AS c 
      WHERE e.ID_P = p.ID_P 
      AND  e.ID_UTIL = u.ID_UTIL 
      AND p.ID_CAT = c.ID_CAT
      AND u.ID_AG = ? 
      ORDER BY e.ID_ENTRER";
      return Database::query($sql ,  [$_SESSION['user']['ID_AG']]);
    }


    public static function getExposer(){
      $sql = "SELECT e.ID_EXPOSER , p.DESIGNATION , e.QUANTITE , e.QUANTITE_EN_COURS , p.MARQUE , c.LIBELLE_CAT , e.DATE_AJOUT FROM exposer AS e , produit AS p , utilisateur AS u , categorie AS c 
      WHERE e.ID_P = p.ID_P 
      AND  e.ID_UTIL = u.ID_UTIL 
      AND p.ID_CAT = c.ID_CAT
      AND u.ID_AG = ? 
      ORDER BY e.ID_EXPOSER";
      return Database::query($sql , [$_SESSION['user']['ID_AG']]);
    }

    public static function getTotalProductInMagasin(){
      
      $sql = "SELECT * , SUM(e.QUANTITE_EN_COURS) AS SUM_QUANTITE FROM entrer AS e  , produit AS p ,categorie AS c , utilisateur AS u
      WHERE e.ID_P = p.ID_P
      AND p.ID_CAT = c.ID_CAT
      AND u.ID_UTIL = e.ID_UTIL
      AND u.ID_AG = ? 
      GROUP BY e.ID_P";
      return Database::query($sql , [$_SESSION['user']['ID_AG']]);
    }


    public static function getTotalProductInStock(){

      $sql = "SELECT * , SUM(e.QUANTITE_EN_COURS) AS SUM_QUANTITE FROM exposer AS e  , produit AS p , categorie AS c , utilisateur AS u
      WHERE e.ID_P = p.ID_P
      AND p.ID_CAT = c.ID_CAT
      AND u.ID_UTIL = e.ID_UTIL
      AND u.ID_AG = ? 
      GROUP BY e.ID_P";
      return Database::query($sql , [$_SESSION['user']['ID_AG']]);
    }

    /**
     * Undocumented function
     *
     * @param array $product
     * @return void
     */
    public static function createProduct(array $product){
      $sql = "INSERT INTO produit(ID_CAT , DESIGNATION , QUANTITE , PRIX , DATE_SAVE , DATE_UPDATE , STATUT)
      VALUES(? , ? , ? , ? , ? , ? , ? )";
      Database::query($sql, $product);
    }

    public static function insert(string $type , array $data){
      $sql = '';
      $feedback = "" ;
      switch ($type){
        case "produit" :
          $sql = "INSERT INTO produit(ID_CAT , DESIGNATION , MARQUE , QUANTITE , PRIX)
            VALUES(? , ? , ? , ? , ? )";
          $feedback = "Produit ajouter avec succes";
          break;
          
        case "utilisateur" :
          $sql = "INSERT INTO utilisateur(ID_AG , NOM , PRENOM , EMAIL , NUM_CNI , VILLE , TELEPHONE, PASSWORD , ID_FONCTION)
            VALUES(? , ? , ? , ? , ?, ? , ? , ? , ?)";
          $feedback = "Utilisateur enregistrer avec succes";
          break;
        case "stock":
          $sql = "INSERT INTO exposer (ID_P , ID_UTIL,  QUANTITE , QUANTITE_EN_COURS)
            VALUES(? , ? , ? , ?)";
          $feedback = "Produit ajouter avec succes";
          break;
        case "magasin" : 
          $sql = "INSERT INTO entrer (ID_P , ID_UTIL,  QUANTITE , QUANTITE_EN_COURS)
            VALUES(? , ? , ? , ? )";
          $feedback = "Produit ajouter avec succes";
          break;
        case "outstock" :
          $sql = "INSERT INTO sortie (ID_P , ID_UTIL,  QUANTITE )
            VALUES(? , ? , ? )";
          $feedback = "Produit ajouter avec succes";
          break;
      }

      Database::query($sql , $data);
      return $feedback;
    } 

    /**
     * Undocumented function
     *
     * @param string $table
     * @param integer $id_product
     * @param integer $id_user
     * @return void
     */
    public static function delete(string $type , int $id ,int $id_user)
    {  
      $feedback = '' ; 
      if($_SESSION['user']['FONCTION']== "directeur" || $_SESSION['user']['FONCTION']== "boss"){
        $sql = '';
        switch ($type){
          case 'utilisateur':
            $sql = "UPDATE utilisateur SET STATUT = 1 WHERE ID_UTIL = ? ";
            $feedback = "Utilisateur supprimer avec succes";
            break;
          case 'produit':
            $sql = "UPDATE produit SET STATUT = 1 WHERE ID_P = ? ";
            $feedback = "Produit supprimer avec succes";
            break;
        }
        Database::query($sql , [$id]);
        return $feedback;
      }else {
        return "Vous ne disposez pas des droit requis pour supprimer cet element ";
      }
    
    }

    /**
     * Undocumented function
     * Cette fonction sera utiliser lorsqu'on voudra effectuer un ajout en stock( en cours ou magasin)
     * ainsi qu'un retrait 
     *
     * @param string $type  reprente  un le stock qu'on veut toucher ( 'magasin' | 'en_cours')
     * @param string $operation  reprente l'operation a effectuer ( 'retrait' | 'ajout' )
     * @param integer $id_product  represente l'identifiant du produit a modifier
     * @param integer $id_user l'identifiant de l'utilisateur qui effectue l'operation
     * @param integer $quantite  la quantite a toucher 
     * @return string message de feedback
     */
    public static function update( string $type , string $operation ,
      int $id_product, int $quantite) : string
    {
        $sql = "";
        $status = "L'operation a echoue";
        if( $type == "magasin" ){ 
          if($operation == "ajout"){
            $sql = "UPDATE " ;
            $status = "Operation effectuer avec succes" ;
          }else if($operation == "retrait"){
            $sql = " UPDATE ";
            $status = "Operation effectuer avec succes" ;
          }
          Database::query($sql , [$id_product , $quantite]);
          return $status;
        }else if($type == "stock"){
          if($operation == "ajout"){
            $sql = "UPDATE " ;
            $status = "Operation effectuer avec succes" ;
          }else if ($operation == "retrait"){
            $sql = " UPDATE ";
            $status = "Operation effectuer avec succes" ;
          }
          Database::query($sql , [$id_product , $quantite]);
          return $status;
        } 
      return $status;
    }
}

?>