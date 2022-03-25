<?php 

$resultTotalProductInMagasin = Utils::getTotalProductInMagasin();
$resultTotalProductInStock = Utils::getTotalProductInStock();

// echo "<pre>";
// print_r($result_magasin);
// echo "</pre>";
?>



<section class="home-section">
  <div class="head-section row">
    <h1 class="text-black-50 header-title col-sm-12 col-md-6">Stock en cours</h1>
    <div class="col-sm-12 col-md-6 mt-sm-3 d-flex justify-content-md-end align-items-center">
      <a href="#" data-bs-target="#modal-stock" data-bs-toggle="modal"><button class="btn primary-btn"> <i
            class="bi bi-plus-lg fs-5"></i> Ajout au stock</button></a>
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
          <i class='bx bxs-spreadsheet'></i>Prix
        </th>
        <th>
          <i class='bx bxs-spreadsheet'></i>Quantite
        </th>
        <th>
          <i class='bx bx-calendar-check'></i> Marque
        </th>
        <th>
          <i class='bx bx-calendar-check'></i> Categorie
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
      <?php foreach ($resultTotalProductInStock as $r): ?>
      <tr>
      <td><?=$r['ID_P']?></td>
        <td class="text-center"><?=$r['DESIGNATION']?></td>
        <td class="text-center"><?=$r['PRIX']?></td>
        <td class="text-center"><?=$r['SUM_QUANTITE']?></td>
        <td class="text-center"><?=$r['MARQUE']?></td>
        <td class="text-center"><?=$r['LIBELLE_CAT']?></td>
        <td class="text-center">
          <div class="state d-flex justify-content-evenly align-items-center"><span class="round_dispo"
              style="background: white"></span><span>Disponible</span>
          </div>
        </td class="text-center">
        <td class="text-center">
          <div>
            <i class='bx bxs-trash delete fs-4' id="1"></i>
            <i class='bx bxs-edit edit fs-4' data-bs-whatever="<?=$r?>" data-bs-toggle="modal" data-bs-target="#modal-edit-stock"></i>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>

<!-- Modal edition en stock -->

<div class="modal fade" id="modal-edit-stock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modification du stock de produit en en cours</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="form-edit-stock" class="form col">
          <div class="col-12 row mt-3">
            <div class="col-md-6 col-sm-12 mt-sm-3">
              <label for="stock-edit-operation" class="form-label">Type d'operation</label>
              <select class="form-select" id="stock-edit-operation" name="operation">
                <option value="ajout">Ajout</option>
                <option value="retrait">Retrait</option>
              </select>
            </div>
            <div class="col-md-6 col-sm-12 mt-sm-3">
              <label for="stock-edit-quantite" class="form-label">Quantite</label>
              <input type="number" class="form-control" id="stock-edit-quantite" name="quantite">
            </div>
          </div>
          <div class="col-12 mt-sm-3">
              <input type="number" class="form-control " hidden id="recipient-stock"  name="id-produit">
            </div>
          <div class="btn-action mt-4 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- fin code formulaire d'ajout produit -->

<!-- Modal -->
<div class="modal fade" id="modal-stock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajout de produit au stock en cours</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="form-stock" class="form col">
          <div class="col-12 row mt-3">
            <div class="col-md-6 col-sm-12 mt-sm-3">
              <label for="stock-add-designation" class="form-label">Designation</label>
              <select class="form-select" id="stock-add-designation" name="designation" required>
                <option value="">----------</option>
                <?php foreach ($resultTotalProductInMagasin as $r):?>
                <option value="<?=$r['ID_P']?>"><?=$r['DESIGNATION']?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-md-6 col-sm-12 mt-sm-3">
              <label for="stock-add-quantite" class="form-label">Quantite</label>
              <input type="number" class="form-control" id="stock-add-quantite" name="quantite" required>
            </div>
          </div>
          <div class="btn-action mt-4 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- fin code formulaire d'ajout produit -->


