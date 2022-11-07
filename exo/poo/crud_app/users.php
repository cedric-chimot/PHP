<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_POO_PDO</title>
    <!-- lien CDN pour les modals Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
      integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
      crossorigin="anonymous">
    </script>
</head>

<body>

    <!-- modal "ajouter un utilisateur" début -->
    <!-- création d'un modal boostrap qui apparait lorsqu'on clique sur le bouton ajouter -->
    <div class="modal fade" tabindex="-1" id="ajouterUserModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ajouter un utilisateur</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-ajout-user" class="p-2" novalidate>
                    <div class="mb-3">
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" class="form-control form-control-lg"
                                    name="prenom" placeholder="entrer le prénom"
                                    required>
                        <!-- 'invalid-feedback' renvoie un message d'erreur si l'input est vide -->
                                <div class="invalid-feedback">Veuillez entrer le prénom</div>
                            </div>
                            <div class="col mb-3">
                                <input type="text" class="form-control form-control-lg"
                                    name="nom" placeholder="entrer le nom"
                                    required>
                                <div class="invalid-feedback">Veuillez entrer le nom</div>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg"
                                    name="email" placeholder="entrer le mail"
                                    required>
                                <div class="invalid-feedback">Email invalide</div>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control form-control-lg"
                                    name="telephone" placeholder="entrer le téléphone"
                                    required>
                                <div class="invalid-feedback">Téléphone invalide</div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Ajouter un utilisateur" class="btn btn-primary
                                    btn-block btn-lg" id="ajout_user_btn">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>      
    
    <!-- modal "ajouter un utilisateur" fin -->

    <!-- modal "éditer un utilisateur" début -->
    <div class="modal fade" tabindex="-1" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modifier un utilisateur</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-form-user" class="p-2" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" class="form-control form-control-lg"
                                    name="prenom" id="prenom" placeholder="entrer le prénom"
                                    required>
                                <div class="invalid-feedback">Veuillez entrer le prénom</div>
                            </div>
                            <div class="col mb-3">
                                <input type="text" class="form-control form-control-lg"
                                    name="nom" id="nom" placeholder="entrer le nom"
                                    required>
                                <div class="invalid-feedback">Veuillez entrer le nom</div>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg"
                                    name="email" id="email" placeholder="entrer le mail"
                                    required>
                                <div class="invalid-feedback">Email invalide</div>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control form-control-lg"
                                    name="telephone" id="telephone" placeholder="entrer le téléphone"
                                    required>
                                <div class="invalid-feedback">Téléphone invalide</div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Modifier un utilisateur" class="btn btn-success
                                    btn-block btn-lg" id="edit_user_btn">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>      
    
    <!-- modal "éditer un utilisateur" fin -->

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="text-primary">
                    <h4>Tous les utilisateurs</h4>
                </div>
                <div>
                    <!-- le bouton est lié au modal avec l'id -->
                    <button class="btn btn-primary" type="button" data-toggle="modal"
                        data-target="#ajouterUserModal">Ajouter un utilisateur
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <!-- pour afficher le message de confirmation d'ajout ou d'erreur dans le HTML -->
                <div id="showAlert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>

</body>

</html>