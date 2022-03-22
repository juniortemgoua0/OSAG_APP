<?php 
session_start();
  require "../classes/Database.php";
  require "../classes/Utils.php";

  $id = $_GET['id'];
  $type = $_GET['type'];
  Utils::delete($type,$id,$_SESSION['user']['ID_UTIL']);
  // echo "supprimer"; 

?>