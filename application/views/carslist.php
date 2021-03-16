<div class="container">
    <?php
    $today = date("Y-m-d");

    ?>

    <div class="row">
        
            <form method="post" action="form_valid_index">
            <div class="Formflex mt-3">
                <div class="text-center">
                    <label for="startDate" >Début de location</label>
                    <input type="date" class="AX8W13 ms-1 me-3" id="startDate" name="startDate" min="<?= $today ?>" <?php if (isset($this->session->startdate)) { ?> value="<?= $this->session->startdate ?>" <?php } ?> required>
                </div>
                <div class="text-center">
                    <label for="endDate">Fin de location</label>
                    <input type="date" class="AX8W13 ms-1 me-3" id="endDate" name="endDate" min="<?= $today ?>" <?php if (isset($this->session->enddate)) { ?> value="<?= $this->session->enddate ?>" <?php } ?> required>
                </div>
                
                </div>
                <div class="text-center my-3">
                    <input type="submit" class="btn btn-outline-primary mr-2 AFB001" id="confirmDate" name="confirmDate">
                </div>
            </form>
        
    </div>
<div class="text-center">
    <?php
    if (
        isset($this->session->startdate) && isset($this->session->enddate) && isset($this->session->car_id)
        && isset($this->session->login) && isset($this->session->password)
    ) {
    ?>
        <a href="location"><input type="button" class="btn btn-outline-primary mr-2 AFB001" id="currentLoc" name="currentLoc" value="Location en cours de réservation"></a>
    <?php
    } ?>
</div>
    <div class="row table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Modèle</th>
                    <th>Plaque d'immatriculation</th>
                    <th>Boîte de vitesse</th>
                    <th>Kilomètres</th>
                    <th>Couleur</th>
                    <th>Carburant</th>
                    <th>Année</th>
                    <th>Prix de location</th>

                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($cars as $car) {
                ?>

                    <tr>
                        <td><?= $car->c_model ?></td>
                        <td><?= $car->c_numberPlate ?></td>
                        <td><?= $car->c_gearbox ?></td>
                        <td><?= $car->c_kilometer ?></td>
                        <td><?= $car->c_color ?></td>
                        <td><?= $car->c_fuel ?></td>
                        <td><?= $car->c_year ?></td>
                        <td><?= $car->c_cost ?></td>
                        <td><a href="carLoc/<?= $car->c_id ?>"><input type="button" class="btn btn-light" id="carLoc" name="carLoc" value="Louer"></a></td>
                    </tr>

                <?php
                }

                ?>
            </tbody>
        </table>
    </div>
</div>