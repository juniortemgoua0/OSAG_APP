<?php 
session_start();

require "classes/Database.php";
require "classes/Utils.php";

if(isset($_POST['username']) ){

  $username =  $_POST['username'];
  $password = $_POST['password'];
  $status = Utils::login($username , $password);
  if($status){
    header("location:index.php");
  }
}
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>login page</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/icons-1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="vw-100">
  <div class="row vh-100 w-100">

    <div class="col-6 col-sm-12 col-md-6 vh-100 side-sign-in-img">
      <div class="cover"></div>
      <img src="assets/images/login-image/logo.jpg" class="login-logo" width="300" height="300" alt="">
    </div>
    <div class="col-6 col-sm-12 col-md-6 vh-100  overflow-scroll d-flex justify-content-center align-items-center content-form">
      <div class="w-75">
        <span class="sign-in-text ">Sign In</span>
        <p class="mt-3">Bienvenu sur la page de connexion, Veuillez entrer vos informations</p>
        
          <?php 
           if(isset( $_SESSION['error_login']) && !empty( $_SESSION['error_login'])){
              echo '<div class="alert alert-danger mt-3">'. $_SESSION["error_login"].'</div>'; 
           } 
          ?>

        <form method="post" action="" class="mt-3 " >
          <input type="text" class="sign-in-input w-100 px-4 my-3" name="username" placeholder="Email...">
          <input type="text" class="sign-in-input w-100 px-4" name="password" placeholder="Password...">
          <div class="form-group my-3">
            <input type="checkbox" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label"> Remember passord</label>
          </div>
          <button class="sign-in-input w-100 my-3" type="submit">SIGN IN</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
