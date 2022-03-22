<?php 

class User{

   public function __construct(public int $id ,public string $nom , public string $prenom ,
     public string $email ,public string $fonction ,public string $agence)
    {
    }
}
?>