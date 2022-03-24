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
      $sql = '';
       switch ($type){
         case 'utilisateur':
          $sql = "UPDATE utilisateur SET STATUT = 1 WHERE ID_UTIL = ? ";
          break;
         case 'produit':
          $sql = "UPDATE produit SET STATUT = 1 WHERE ID_P = ? ";
          break;
       }
       Database::query($sql , [$id]);
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
    public function updateProduct( string $type , string $operation ,
     int $id_product, int $id_user , int $quantite) : string
     {
       $sql = "";
       $status = "L'operation a echoue";
        if( $type == "magasin" ){ 
          if($operation == "ajout"){
            $sql = "UPDATE " ;
            $status = "Operation effectuer avec succes" ;
          }else{
            $sql = " UPDATE ";
            $status = "Operation effectuer avec succes" ;
          }
          Database::query($sql , [$id_product , $id_user , $quantite]);
          return $status;
        }else{
          if($operation == "ajout"){
            $sql = "UPDATE " ;
            $status = "Operation effectuer avec succes" ;
          }else{
            $sql = " UPDATE ";
            $status = "Operation effectuer avec succes" ;
          }
          Database::query($sql , [$id_product , $id_user , $quantite]);
          return $status;
        } 
       return $status;
    }


    public static function InsertImg(){
      
    }
 }

?>