<?php 

foreach($gearbox as $gear)
{
    var_dump($gear->c_gearbox);
} 
foreach($fuel as $f)
{
    var_dump($f->c_fuel);
}
foreach($manufacter as $manu)
{
    var_dump($manu->m_name);
}

if(isset($cars))
{
    var_dump($cars[0]);
    $this->session->set_userdata("c_id", $cars[0]->c_id);
}
else
{
    echo "non";
}

var_dump($_SESSION);
?>

<?php echo validation_errors(); ?>
<h1>Création et modification d'un véhicule</h1>

<form method="post" action="<?= base_url()?>form_valid_car">
<label for="model">Modèle</label>
<input type="text" class="form-control" id="model" name="model" placeholder="Ex : Twingo"
 value="<?php if(isset($cars)){ echo $cars[0]->c_model; } ?>" 
 required>
<label for="numberplate">Plaque d'immatriculation</label>
<input type="text" class="form-control" id="numberplate" name="numberplate" placeholder="AA-111-AA"
 value="<?php if(isset($cars)){ echo $cars[0]->c_numberPlate; } ?>"
 required>
<label for="gearbox">Boite de vitesse</label>
<select class="form-control" name="gearbox" id="gearbox" required>
    <option value="" selected="<?php if(isset($cars)){ ?>false<?php }else{ ?>true<?php } ?>" disabled>Choisissez une boite de vitesse</option>
    <?php 
    foreach($gearbox as $gear)
    {
        ?>
        <option value="<?= $gear->c_gearbox ?>" <?php if(isset($cars) && $cars[0]->c_gearbox == $gear->c_gearbox){ ?>selected="true"<?php } ?> ><?= $gear->c_gearbox ?></option>
        <?php
    }
    ?>
</select>
<label for="kilometer">Kilomètres</label>
<input type="text" class="form-control" id="kilometer" name="kilometer" placeholder="15000"
 value="<?php if(isset($cars)) { echo $cars[0]->c_kilometer; } ?>"
 required>
<label for="color">Couleur</label>
<input type="text" class="form-control" id="color" name="color" placeholder="Bleu" 
 value="<?php if(isset($cars)){ echo $cars[0]->c_color; } ?>"
 required>
<label for="fuel">Carburant</label>
<select class="form-control" name="fuel" id="fuel" required>
    <option value="" selected="<?php if(isset($cars)){ ?>false<?php }else{ ?>true<?php } ?>" disabled>Choisissez un type de carburant</option>
    <?php
        foreach($fuel as $f)
        {
            ?>
            <option value="<?= $f->c_fuel ?>" <?php if(isset($cars) && $f->c_fuel == $cars[0]->c_fuel){ ?>selected="true"<?php } ?> ><?= $f->c_fuel ?></option>
            <?php
        }
    ?>
</select>
<label for="year">Année</label>
<input type="text" class="form-control" id="year" name="year" placeholder="2015" 
 value="<?php if(isset($cars)){ echo $cars[0]->c_year; } ?>"
 required>
<label for="cost">Prix de la location</label>
<input type="text" class="form-control" id="cost" name="cost" placeholder="25" 
 value="<?php if(isset($cars)){ echo $cars[0]->c_cost; } ?>"
 required>
<!-- select constructeur -->
<label for="manufacter">Constructeur</label>
<select class="form-control" name="manufacter" id="manufacter" required>
    <option value="" selected="true" disabled>Choisissez un constructeur</option>
    <?php
    foreach($manufacter as $manu)
    {
        ?>
        <option value="<?= $manu->m_name ?>" <?php if(isset($cars) && $cars[0]->m_id == $manu->m_id){ ?>selected="true"<?php } ?> ><?= $manu->m_name ?></option>
        <?php
    }
    ?>
</select>

<input type="submit" class="lien btn btn-light" 
 id="<?php if(isset($cars)){ ?>update<?php }else{ ?>insert<?php } ?>"
 name="<?php if(isset($cars)){ ?>update<?php }else{ ?>insert<?php } ?>"
 value="<?php if(isset($cars)){ ?>Modifier le véhicule<?php }else{ ?>Ajouter le véhicule<?php } ?>"
>
</form>