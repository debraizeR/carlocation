<div id="profile" style="width: 100%;">
                <h3 class="text-center">Liste des clients</h3>
                <?php
                foreach ($this->session->all_profiles as $profile) {
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
                                    <a href="admin_delete_user<?= '/' . $profile->u_id ?>"><button type="button" class="btn btn-primary">Oui</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>