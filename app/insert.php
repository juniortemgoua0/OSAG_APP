<?php

session_start();
require "../classes/Database.php";
require "../classes/Utils.php";

$formData = $_GET['formData'];
$type = $formData['type'];
$data = array();
$feedback = "Vous ne disposez pas de droit requis pour effectuer cette operation";
if($_SESSION['user']['FONCTION'] == "directeur"){
  switch ($type){
    case "produit" :
      $data = array($formData['categorie'],$formData['designation'],$formData['marque'],0,$formData['prix']);
      $feedback = Utils::insert($type , $data);
        break;
      case "utilisateur" :
        $data = array($_SESSION['user']['ID_AG'],$formData['nom'],$formData['prenom'],$formData['email'],$formData['cni'],$formData['ville'],$formData['telephone'],$formData['password'],$formData['fonction']);
        $feedback = Utils::insert($type , $data);
        break;
      case "magasin": 
        $data = array($formData['designation'], $_SESSION['user']['ID_UTIL'] , $formData['quantite'], $formData['quantite'] );
        $feedback = Utils::insert($type , $data);
        break;
  }

  if($type=== "outstock"){
    $sql_verirify_quantity = "SELECT * , SUM(QUANTITE_EN_COURS) AS SUM_QUANTITE FROM exposer
      WHERE ID_P = ? GROUP BY ID_P";
      $result = Database::query($sql_verirify_quantity , [$formData['designation']])[0];
      if($result['SUM_QUANTITE'] < $formData['quantite']){
        $feedback = " Vous ne pouvez pas effectuer sortie car la quantite demander 
        est superieur a la quantite exposer";
      }else{
        $remain = $formData['quantite'];
        $sql_get_product_occurence = "SELECT * FROM exposer WHERE ID_P = ? ";
        $result_product_occurence = Database::query($sql_get_product_occurence , [$formData['designation']]);
        $i=0;
        while($remain > 0){
          $sql_remove_quantite = "UPDATE exposer SET QUANTITE_EN_COURS = ? WHERE ID_EXPOSER = ? ";
          if($result_product_occurence[$i]['QUANTITE_EN_COURS'] < $remain){
            Database::query($sql_remove_quantite , [0 , $result_product_occurence[$i]['ID_EXPOSER']]);
            $remain = $remain - $result_product_occurence[$i]["QUANTITE_EN_COURS"];
            $i++;
          }else{
            $remain_quantite = $result_product_occurence[$i]["QUANTITE_EN_COURS"] - $remain;
            Database::query($sql_remove_quantite , [$remain_quantite , $result_product_occurence[$i]['ID_EXPOSER']]);
            $remain = 0;
          }
        }
        $data = array($formData['designation'], $_SESSION['user']['ID_UTIL'] , $formData['quantite']);
        $feedback = Utils::insert($type , $data);
      }
  }

  if($type == "stock"){
      $sql_verirify_quantity = "SELECT * , SUM(QUANTITE_EN_COURS) AS SUM_QUANTITE FROM entrer
      WHERE ID_P = ? GROUP BY ID_P";
      $result = Database::query($sql_verirify_quantity , [$formData['designation']])[0];
      if($result['SUM_QUANTITE'] < $formData['quantite']){
        $feedback = " Vous ne pouvez pas effectuer cet ajout car la quantite demander 
        est superieur a la quantite en magasin";
      }else{
        $remain = $formData['quantite'];
        $sql_get_product_occurence = "SELECT * FROM entrer WHERE ID_P = ? ";
        $result_product_occurence = Database::query($sql_get_product_occurence , [$formData['designation']]);
        $i=0;
        while($remain > 0){
          $sql_remove_quantite = "UPDATE entrer SET QUANTITE_EN_COURS = ? WHERE ID_ENTRER = ? ";
          if($result_product_occurence[$i]['QUANTITE_EN_COURS'] < $remain){
            Database::query($sql_remove_quantite , [0 , $result_product_occurence[$i]['ID_ENTRER']]);
            $remain = $remain - $result_product_occurence[$i]["QUANTITE_EN_COURS"];
            $i++;
          }else{
            $remain_quantite = $result_product_occurence[$i]["QUANTITE_EN_COURS"] - $remain;
            Database::query($sql_remove_quantite , [$remain_quantite , $result_product_occurence[$i]['ID_ENTRER']]);
            $remain = 0;
          }
        }
        $data = array($formData['designation'], $_SESSION['user']['ID_UTIL'] , $formData['quantite'] , $formData['quantite']);
        $feedback = Utils::insert($type , $data);
      }
  }
}

echo $feedback ;

?>