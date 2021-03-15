<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarLocation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="<?= base_url() ?>../assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>../assets/css/header.css" rel="stylesheet">
    <link href="<?= base_url() ?>../assets/css/form.css" rel="stylesheet">
    <link href="<?= base_url() ?>../assets/css/home.css" rel="stylesheet">
    <link href="<?= base_url() ?>../assets/css/footer.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top navbar-light p-3 bg-body solid">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Carlocation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        
            <button type="button" onclick="javascript:window.location.href='/'" class="btn btn-outline-primary mr-2 AFB001">Accueil</button>
                <button type="button" onclick="javascript:window.location.href='/index.php/carslist'" class="btn btn-outline-primary mr-2 AFB001">Louer un véhicule</button>


            </ul>
            
            <div class="d-flex">
            <?php
            if(!isset($this->session->login) || !isset($this->session->password))
                {
                    ?>
                <button type="button" onclick="javascript:window.location.href='/index.php/login'" class="btn btn-outline-primary mr-2 AFB001">Se connecter</button>
                <button type="button" onclick="javascript:window.location.href='/index.php/form'" class="btn btn-primary AFB002">S'inscrire</button>
                <?php } else { ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle SW4Q2D" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Mon compte
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/index.php/profile">Paramètres</a></li>
                            <li><a class="dropdown-item" href="/index.php/logout">Déconnexion</a></li>
                        </ul>
                        </div>
               <?php } ?>
            </div>
        </div>
    </div>
</nav>