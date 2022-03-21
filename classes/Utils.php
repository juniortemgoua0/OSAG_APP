<?php 

 class Utils {

    public static function login(string $username , string $password) 
    {
        $status = false;
        $sql = "SELECT * FROM utilisateur WHERE EMAIL = ? ";
        $result =  Database::query($sql , [$username]);

        if(count($result) > 0){
           if($result[0]['PASSWORD'] == $password){
             $_SESSION['connect'] = true;
             $_SESSION['user'] = $result;
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
 }

?>