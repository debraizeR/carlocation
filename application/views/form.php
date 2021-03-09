
    <h1>Formulaire d'inscription</h1>

    <?php echo validation_errors(); ?>

<form method="post" action="form_validation">
    <label for="login">Identifiant</label>
    <input type="text" class="form-control" id="login" name="login" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_login ?>"<?php } ?> placeholder="Identifiant de connexion" required><br>
    <label for="password">Mot de passe</label>
    <input type="text" class="form-control" id="password" name="password" 
                <?php if(isset($user)){ ?> value="<?= $user[0]->u_password ?>" <?php } ?> placeholder="Chiffres et caractères spéciaux recommandés" required><br>
    <label for="lastname">Nom</label>
    <input type="text" class="form-control" id="lastname" name="lastname" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_lastname ?>" <?php } ?> placeholder="Ex : Dupont" required><br>
    <label for="firstname">Prénom</label>
    <input type="text" class="form-control" id="firstname" name="firstname" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_firstname ?>" <?php } ?> placeholder="Ex : Robert" required><br>
    <label for="birthdate">Date de naissance</label>
    <input type="date" class="form-control" min="1920-01-01" max="2002-12-31" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_birthdate ?>" <?php } ?> id="birthdate" name="birthdate" required><br>
    <label for="yearlicence">Nombre d'années de permis</label>
    <input type="number" class="form-control" id="yearlicence" name="yearlicence" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_yearLicence ?>" <?php } ?> placeholder="Nombre d'années uniquement" required><br>
    <label for="address">Adresse postale</label>
    <input type="text" class="form-control" id="address" name="address" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_address ?>" <?php } ?> placeholder="Ex : 15 Rue du moulin" required><br>    
    <label for="zipcode">Code postal</label> 
    <input type="number" class="form-control" id="zipcode" name="zipcode" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_zipcode ?>" <?php } ?> placeholder="Ex : 76600" required><br>
    <label for="city">Ville</label>
    <input type="text" class="form-control" id="city" name="city" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_city ?>" <?php } ?> placeholder="Ex : Paris" required><br>
    <label for="phone">Numéro de téléphone</label>
    <input type="number" class="form-control" id="phone" name="phone" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_phone ?>" <?php } ?> placeholder="+33 autorisé" required><br>
    <label for="mail">Adresse mail</label>
    <input type="email" class="form-control" id="mail" name="mail" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_mail ?>" <?php } ?> placeholder="Ex : dupontrobert@gmail.com" required><br>
    <input type="submit" class="btn btn-light" 
                <?php if(isset($user)) { ?>id="update" name="update" value="Modifier le profil" <?php }
                else{ ?> id="insert" name="insert" value="Valider l'inscription" <?php } ?>>
</form>