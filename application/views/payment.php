<?php
$today = date("Y-m-d");

?>

<h1>Ajouter un moyen de paiement</h1>

<form method="post" action="form_valid_payment">
<label for="cardnumber">Numéro de carte</label>
<span class="lien"><?= form_error("cardnumber") ?></span>
<input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Code à 16 chiffres" required><br>
<label for="enddate">Date d'expiration</label>
<input type="date" class="form-control" id="enddate" name="enddate" min="<?= $today ?>" max=2030-12-31 required><br>
<label for="cryptogram">Cryptogramme</label>
<input type="text" class="form-control" id="cryptogram" name="cryptogram" placeholder="Code à 3 chiffres" required><br>
<span class="lien"><?= form_error("cryptogram") ?></span>
<input type="submit" class="btn btn-light" id="insert" name="insert" value="Valider">
</form>