  <?php 
   $result_product = Utils::getAllProducts()
  ?>

  <!-- code formulaire d'ajout a mettre dans un fichier externe -->
  <!-- <div class="container-form" id="modal">
    <li onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright">x</li>
    <div class="content">

    </div>
  </div> -->

  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

  <!-- Modal -->
  <div class="modal fade" id="modal-produit-add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Nouveau produit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="form-produit" class="form col">
            <div class="col-12 row mt-3">
              <div class="col-md-6 col-sm-12 mt-sm-3">
                <label for="produit-add-designation" class="form-label">Designation</label>
                <input type="text" class="form-control" id="produit-add-designation" name="designation" required>
              </div>
              <div class="col-md-6 col-sm-12 mt-sm-3">
                <label for="produit-add-marque" class="form-label">Marque</label>
                <input type="text" class="form-control" id="produit-add-marque" name="marque" required>
              </div>
            </div> 

            <div class="col-12 mt-3">
              <label for="produit-add-prix" class="form-label">Prix</label>
              <input type="number" class="form-control" id="produit-add-prix" name="prix" placeholder="30000" required>
            </div>
            <div class="col-12 mt-3">
              <label for="produit-add-categorie" class="form-label">Categorie</label>
              <select class="form-select" id="produit-add-categorie" name="categorie" required>
                <option value="" desabled>----------</option>
                <?php foreach ($result_category as $r):?>
                  <option value="<?=$r['ID_CAT']?>"><?=$r['LIBELLE_CAT']?></option>
                <?php endforeach ?>
              </select>
            </div>
    
            <div class="file-input form-group mt-3">
              <input type="file" name="image" id="file-input" class="file-input__input" />
              <label class="file-input__label" for="file-input">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload"
                  class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512">
                  <path fill="currentColor"
                    d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                  </path>
                </svg>
                <span>Upload file</span></label>
            </div>
            <div class="btn-action mt-4">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- fin code formulaire d'ajout produit -->

  <section class="home-section">
    <div class="head-section row">
      <h1 class="text-black-50 header-title col-sm-12 col-md-6">Liste de produit enregistrer</h1>
      <div class="col-sm-12 col-md-6 mt-sm-3 d-flex justify-content-md-end align-items-center"
        class="w3-button w3-black">
        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-produit-add"><button class="btn primary-btn"> <i
              class="bi bi-plus-lg fs-5"></i> Nouveau produit</button></a>
      </div>
    </div>
  </section>

  <section class="data ">
    <table class="table ">
      <thead>
        <tr>
          <th>
            <i class='bx bxl-product-hunt'></i><span>Identifiant</span>
          </th>
          <th>
            <i class='bx bxs-spreadsheet'></i>Designation
          </th>
          <th>
            <i class='bx bxs-spreadsheet'></i>Marque
          </th>
          <th>
            <i class='bx bxs-spreadsheet'></i>Categories
          </th>
          <th>
            <i class='bx bx-calendar-check'></i>Date ajout
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result_product as $r): ?>
        <tr>
          <td class="text-center"><?=$r['ID_P']?></td>
          <td class="text-center"><?=$r['DESIGNATION']?></td>
          <td class="text-center"><?=$r['MARQUE']?></td>
          <td class="text-center"><?=$r['LIBELLE_CAT']?></td>
          <td class="text-center"> <?=$r['DATE_SAVE']?></td>
          <td class="text-center">
            <div>
              <i class='bx bxs-trash delete fs-4' id="delete/produit/<?=$r['ID_P']?>/product"></i>
              <i class='bx bxs-edit edit fs-4' id="edit/produit/<?=$r['ID_P']?>/product"></i>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>