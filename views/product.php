  <!-- code formulaire d'ajout a mettre dans un fichier externe -->

  <div class="container-form" id="modal">
        <li onclick="document.getElementById('modal').style.display='none'"
      class="w3-button w3-display-topright">x</li>
        <div class="content">
          <form action="" class="form">
              <h1>New Product</h1>
              <input type="text" placeholder="Designation" require><br>
              <input type="text" placeholder="prix" require><br><br>
              <div class="file-input">
                <input
                  type="file"
                  name="file-input"
                  id="file-input"
                  class="file-input__input"
                />
                <label class="file-input__label" for="file-input">
                  <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fas"
                    data-icon="upload"
                    class="svg-inline--fa fa-upload fa-w-16"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                  >
                    <path
                      fill="currentColor"
                      d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                    ></path>
                  </svg>
                  <span>Upload file</span></label
                >
              </div>
              <div class="btn-action">
                  <input class="btn btn-primary" type="submit" value="Enregistrer" ><br>
              </div>
          </form>
        </div>
    </div>

  <!-- fin code formulaire d'ajout produit -->

<section class="home-section">
  <div class="head-section row">
    <h1 class="text-black-50 header-title col-sm-12 col-md-6">Liste de produit enregistrer</h1>
    <div class="col-sm-12 col-md-6 mt-sm-3 d-flex justify-content-md-end align-items-center" onclick="document.getElementById('modal').style.display='block'" class="w3-button w3-black">
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
