<div class="container border">
    <div class="row">
        <div class="col-2 border">
            <div class="row justify-content-center my-5">
                <input type="button" class="lien btn btn-light my-3" value="location" onclick="hide_location()">
                <input type="button" class="lien btn btn-light my-3" value="car" onclick="hide_car()">
                <input type="button" class="lien btn btn-light my-3" value="profile" onclick="hide_profile()">
            </div>
        </div>
        <div class="col-10 border" style="min-height: 100vh; max-height:100vh; ">
        <div id="location" style="width: 100%;">
            <h3 class="text-center">Location en attente</h3>
            <?php
            foreach ($locations as $location) {
            ?>
                <div class="row justify-content-center my-5" id="location">
                    <div style="width: 50%">
                        <b>Location <?= $location->l_id ?></b><br>
                        <b>Client</b> : <?= $location->u_lastname." ".$location->u_firstname ?><br>
                        <b>Véhicule</b> : <?= $location->c_model ?><br> 
                        <b>Date de début</b> : <?= $location->l_startdate ?><br>
                        <b>Date de fin</b> : <?= $location->l_enddate ?><br>
                        <a href="admin_valid_loc<?= '/'.$location->l_id ?>">Valider</a>
                    </div>
                </div>
            <?php
            }
            ?>
            <h3 class="text-center">Retour de véhicule en attente</h3>
            <?php
            foreach($locationsReturn as $locationR)
            {
                ?>
                <div class="row justify-content-center my-5" id="location">
                    <div style="width: 50%;">
                        <b>Location <?= $locationR->l_id ?></b><br>
                        <b>Client</b> : <?= $locationR->u_lastname." ".$locationR->u_firstname ?><br>
                        <b>Véhicule</b> : <?= $locationR->c_model ?><br> 
                        <b>Date de début</b> : <?= $locationR->l_startdate ?><br>
                        <b>Date de fin</b> : <?= $locationR->l_enddate ?><br>
                        <a href="admin_return_loc<?= '/'.$locationR->l_id ?>">Valider</a>
                    </div>
                </div>
                <?php
            }
            ?>
            <h3 class="text-center">Liste des locations terminées</h3>
            <?php
            foreach($all_locations as $location)
            {
                ?>
                <div class="row justify-content-center my-5" id="location">
                    <div style="width: 50%">
                        <b>Location <?= $location->l_id ?></b><br>
                        <b>Client</b> : <?= $location->u_lastname." ".$location->u_firstname ?><br>
                        <b>Véhicule</b> : <?= $location->c_model ?><br> 
                        <b>Date de début</b> : <?= $location->l_startdate ?><br>
                        <b>Date de fin</b> : <?= $location->l_enddate ?><br>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div id="car" style="width: 100%;">
            <h3 class="text-center">Liste des voitures du parc</h3>
            <div class="text-center">
            <a href="formcar/add"><input type="button" class="lien btn btn-light " id="addCar" name="addCar" value="Ajouter"></a>
            </div>
            <?php 
            foreach($cars as $car)
            {
                ?>
                <div class="row justify-content-center my-5">
                    <div style="width:50%">
                        <b>Voiture <?= $car->c_id ?></b><br>
                        <b>Modèle</b> : <?= $car->c_model ?><br>
                        <b>Immatriculation</b> : <?= $car->c_numberPlate ?><br>
                        <b>Boite de vitesse</b> : <?= $car->c_gearbox ?><br>
                        <b>Kilomètres</b> : <?= $car->c_kilometer ?><br>
                        <b>Couleur</b> : <?= $car->c_color ?><br>
                        <b>Carburant</b> : <?= $car->c_fuel ?><br>
                        <b>Année</b> : <?= $car->c_year ?><br>
                        <b>Prix à la semaine</b> : <?= $car->c_cost ?><br>
                        <a href="formcar/<?= $car->c_id ?>"><input type="button" class="lien btn btn-light" value="Modifier"></a>
                        <button type="button" class="lien btn btn-light" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $car->c_id ?>">Supprimer</button>
                    </div>
                </div>

                <div class="modal fade" id="deleteModal<?= $car->c_id ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <p>Voulez vous vraiment annuler cette location ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                            <a href="admin_delete_car<?= '/'.$car->c_id ?>"><button type="button" class="btn btn-primary">Oui</button></a>
                        </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
        <div id="profile" style="width: 100%;">
            <h3 class="text-center">Liste des clients</h3>
            <?php 
            foreach($all_profiles as $profile)
            {
                ?>
                <div class="row justify-content-center my-5">
                    <div style="width:50%">
                        <b>Identifiant </b> : <?= $profile->u_login ?><br>
                        <b>Mot de passe </b> : <?= $profile->u_password ?><br>
                        <b>Nom </b> : <?= $profile->u_lastname ?><br>
                        <b>Prénom </b> : <?= $profile->u_firstname ?><br>
                        <b>Date de naissance </b> : <?= $profile->u_birthdate ?><br>
                        <b>Années de permis </b> : <?= $profile->u_yearLicence ?><br>
                        <b>Adresse </b> : <?= $profile->u_address ?><br>
                        <b>Code postal </b> : <?= $profile->u_zipcode ?><br>
                        <b>Ville </b> : <?= $profile->u_city ?><br>
                        <b>Numéro de téléphone </b> : <?= $profile->u_phone ?><br>
                        <b>Adresse mail </b> : <?= $profile->u_mail ?><br>
                        <button type="button" class="lien btn btn-light" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $profile->u_id ?>">Supprimer</button>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal<?= $profile->u_id ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <p>Voulez vous vraiment annuler cette location ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                            <a href="admin_delete_user<?= '/'.$profile->u_id ?>"><button type="button" class="btn btn-primary">Oui</button></a>
                        </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        </div>
    </div>
</div>

<script>

function hide_location()
{
    if(document.getElementById("location").style.display == "none")
    {
        document.getElementById("location").style.display = "block"
    }
    else
    {
        document.getElementById("location").style.display = "none";
    }
    
}

function hide_car()
{
    if(document.getElementById("car").style.display == "none")
    {
        document.getElementById("car").style.display = "block";
    }
    else
    {
        document.getElementById("car").style.display = "none";
    }
}

function hide_profile()
{
    if(document.getElementById("profile").style.display == "none")
    {
        document.getElementById("profile").style.display = "block";
    }
    else
    {
        document.getElementById("profile").style.display = "none";
    }
}

</script>