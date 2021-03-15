<div id="car" style="width: 100%;">
                <h3 class="text-center">Liste des voitures du parc</h3>
                <div class="text-center">
                    <a href="formcar/add"><input type="button" class="lien btn btn-light " id="addCar" name="addCar" value="Ajouter"></a>
                </div>
                <?php
                foreach ($this->session->cars as $car) {
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
                                    <a href="admin_delete_car<?= '/' . $car->c_id ?>"><button type="button" class="btn btn-primary">Oui</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>