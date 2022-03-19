<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href='css/bootstrap.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="assets/icons-1.7.1/font/bootstrap-icons.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="contain">
 <?php require "sidebar.php" ?>
  <section class="section">
    <section class="home-section">
      <div class="head-section">
        <h1>Bienvenue sur notre dashboard</h1>
        <form class="search-bar">
          <input type="text" placeholder="rechercher.....">
          <i class="bx bx-search"></i>
        </form>
        <li class="user-img">
          <img src="assets/why-us.jpg" alt="">
        </li>
      </div>
      <div class="head-info row">
        <div class=" content-card col-sm-1 col-md-3 ">
          <div class="head-card h-100">
            <li><i class='bx bx-cart-alt cart'></i></li>
            <p>Quantite de produits du stock en cours 23/400</p>
          </div>
        </div>
        <div class=" content-card col-sm-1 col-md-3 ">
          <div class="head-card h-100">
            <li><i class='bx bx-cart-alt cart'></i></li>
            <p>cle de produits du stock de la secretaire cours 60/100</p>
          </div>
        </div>
        <div class=" content-card col-sm-1 col-md-3 ">
          <div class="head-card h-100">
            <li><i class='bx bxs-cart-add cart two'></i></li>
            <p>Quantite de produits du stock en Entree 600/900</p>
          </div>
        </div>

        <div class=" content-card col-sm-1 col-md-3 ">
          <div class="head-card h-100">
            <li><i class='bx bx-down-arrow-alt down'></i></li>
            <p>Quantite de produits du stock en Sortie 1k/2k</p>
          </div>
        </div>
      </div>
    </section>
    <section class="data">
      <table class="table">

        <thead>
        <tr>
          <th>
            <i class='bx bxl-product-hunt'></i><span>Image</span>
          </th>
          <th>
            <i class='bx bxs-spreadsheet'></i>Designation
          </th>
          <th>
            <i class='bx bxs-spreadsheet'></i>Prix
          </th>
          <th>
            <i class='bx bxs-spreadsheet'></i>Date save
          </th>
          <th>
            <i class='bx bx-calendar-check'></i>Date update
          </th>
          <th>
            <i class='bx bxs-home'></i> Disponibilite
          </th>
          <th>
            Action
          </th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td><img src="assets/office-g58d369757_1920.jpg" alt=""></td>
          <td>Ordinateur Portable</td>
          <td>1000f</td>
          <td>2022/10/14</td>
          <td>2022/12/16</td>
          <td>
            <div class="state">oui</div>
          </td>
          <td>
            <div>
              <i class='bx bxs-trash'></i>
              <i class='bx bxs-edit'></i>
            </div>
          </td>
        </tr>
        <tr>
          <td><img src="assets/office-g58d369757_1920.jpg" alt=""></td>
          <td>Ordinateur Portable</td>
          <td>1000f</td>
          <td>2022/10/14</td>
          <td>2022/12/16</td>
          <td>
            <div class="state">oui</div>
          </td>
          <td>
            <div class="delete">
              <i class='bx bxs-trash'></i>
              <i class='bx bxs-edit'></i>
            </div>
          </td>
        </tr>
        <tr>
          <td><img src="assets/office-g58d369757_1920.jpg" alt=""></td>
          <td>Ordinateur Portable</td>
          <td>1000f</td>
          <td>2022/10/14</td>
          <td>2022/12/16</td>
          <td>
            <div class="state nan-actif">non</div>
          </td>
          <td>
            <div>
              <i class='bx bxs-trash'></i>
              <i class='bx bxs-edit'></i>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </section>
  </section>
</div>

<script src="js/main.js"></script>
</body>
</html>