<div class="head-info p-4"></div>

<?php if(isset($_SESSION['user']) && $_SESSION['user']['FONCTION']== "directeur"){ ?>
<section class="home-section">
  <div class="head-section row">
    <h1 class="text-black-50 header-title col-sm-12 col-md-6">Stock en magasin</h1>
    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-magasin"
      class="col-sm-12 col-md-6 mt-sm-3 d-flex justify-content-md-end align-items-center text-decoration-none">
      <button class="btn primary-btn"> <i class="bi bi-plus-lg fs-5"></i> Ajout en magasin</button>
    </a>
  </div>
</section>

<section class="data ">
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
          <i class='bx bxs-spreadsheet'></i>Prix
        </th>
        <th>
          <i class='bx bxs-spreadsheet'></i>Quantite
        </th>
        <th>
          <i class='bx bx-calendar-check'></i> Marque
        </th>
        <th>
          <i class='bx bx-calendar-check'></i> Categorie
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
      <?php foreach ($resultTotalProductInMagasin as $r): ?>
      <tr>
        <td class="text-center"><?=$r['ID_P']?></td>
        <td class="text-center"><?=$r['DESIGNATION']?></td>
        <td class="text-center"><?=$r['PRIX']?></td>
        <td class="text-center"><?=$r['SUM_QUANTITE']?></td>
        <td class="text-center"><?=$r['MARQUE']?></td>
        <td class="text-center"><?=$r['LIBELLE_CAT']?></td>
        <td class="text-center">
          <div class="state d-flex justify-content-evenly align-items-center"><span class="round_dispo"
              style="background: white"></span><span>Disponible</span>
          </div>
        </td>
        <td class="text-center">
          <div>
            <i class='bx bxs-trash delete fs-4' id="delete/magasin/<?=$r['ID_P']?>/product"></i>
            <i class='bx bxs-edit edit fs-4' data-bs-whatever="<?=$r?>" data-bs-toggle="modal" data-bs-target="#modal-edit-magasin"></i>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>

<!-- Modal edition en magasin -->
<div class="modal fade" id="modal-edit-magasin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modification du stock de produit en magasin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="form-edit-magasin" class="form col">
          <div class="col-12 row mt-3">
            <div class="col-md-6 col-sm-12 mt-sm-3">
              <label for="magasin-edit-operation" class="form-label">Type d'operation</label>
              <select class="form-select" id="magasin-edit-operation" name="operation">
                <option value="ajout">Ajout</option>
                <option value="retrait">Retrait</option>
              </select>
            </div>
            <div class="col-md-6 col-sm-12 mt-sm-3">
              <label for="magasin-edit-quantite" class="form-label">Quantite</label>
              <input type="number" class="form-control" id="magasin-edit-quantite" name="quantite">
            </div>
          </div>
          <div class="col-12 mt-sm-3">
              <input type="number" class="form-control " hidden id="recipient-magasin"  name="id-produit">
            </div>
          <div class="btn-action mt-4 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- fin code formulaire d'ajout produit -->

<!-- Modal d'ajout en magasin -->
<div class="modal fade" id="modal-magasin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajout de produit en magasin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="form-magasin" class="form col">
          <div class="col-12 row mt-3">
            <div class="col-md-6 col-sm-12 mt-sm-3">
              <label for="magasin-add-designation" class="form-label">Designation</label>
              <select class="form-select" id="magasin-add-designation" name="designation" required>
                <option value="">----------</option>
                <?php foreach ($result_product as $r):?>
                <option value="<?=$r['ID_P']?>"><?=$r['DESIGNATION']?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-md-6 col-sm-12 mt-sm-3">
              <label for="magasin-add-quantite" class="form-label">Quantite</label>
              <input type="number" class="form-control" id="magasin-add-quantite" name="quantite" required>
            </div>
          </div>
          <div class="btn-action mt-4 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- fin code formulaire d'ajout produit -->
<?php } ?>