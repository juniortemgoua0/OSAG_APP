<section class="home-section">
  <div class="head-section row">
    <h1 class="text-black-50 header-title col-sm-12 col-md-6">Liste de produit enregistrer</h1>
    <div class="col-sm-12 col-md-6 mt-sm-3 d-flex justify-content-md-end align-items-center">
      <a href="#" ><button class="btn primary-btn"> <i class="bi bi-plus-lg fs-5"></i> Nouveau produit</button></a>
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
