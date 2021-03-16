<div class="container ">
    <div class="row">
        <div class="col-6 border-bottom">
            <h3 class="text-center">Informations sur la location</h3>
            <?php
            if(isset($cars))
            {
                foreach($cars as $car)
                {
                    ?>
                    <div class="row justify-content-center">
                        <div class="my-2" style="width: 50%;">
                            <?php 
                            if(isset($car->c_filename))
                            {
                                ?>
                                <img src="<?= base_url() ?>../assets/img/<?= $car->c_filename ?>" style="width:100%">
                                <?php
                            }
                            ?>
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
        <div class="col-6 border-start border-bottom">
                       
            <?php 
            if(isset($profiles))
            {
                foreach($profiles as $profile)
                {
                    ?>
                    <div class="row justify-content-center">
                    <h3 class="text-center">Profil du client</h3> 
                        <div class="my-2" style="width: 50%;">
                            <b>Nom</b> : <?= $profile->u_lastname ?><br>
                            <b>Prénom</b> : <?= $profile->u_firstname?><br>
                            <b>Années de permis</b> : <?= $profile->u_yearLicence ?><br>
                            <b>Adresse</b> : <?= $profile->u_address ?><br>
                            <b>Code Postal</b> : <?= $profile->u_zipcode ?><br>
                            <b>Ville</b> : <?= $profile->u_city ?><br>
                            <b>Numéro de téléphone</b> : <?= $profile->u_phone ?><br>
                        </div> 
                        <div class="clearfix my-3"></div>
                        <?php
                        if(null !=($payment))
                        {
                            ?>
                            <h3 class="text-center">Moyen de paiement</h3>
                            <div class="my-2" style="width:50%">
                                <b>Numéro de carte</b> : <?= $payment[0]->p_cardnumber ?><br>
                                <b>Date d'expiration</b> : <?= date("d-m-Y", strtotime($payment[0]->p_enddate)) ?><br>
                                <b>Cryptogramme</b> : <?= $payment[0]->p_cryptogram ?>
                            </div> 
                            <?php
                        }
                        ?>
                    </div>
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
    <div class="row text-center">
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
                if(null != $payment)
                {
                    ?>
                    <a href="confirm"><input type="button" class="btn btn-outline-primary mr-2 AFB001" id="confirmLocation" value="Confirmer"></a>
                    <?php
                }
                else
                {
                    $this->session->set_userdata("loc_url", base_url().$this->uri->segment(1));
                    ?>
                    <a href="payment"><input type="button" class="btn btn-outline-primary mr-2 AFB001" id="confirmLocation" value="Ajouter un mode de paiement"></a>
                    <?php
                }
                
            }
            ?>
            <a href="cancer_location"><input type="button" class="btn btn-outline-primary mr-2 AFB001" value="Annuler la location"></a>
        </div>
    </div>
</div>