<div class="container border">
    

    <div class="row">
        <div class="col-6 border">
            <h3>Informations sur la location</h3>
            <?php
            if(isset($cars))
            {
                foreach($cars as $car)
                {
                    ?>
                    <div class="row">
                        <div>
                            <b>Modèle</b> : <?= $car->c_model ?><br>
                            <b>immatriculation</b> : <?= $car->c_numberPlate ?><br>
                            <b>Boite de vitesse</b> : <?= $car->c_gearbox ?><br>
                            <b>Kilomètres</b> : <?= $car->c_kilometer ?><br>
                            <b>Couleur</b> : <?= $car->c_color ?><br>
                            <b>Carburant</b> : <?= $car->c_fuel ?><br>
                            <b>Année</b> : <?= $car->c_year ?><br>     
                        </div>
                    </div>
    
                    <?php
                }
            }
            ?>
        </div>
        <div class="col-6 border">
            <h3>Profil du client</h3>
            <div>
            <?php 
            if(isset($profiles))
            {
                foreach($profiles as $profile)
                {
                    ?>

                    <b>Nom</b> : <?= $profile->u_lastname ?><br>
                    <b>Prénom</b> : <?= $profile->u_firstname?><br>
                    <b>Années de permis</b> : <?= $profile->u_yearLicence ?><br>
                    <b>Adresse</b> : <?= $profile->u_address ?><br>
                    <b>Code Postal</b> : <?= $profile->u_zipcode ?><br>
                    <b>Ville</b> : <?= $profile->u_city ?><br>
                    <b>Numéro de téléphone</b> : <?= $profile->u_phone ?><br>

                    <?php
                }
            }
            else
            {
                ?> 
                Non connecté.<br>
                
                <?php
            }
            ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div>
            <b>Début de la location</b> : <?= $this->session->startdate ?><br>
            <b>Fin de la location</b> : <?= $this->session->enddate ?><br>
            <?php 
            if(!isset($profiles))
            {
                $this->session->set_userdata("loc_url", base_url().$this->uri->segment(1));
                ?>
            <a href="login"><input type="button" class="lien btn btn-light" value="Se connecter"></a>
            <?php
            }
            else
            {
                ?>
            <a href="confirm"><input type="button" class="lien btn btn-light"id="confirmLocation" value="Confirmer"></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>