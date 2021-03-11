<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarLocation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="<?= base_url() ?>../assets/css/style.css" rel="stylesheet">
</head>
<body>
<div>
<a href="<?= base_url() ?>"><input type="button" class="lien btn btn-light" value="Accueil"></a>
<a href="<?= base_url() ?>carslist"><input type="button" class="lien btn btn-light" value="Louer une voiture"></a>

<?php

if(!isset($this->session->login) || !isset($this->session->password))
{
    ?>
    <a href="<?= base_url() ?>form"><input type="button" class="lien btn btn-light" value="Formulaire d'inscription"></a>
    <a href="<?= base_url() ?>login"><input type="button" class="lien btn btn-light" value="Connexion"></a>
    <?php
}
else
{
    ?>
    <a href="<?= base_url() ?>profile"><input type="button" class="lien btn btn-light" value="Profil"></a>
    <a href="<?= base_url() ?>logout"><input type="button" class="lien btn btn-light" value="Déconnexion"></a>
    <?php
}
?>
</div>