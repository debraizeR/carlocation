<div class="container border">
    <div class="row">
        <div class="col-4 border">
            <div class="row justify-content-center my-5">
                Admin
            </div>
        </div>
        <div class="col-8 border">
            <h3 class="text-center">Location en attente</h3>
            <?php
            foreach ($locations as $location) {
            ?>
                <div class="row justify-content-center my-5">
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
                <div class="row justify-content-center my-5">
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
                <div class="row justify-content-center my-5">
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
            <h3 class="text-center">Liste des voitures du parc</h3>
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
                        <a href="admin_delete_car<?= '/'.$car->c_id ?>">Supprimer</a>
                    </div>
                </div>
                <?php
            }
            ?>
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
                        <a href="admin_delete_user<?= '/'.$profile->u_id ?>">Supprimer</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>