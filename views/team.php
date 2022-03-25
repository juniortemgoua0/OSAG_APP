  <?php
$result_team = Utils::getUsers($_SESSION['user']['ID_AG']);
//   echo "<pre>";
//   print_r($result_team);
//   echo "</pre>";

  
  ?>

  <!-- code formulaire d'ajout a mettre dans un fichier externe -->
  <!-- <div class="container-form" id="modal2">
      <li onclick="document.getElementById('modal2').style.display='none'" class="w3-button w3-display-topright">x</li>
      <div class="content">
          <form action="" id="form-user" class="form">
              <h1>Nouveau utilisateur</h1>
              <input type="text" class="form-control" placeholder="Nom" require><br>
              <input type="text" class="form-control" placeholder="Prenom" require><br>
              <input type="text" class="form-control" placeholder="Email" require><br>
              <input type="text" class="form-control" placeholder="Password" require><br>
              <select class="form-select mt-3"> </br>
                  <option value="" desabled="true">Fonction</option>
                  <?php foreach($result_fonction as $r): 
                    echo '<option value="'.$r["ID_FONCTION"].'">'.$r['FONCTION'].'</option>';
                    endforeach?>
              </select>
              <select class="form-select mt-3">
                  <option value="">Agence</option>
                  <?php foreach($result_agence as $r): 
                    echo '<option value="'.$r["ID_AG"].'">'.$r['NOM_AG'].'</option>';
                    endforeach?>
              </select>
              <br>
              <div class="file-input">
                  <input type="file" name="file-input" id="file-input" class="file-input__input" />
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
              <div class="btn-action">
                  <input class="btn btn-primary" type="submit" value="Enregistrer"><br>
              </div>
          </form>
      </div>
  </div> -->

  <div class="modal fade" id="modal-utilisateur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Nouveau utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form-utilisateur" class="form col">
            <div class="col-12 row mt-3">
              <div class="col-md-6 col-sm-12 mt-sm-3">
                <label for="prenom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="" require>
              </div>
              <div class="col-md-6 col-sm-12 mt-sm-3">
                <label for="ajout_utilisateur_prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="ajout_utilisateur_prenom" placeholder="">
              </div>
            </div>

            <div class="col-12 mt-3">
              <label for="ajout_utilisateur_email" class="form-label">Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email" id="ajout_utilisateur_email"
                require>
            </div>

            <div class="col-12 mt-3">
              <label for="ajout_utilisateur_password" class="form-label">Mot de passe</label>
              <input type="text" class="form-control" name="password" id="ajout_utilisateur_password" require>
            </div>

            <div class="col-12 row mt-3">
              <div class="col-md-6 col-sm-12 mt-sm-3">
                <label for="ajout_utilisateur_cni" class="form-label">Numero CNI</label>
                <input type="text" class="form-control" id="ajout_utilisateur_cni" name="cni" placeholder="" require>
              </div>
              <div class="col-md-6 col-sm-12 mt-sm-3">
                <label for="ajout_utilisateur_telephone" class="form-label">Telephone</label>
                <input type="text" class="form-control" id="ajout_utilisateur_telephone" name="telephone"
                  placeholder="">
              </div>
            </div>

            <div class="col-12 row mt-3">
              <div class="col-md-6 col-sm-12 mt-sm-3">
                <label for="ajout_utilisateur_fonction" class="form-label">Fonction</label>
                <select class="form-select" id="ajout_utilisateur_fonction" name="fonction"></br>
                  <option>---------</option>
                  <?php foreach($result_fonction as $r): ?>
                  <option value="<?=$r["ID_FONCTION"]?>"><?=$r['FONCTION']?></option>;
                  <?php endforeach?>
                </select>
              </div>
              <div class="col-md-6 col-sm-12 mt-sm-3">
                <label for="ajout_utilisateur_ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ajout_utilisateur_ville" name="ville" placeholder="">
              </div>
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
      <h1 class="text-black-50 header-title col-sm-12 col-md-6">Liste des utilisateus</h1>
      <div class="col-sm-12 col-md-6 mt-sm-3 d-flex justify-content-md-end align-items-center">
        <a href="#"><button class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#modal-utilisateur"> <i
              class="bi bi-plus-lg fs-5"></i> Nouveau
            utilisateur</button></a>
      </div>
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
            <i class='bx bxs-spreadsheet'></i>Nom
          </th>
          <th>
            <i class='bx bxs-spreadsheet'></i>Prenom
          </th>
          <th>
            <i class='bx bxs-spreadsheet'></i>Email
          </th>
          <th>
            <i class='bx bx-calendar-check'></i>Fonction
          </th>
          <th>
            <i class='bx bxs-home'></i> Date ajout
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result_team as $r): ?>
        <tr>
          <td><?=$r['ID_UTIL']?></td>
          <td><?=$r['NOM']?></td>
          <td><?=$r['PRENOM']?></td>
          <td><?=$r['EMAIL']?></td>
          <td><?=$r['FONCTION']?></td>
          <td><?=$r['DATE_SAVE']?></td>
          <td>
            <div>
              <i class='bx bxs-trash delete fs-4' id="delete/utilisateur/<?=$r['ID_UTIL']?>/team"></i>
              <i class='bx bxs-edit edit fs-4' id="edit/utilisateur/<?=$r['ID_UTIL']?>/team"></i>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>