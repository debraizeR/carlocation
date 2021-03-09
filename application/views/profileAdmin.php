<div class="container border">
    <div class="row">
        <div class="col-4 border">
            <div class="row justify-content-center my-5">
                <?php
                foreach ($profiles as $profile) {
                ?>
                    <div style="width: 50%;">
                        <b>Nom</b> : <?= $profile->u_lastname ?><br>
                        <b>Prénom</b> : <?= $profile->u_firstname ?><br>
                        <b>Date de naissance</b> : <?= $profile->u_birthdate ?><br>
                        <b>Années de permis</b> : <?= $profile->u_yearLicence ?><br>
                        <b>Adresse</b> : <?= $profile->u_address ?><br>
                        <b>Code Postal</b> : <?= $profile->u_zipcode ?><br>
                        <b>Ville</b> : <?= $profile->u_city ?><br>
                        <b>Numéro de téléphone</b> : <?= $profile->u_phone ?><br>
                        <b>Adresse mail</b> : <?= $profile->u_mail ?><br>
                        <a type="button" href="form/update<?= "/".$profile->u_id ?>" class="btn btn-light">Modifier</a>
                    </div>
                <?php
                }
                ?>
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
                        <a href="">Valider</a>
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
                        <a href="">Valider</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>