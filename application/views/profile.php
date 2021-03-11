<?php var_dump($_SESSION); ?>

<div class="container border">
    <div class="row">
        <div class="col-6 border">
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
                        <a type="button" href="form/update" class="btn btn-light">Modifier</a> 
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-6 border">
            <h3 class="text-center">Historique des locations</h3>
            <?php
            foreach ($locations as $location) {
            ?>
                <div class="row justify-content-center my-5">
                    <div style="width: 50%">
                        <b>Location <?= $location->l_id ?></b><br>
                        <b>Véhicule</b> : <?= $location->c_model ?><br> 
                        <b>Date de début</b> : <?= $location->l_startdate ?><br>
                        <b>Date de fin</b> : <?= $location->l_enddate ?><br>
                        <?php
                        $today = date("Y-m-d");
                        if($location->l_isValid == 0 || ($location->l_isValid == 1 && $location->l_isReturn == 0 && $location->l_startdate > $today))
                        {
                            ?>
                            <a href="deleteLocation<?= "/".$location->l_id ?>">Annuler</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php $this->load->view("index"); ?>