<?php
$result_entrer = Utils::getEntrer();

$result_exposer = Utils::getExposer();

?> 


<section class="home-section">
  <div class="head-section row">
    <h1 class="text-black-50 header-title col-sm-12 col-md-6 order-sm-2 order-md-1">Bienvenue sur notre dashboard</h1>
    <div class="search-user col-sm-12 col-md-6 order-sm-1 order-md-2">
      <form class="search-bar">
        <input type="text" placeholder="rechercher.....">
        <span>
          <i class="bx bx-search fs-4"></i>
        </span>
      </form>
      <div class="user-img">
        <img src="../assets/images/why-us.jpg" alt="">
      </div>
    </div>
  </div>
  <div class="head-info row">
    <div class=" content-card col-sm-1 col-md-4 col-lg-3 ">
      <div class="head-card h-100">
        <li><i class='bx bx-cart-alt cart'></i></li>
        <p>Quantite de produits du stock en cours 23/400</p>
      </div>
    </div>
    <div class=" content-card col-sm-1 col-md-4 col-lg-3 ">
      <div class="head-card h-100">
        <li><i class='bx bx-cart-alt cart'></i></li>
        <p>cle de produits du stock de la secretaire cours 60/100</p>
      </div>
    </div>
    <div class=" content-card col-sm-1 col-md-4 col-lg-3">
      <div class="head-card h-100">
        <li><i class='bx bxs-cart-add cart two'></i></li>
        <p>Quantite de produits du stock en Entree 600/900</p>
      </div>
    </div>
    <div class=" content-card col-sm-1 col-md-4 col-lg-3 ">
      <div class="head-card h-100">
        <li><i class='bx bx-down-arrow-alt down'></i></li>
        <p>Quantite de produits du stock en Sortie 1k/2k</p>
      </div>
    </div>
  </div>
</section>
<section class="data">
  <table class="table text-center">
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
    <?php foreach ($result_exposer as $r): ?>
    <tr>
      <td>res</td>
      <td>Ordinateur Portable</td>
      <td>1000f</td>
      <td>2022/10/14</td>
      <td>2022/12/16</td>
      <td>
        <div class="state d-flex justify-content-evenly align-items-center">
          <span class="round_dispo" style="background: white"></span><span>Disponible</span>
        </div>
      </td>
      <td>
        <div>
          <i class='bx bxs-trash delete fs-4' ></i>
          <i class='bx bxs-edit edit fs-4'></i>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>
