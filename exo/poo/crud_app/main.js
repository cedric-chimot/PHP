const ajoutForm = document.getElementById("form-ajout-user");
const updateForm = document.getElementById("edit-form-user");
const showAlert = document.getElementById("showAlert");
//on crée une constante pour afficher un modal lié au modal d'ajout par l'ID
const ajoutModal = new bootstrap.Modal(document.getElementById("ajouterUserModal"));
const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
const tbody = document.querySelector('tbody');

//requête ajout nouvel utilisateur
//'async' : réalise une requête HTTP (Ajax) asynchrone 
ajoutForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(ajoutForm);
    //'append' : ajoute une valeur à la fin d'un tableau
    formData.append("add", 1);

    //'checkValidity' : vérifie si l'éléments possède certaine contraintes et si elles sont satisfaites
    //sinon une erreur est signalée et la valeur renvoyée est 'false'
    if (ajoutForm.checkValidity() === false) {
        e.preventDefault();
        //stop la propagation d’un évènement après qu’un gestionnaire d’évènement
        //(gérant l’évènement en question) ait été atteint
        e.stopPropagation();
        //'was-validated' : revoie le message d'erreur si les champs sont vides
        ajoutForm.classList.add("was-validated");
        return false;
    } else {
        document.getElementById('ajout_user_btn').value = 'Patientez SVP...';

        const data = await fetch('action.php', {
            method: "POST",
            body: formData,
        });
        const response = await data.text();

        showAlert.innerHTML = response;
        document.getElementById('ajout_user_btn').value = 'Ajouter un utilisateur';
        ajoutForm.reset();
        //on reset les données du formulaires
        ajoutForm.classList.remove('was-validated');
        //le modal se ferme après l'ajout
        ajoutModal.hide();
        //'fetchAllUsers' pour mettre à jour la BDD à l'insertion
        fetchAllUsers();
    }
});

//fetch de tous les utilisateurs
const fetchAllUsers = async () => {
    const data = await fetch('action.php?read=1', {
        method: 'GET'
    });
    const response = await data.text();
    tbody.innerHTML = response;
};
//'fetchAllUsers' pour afficher les données dans le HTML
fetchAllUsers();

//requête pour modifier un utilisateur (Ajax)
tbody.addEventListener('click', (e) => {
    if(e.target && e.target.matches('a-editLink')){
        e.preventDefault();
        let id = e.target.getAttibute('id');
        editUSer(id);
    }
});

const editUSer = async (id) => {
    const data = await fetch(`action.php?edit=1&id=${id}`, {
        method: 'GET',
    });
    const response = await data.json();
    document.getElementById("id").value = response.id;
    document.getElementById("prenom").value = response.prenom;
    document.getElementById("nom").value = response.nom;
    document.getElementById("email").value = response.email;
    document.getElementById("telephone").value = response.telephone;
};

// requête d'update d'un utilisateur
updateForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(updateForm);
    //'append' : ajoute une valeur à la fin d'un tableau
    formData.append("update", 1);

    //'checkValidity' : vérifie si l'éléments possède certaine contraintes et si elles sont satisfaites
    //sinon une erreur est signalée et la valeur renvoyée est 'false'
    if (updateForm.checkValidity() === false) {
        e.preventDefault();
        //stop la propagation d’un évènement après qu’un gestionnaire d’évènement
        //(gérant l’évènement en question) ait été atteint
        e.stopPropagation();
        //'was-validated' : revoie le message d'erreur si les champs sont vides
        updateForm.classList.add("was-validated");
        return false;
    } else {
        document.getElementById('edit_user_btn').value = 'Patientez SVP...';

        const data = await fetch('action.php', {
            method: "POST",
            body: formData,
        });
        const response = await data.text();

        showAlert.innerHTML = response;
        document.getElementById('edit_user_btn').value = 'Modifier un utilisateur';
        updateForm.reset();
        //on reset les données du formulaires
        updateForm.classList.remove('was-validated');
        //le modal se ferme après l'ajout
        editModal.hide();
        //'fetchAllUsers' pour mettre à jour la BDD à l'insertion
        fetchAllUsers();
    }
});
