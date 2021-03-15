<div id="location" style="width: 100%;">
                <h3 class="text-center">Location en attente</h3>
                <?php
                foreach ($this->session->locations as $location) {
                ?>
                    <div class="row justify-content-center my-5" id="location">
                        <div style="width: 50%">
                            <b>Location <?= $location->l_id ?></b><br>
                            <b>Client</b> : <?= $location->u_lastname . " " . $location->u_firstname ?><br>
                            <b>Véhicule</b> : <?= $location->c_model ?><br>
                            <b>Date de début</b> : <?= $location->l_startdate ?><br>
                            <b>Date de fin</b> : <?= $location->l_enddate ?><br>
                            <a href="admin_valid_loc<?= '/' . $location->l_id ?>">Valider</a>
                        </div>
                    </div>
                <?php
                }
                ?>
                <h3 class="text-center">Retour de véhicule en attente</h3>
                <?php
                foreach ($this->session->locationsReturn as $locationR) {
                ?>
                    <div class="row justify-content-center my-5" id="location">
                        <div style="width: 50%;">
                            <b>Location <?= $locationR->l_id ?></b><br>
                            <b>Client</b> : <?= $locationR->u_lastname . " " . $locationR->u_firstname ?><br>
                            <b>Véhicule</b> : <?= $locationR->c_model ?><br>
                            <b>Date de début</b> : <?= $locationR->l_startdate ?><br>
                            <b>Date de fin</b> : <?= $locationR->l_enddate ?><br>
                            <a href="admin_return_loc<?= '/' . $locationR->l_id ?>">Valider</a>
                        </div>
                    </div>
                <?php
                }
                ?>
                <h3 class="text-center">Liste des locations terminées</h3>
                <?php
                foreach ($this->session->all_locations as $location) {
                ?>
                    <div class="row justify-content-center my-5" id="location">
                        <div style="width: 50%">
                            <b>Location <?= $location->l_id ?></b><br>
                            <b>Client</b> : <?= $location->u_lastname . " " . $location->u_firstname ?><br>
                            <b>Véhicule</b> : <?= $location->c_model ?><br>
                            <b>Date de début</b> : <?= $location->l_startdate ?><br>
                            <b>Date de fin</b> : <?= $location->l_enddate ?><br>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>