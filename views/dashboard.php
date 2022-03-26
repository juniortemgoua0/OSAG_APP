<?php
$result_entrer = Utils::getEntrer();

$result_exposer = Utils::getExposer();
// echo "<pre>";
// print_r($result_exposer);
// echo "</pre>";
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
        <p>Quantité de produits du stock en cours 23/400</p>
      </div>
    </div>
    <div class=" content-card col-sm-1 col-md-4 col-lg-3 ">
      <div class="head-card h-100">
        <li><i class='bx bx-cart-alt cart'></i></li>
        <p>Quantité de produits du stock de la secretaire en cours 60/100</p>
      </div>
    </div>
    <div class=" content-card col-sm-1 col-md-4 col-lg-3">
      <div class="head-card h-100">
        <li><i class='bx bxs-cart-add cart two'></i></li>
        <p>Quantité de produits du stock en Entrée 600/900</p>
      </div>
    </div>
    <div class=" content-card col-sm-1 col-md-4 col-lg-3 ">
      <div class="head-card h-100">
        <li><i class='bx bx-down-arrow-alt down'></i></li>
        <p>Quantité de produits du stock en Sortie 1k/2k</p>
      </div>
    </div>
  </div>
</section>


<?php if(isset($_SESSION['user']) && $_SESSION['user']['FONCTION'] == "directeur"){ ?>
<section class="data">
  <h3 class="my-3">Historique des produits entrés</h3>
  <table class="table text-center">
    <thead>
    <tr>
      <th>
        <i class='bx bxl-product-hunt'></i><span>Identifiant</span>
      </th>
      <th>
        <i class='bx bxs-spreadsheet'></i>Designation
      </th>
      <th>
        <i class='bx bxs-spreadsheet'></i>Quantite
      </th>
      <th>
        <i class='bx bx-calendar-check'></i>Quantite restante
      </th>
      <th>
        <i class='bx bxs-home'></i> Marque
      </th>
      <th>
        <i class='bx bxs-home'></i> Categorie
      </th>
      <th>
        <i class='bx bxs-home'></i> Date d'ajout
      </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result_entrer as $r): ?>
    <tr>
      <td class="text-center"><?=$r['ID_ENTRER']?></td>
      <td class="text-center"><?=$r['DESIGNATION']?></td>
      <td class="text-center"><?=$r['QUANTITE']?></td>
      <td class="text-center"><?=$r['QUANTITE_EN_COURS']?></td>
      <td class="text-center"><?=$r['MARQUE']?></td>
      <td class="text-center"><?=$r['LIBELLE_CAT']?></td>
      <td class="text-center"><?=$r['DATE_AJOUT']?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>
<?php } ?>

<section class="data">
  <h3 class="my-3">Historique des produits exposés </h3>
  <table class="table text-center">
    <thead>
    <tr>
      <th>
        <i class='bx bxl-product-hunt'></i><span>Identifiant</span>
      </th>
      <th>
        <i class='bx bxs-spreadsheet'></i>Designation
      </th>
      <th>
        <i class='bx bxs-spreadsheet'></i>Quantite
      </th>
      <th>
        <i class='bx bx-calendar-check'></i>Quantite restante
      </th>
      <th>
        <i class='bx bxs-home'></i> Marque
      </th>
      <th>
        <i class='bx bxs-home'></i> Categorie
      </th>
      <th>
        <i class='bx bxs-home'></i> Date d'ajout
      </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result_exposer as $r): ?>
    <tr>
      <td class="text-center"><?=$r['ID_EXPOSER']?></td>
      <td class="text-center"><?=$r['DESIGNATION']?></td>
      <td class="text-center"><?=$r['QUANTITE']?></td>
      <td class="text-center"><?=$r['QUANTITE_EN_COURS']?></td>
      <td class="text-center"><?=$r['MARQUE']?></td>
      <td class="text-center"><?=$r['LIBELLE_CAT']?></td>
      <td class="text-center"><?=$r['DATE_AJOUT']?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>

<section class="data">
  <h3 class="my-3">Historique des produits sortis</h3>
  <table class="table text-center">
    <thead>
    <tr>
      <th>
        <i class='bx bxl-product-hunt'></i><span>Identifiant</span>
      </th>
      <th>
        <i class='bx bxs-spreadsheet'></i>Designation
      </th>
      <th>
        <i class='bx bxs-spreadsheet'></i>Quantite
      </th>
      <th>
        <i class='bx bx-calendar-check'></i>Quantite restante
      </th>
      <th>
        <i class='bx bxs-home'></i> Marque
      </th>
      <th>
        <i class='bx bxs-home'></i> Categorie
      </th>
      <th>
        <i class='bx bxs-home'></i> Date d'ajout
      </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result_entrer as $r): ?>
    <tr>
      <td class="text-center"><?=$r['ID_ENTRER']?></td>
      <td class="text-center"><?=$r['DESIGNATION']?></td>
      <td class="text-center"><?=$r['QUANTITE']?></td>
      <td class="text-center"><?=$r['QUANTITE_EN_COURS']?></td>
      <td class="text-center"><?=$r['MARQUE']?></td>
      <td class="text-center"><?=$r['LIBELLE_CAT']?></td>
      <td class="text-center"><?=$r['DATE_AJOUT']?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>