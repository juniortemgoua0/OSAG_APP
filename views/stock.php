<section class="home-section">
  <div class="head-section row">
    <h1 class="text-black-50 header-title col-sm-12 col-md-6">Stock en cours</h1>
    <div class="col-sm-12 col-md-6 mt-sm-3 d-flex justify-content-md-end align-items-center">
      <a href="#" class="me-4"><button class="btn primary-btn"> <i class="bi bi-dash-lg fs-5"></i> sortie de stock</button></a>
      <a href="#" ><button class="btn primary-btn"> <i class="bi bi-plus-lg fs-5"></i> Ajout au stock</button></a>
    </div>
  </div>
</section>

<section class="data ">
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
    <tbody id="stock-product">
    <?php foreach ($t as $a): ?>
      <tr>
        <td><img src="../assets/images/office-g58d369757_1920.jpg" alt=""></td>
        <td>Ordinateur Portable</td>
        <td>1000f</td>
        <td>2022/10/14</td>
        <td>2022/12/16</td>
        <td>
          <div class="state d-flex justify-content-evenly align-items-center"><span class="round_dispo"
                                                                                    style="background: white"></span><span>Disponible</span>
          </div>
        </td>
        <td>
          <div>
            <i class='bx bxs-trash delete fs-4' id="1"></i>
            <i class='bx bxs-edit edit fs-4'></i>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>

<div class="head-info p-4" ></div>

<?php if(isset($_SESSION['user']) && $_SESSION['user']['FONCTION']== "directeur"){ ?>
<section class="home-section">
  <div class="head-section row">
    <h1 class="text-black-50 header-title col-sm-12 col-md-6">Stock en magasin</h1>
    <a href="#" class="col-sm-12 col-md-6 mt-sm-3 d-flex justify-content-md-end align-items-center text-decoration-none">
      <button class="btn primary-btn"> <i class="bi bi-plus-lg fs-5"></i> Ajout en magasin</button>
    </a>
  </div>
</section>

<section class="data ">
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
    <?php foreach ($t as $a): ?>
      <tr>
        <td><img src="../assets/images/office-g58d369757_1920.jpg" alt=""></td>
        <td>Ordinateur Portable</td>
        <td>1000f</td>
        <td>2022/10/14</td>
        <td>2022/12/16</td>
        <td>
          <div class="state d-flex justify-content-evenly align-items-center"><span class="round_dispo"
                                                                                    style="background: white"></span><span>Disponible</span>
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
<?php } ?>
