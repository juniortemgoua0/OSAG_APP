<?php
$result_team = Utils::getUsers($_SESSION['user']['ID_AG']);
//   echo "<pre>";
//   print_r($result_team);
//   echo "</pre>";

  
?>

    <section class="section-user">
        
        <div class="btn-add">
            <h2>Bienvenue sur la section settings</h2>
            <button class="btn btn-primary add" onclick="document.getElementById('form').style.display='block'">New User</button>
        </div>
        <div class="form-add" id="form">
            <button class="btn btn-dange" onclick="document.getElementById('form').style.display='none'">X</button>
            <form action="" class="form">
                <div class="input">
                    <input class="form-control" type="text" placeholder="Nom">
                    <input class="form-control" type="text" placeholder="Prenom">
                </div>
                <div class="input">
                    <input class="form-control" type="text" placeholder="Numero CNI">
                    <input class="form-control" type="text" placeholder="Telephone">
                </div>
                <div class="input">
                    <input class="form-control" type="text" placeholder="Email">
                    <input class="form-control" type="text" placeholder="Ville">
                </div>
                <div class="input">
                    <input class="form-control" type="text" placeholder="Fonction">
                    <div class="file-input">
                        <input
                          type="file"
                          name="file-input"
                         
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
                          <span>Upload file</span></label>
                      </div>
                      <input class="btn btn-primary" type="submit" value="Enregistrer">
                </div>
            </form>
        </div>
        <div class="table-user">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Numero CNI</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Ville</th>
                        <th>Date Save</th>
                        <th>Fonction</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="../assets/images/office-g58d369757_1920.jpg" alt=""></td>
                        <td>Midrele</td>
                        <td>Guevou</td>
                        <td>27536489</td>
                        <td>653769809</td>
                        <td>midrele@gmail.com</td>
                        <td>douala</td>
                        <td>2022/11/23 12h:50</td>
                        <td>Directeur</td>
                        <td>
                            <div>
                                <i class='bx bxs-trash delete fs-4' ></i>
                                <i class='bx bxs-edit edit fs-4'></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


