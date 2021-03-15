<div class="container border">
    <div class="row">
        <div class="col-6 border">
            <div class="row justify-content-center my-5">
                <?php
                foreach ($profiles as $profile) {
                ?>
                    <h3 class="text-center">Profil</h3>
                    <div class="my-2" style="width: 50%;">
                        <b>Nom</b> : <?= $profile->u_lastname ?><br>
                        <b>Prénom</b> : <?= $profile->u_firstname ?><br>
                        <b>Date de naissance</b> : <?= $profile->u_birthdate ?><br>
                        <b>Années de permis</b> : <?= $profile->u_yearLicence ?><br>
                        <b>Adresse</b> : <?= $profile->u_address ?><br>
                        <b>Code Postal</b> : <?= $profile->u_zipcode ?><br>
                        <b>Ville</b> : <?= $profile->u_city ?><br>
                        <b>Numéro de téléphone</b> : <?= $profile->u_phone ?><br>
                        <b>Adresse mail</b> : <?= $profile->u_mail ?><br>
                        <a type="button" href="form/update" class="lien btn btn-light">Modifier</a> 
                    </div>
                    <div class="clearfix my-3"></div>
                    <h3 class="text-center">Moyens de paiement</h3>
                    <div class="my-2" style="width: 50%;">
                        <?php 
                        if($payment == null)
                        { 
                            ?>

                            <a href="payment"><input type="button" class="lien btn btn-light" value="Ajouter un moyen de paiement"></a>

                            <?php
                        }
                        else
                        {
                            ?>
                            <b>Numéro de carte</b> : <?= $payment[0]->p_cardnumber ?><br>
                            <b>Date d'expiration</b> : <?= $payment[0]->p_enddate ?><br>
                            <b>Cryptogramme</b> : <?= $payment[0]->p_cryptogram ?>
                            <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-6 border">
            <h3 class="text-center">Location en cours</h3>
            <?php
            foreach($current_loc as $loc)
            {
                ?>
                <div class="row justify-content-center my-5">
                    <div style="width: 50%">
                        <b>Location <?= $loc->l_id ?></b><br>
                        <b>Véhicule</b> : <?= $loc->c_model ?><br> 
                        <b>Date de début</b> : <?= $loc->l_startdate ?><br>
                        <b>Date de fin</b> : <?= $loc->l_enddate ?><br>                                    
                    </div>
                </div>
                <?php
            }
            ?>

            <h3 class="text-center">Prochaines locations</h3>
            <?php  
            foreach($next_loc as $loc)
            {
                ?>
                <div class="row justify-content-center my-5">
                    <div style="width: 50%">
                        <b>Location <?= $loc->l_id ?></b><br>
                        <b>Véhicule</b> : <?= $loc->c_model ?><br> 
                        <b>Date de début</b> : <?= $loc->l_startdate ?><br>
                        <b>Date de fin</b> : <?= $loc->l_enddate ?><br>
                        <button type="button" class="lien btn btn-light" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $loc->l_id ?>">Annuler</button>                         
                    </div>
                </div>

                <div class="modal fade" id="deleteModal<?= $loc->l_id ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                            <a href="deleteLocation<?= "/".$loc->l_id ?>"><button type="button" class="btn btn-primary">Oui</button></a>
                        </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <h3 class="text-center">Location passées</h3>
            <?php
            foreach($past_loc as $loc)
            {
                ?>
                <div class="row justify-content-center my-5">
                    <div style="width: 50%">
                        <b>Location <?= $loc->l_id ?></b><br>
                        <b>Véhicule</b> : <?= $loc->c_model ?><br> 
                        <b>Date de début</b> : <?= $loc->l_startdate ?><br>
                        <b>Date de fin</b> : <?= $loc->l_enddate ?><br>                                    
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>
