<body class="ASW74X">

    <div class="card AX8W13 top-100 star-t50 p-2 shadow">
        <div class="card-body">
<h1>Formulaire d'inscription</h1>

    <?php
    if(null !== ($this->uri->segment(2)) && $this->uri->segment(2) == "update")
    {
        $action = base_url()."/form_validation";
    }
    else
    {
        $action = "form_validation";
    }
     ?>

<form method="post" action="<?= $action ?>">
    <label for="login">Identifiant</label>
    <input type="text" class="form-control" id="login" name="login" 
                <?php 
                if(isset($user)) 
                { 
                    ?> 
                    value="<?= $user[0]->u_login ?>"
                    <?php 
                } 
                ?> placeholder="Identifiant de connexion" required><br>
    <span class="lien"><?= form_error("login") ?></span>
    <label for="password">Mot de passe</label>
    <input type="text" class="form-control" id="password" name="password" 
                <?php if(isset($user)){ ?> value="<?= $user[0]->u_password ?>" <?php } ?> placeholder="Chiffres et caractères spéciaux recommandés" required><br>
    <span class="lien"><?= form_error("password") ?></span>
    <label for="lastname">Nom</label>
    <input type="text" class="form-control" id="lastname" name="lastname" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_lastname ?>" <?php } ?> placeholder="Ex : Dupont" required><br>
    <span class="lien"><?= form_error("lastname") ?></span>
    <label for="firstname">Prénom</label>
    <input type="text" class="form-control" id="firstname" name="firstname" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_firstname ?>" <?php } ?> placeholder="Ex : Robert" required><br>
    <span class="lien"><?= form_error("firstname") ?></span>
    <label for="birthdate">Date de naissance</label>
    <input type="date" class="form-control" min="1920-01-01" max="2002-12-31" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_birthdate ?>" <?php } ?> id="birthdate" name="birthdate" required><br>
    <span class="lien"><?= form_error("birthdate") ?></span>
    <label for="yearlicence">Nombre d'années de permis</label>
    <input type="text" class="form-control" id="yearlicence" name="yearlicence" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_yearLicence ?>" <?php } ?> placeholder="Nombre d'années uniquement" required><br>
    <span class="lien"><?= form_error("yearlicence") ?></span>
    <label for="address">Adresse postale</label>
    <input type="text" class="form-control" id="address" name="address" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_address ?>" <?php } ?> placeholder="Ex : 15 Rue du moulin" required><br>    
    <span class="lien"><?= form_error("address") ?></span>
    <label for="zipcode">Code postal</label> 
    <input type="text" class="form-control" id="zipcode" name="zipcode" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_zipcode ?>" <?php } ?> placeholder="Ex : 76600" required><br>
    <span class="lien"><?= form_error("zipcode") ?></span>
    <label for="city">Ville</label>
    <input type="text" class="form-control" id="city" name="city" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_city ?>" <?php } ?> placeholder="Ex : Paris" required><br>
    <span class="lien"><?= form_error("city") ?></span>
    <label for="phone">Numéro de téléphone</label>
    <input type="text" class="form-control" id="phone" name="phone" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_phone ?>" <?php } ?> placeholder="+33 autorisé" required><br>
    <span class="lien"><?= form_error("phone") ?></span>
    <label for="mail">Adresse mail</label>
    <input type="email" class="form-control" id="mail" name="mail" 
                <?php if(isset($user)) { ?> value="<?= $user[0]->u_mail ?>" <?php } ?> placeholder="Ex : dupontrobert@gmail.com" required><br>
    <span class="lien"><?= form_error("mail") ?></span>
    <hr>
    <input type="submit" class="btn btn-outline-primary mr-2 AD38XL"  
                id="<?php if(isset($user)) { ?>update<?php } else{ ?>insert<?php } ?>"
                name="<?php if(isset($user)) { ?>update<?php } else{ ?>insert<?php } ?>" 
                value="<?php if(isset($user)) { ?>Modifier le profil<?php }else{ ?>Valider l'inscription<?php } ?>" >
</form>

        </div>

    </div>

</body>