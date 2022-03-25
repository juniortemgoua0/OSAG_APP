<?php

session_start();
require "../classes/Database.php";
require "../classes/Utils.php";

$formData = $_GET['formData'];
$type = $formData['type'];
$data = array();

switch ($type){
    case "produit" :
      $data = array($formData['categorie'],$formData['designation'],$formData['marque'],0,$formData['prix']);
        break;
      case "utilisateur" :
        $data = array($_SESSION['user']['ID_AG'],$formData['nom'],$formData['prenom'],$formData['email'],$formData['cni'],$formData['ville'],$formData['telephone'],$formData['password'],$formData['fonction']);
        break;
        case "stock":
          $sql = "INSERT INTO exposer(ID_P , ID_UTIL , QUANTITE)
          VALUES(? , ? , ?  )";
          break;
        case "magasin" : 
          $sql = "INSERT INTO ajouter(ID_P , ID_UTIL  QUANTITE)
          VALUES(? , ? , ? )";
         break;
  }
  Utils::insert($type , $data);

?>