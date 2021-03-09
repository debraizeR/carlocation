<div class="container">
<div class="row">
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

            foreach($cars as $car)
            {
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
                    <td><input type="button" href="form_valid_car" class="btn btn-light" id="carLoc" name="carLoc" value="Louer">
                </tr>

                <?php
            }
            
            ?>
        </tbody>
    </table>
</div>
</div>
    <a href="form">redirection</a>
