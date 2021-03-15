<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Accueil - Loca-Auto</title>
</head>

<body>

    <div class="AF15X36">

        <div class="card position-absolute top-100 start-50 translate-middle p-2 shadow">
            <div class="card-body">
                <div class="container">
                    <div class="col-sm-12">
                        <h5 class="card-title mb-3">Réservez votre véhicule</h5>
                    </div>
                    <div class="row align-items-center AX76Q3">
                        <form method="post" action="<?= base_url() ?>form_valid_index">
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text form-text" id="basic-addon2"><i class="fas fa-calendar-day"></i></span>
                                    <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Début de la location" aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text form-text" id="basic-addon2"><i class="fad fa-calendar-day"></i></span>
                                    <input type="date" class="form-control" id="endDate" name="endDate" placeholder="Fin de la location" aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <hr>
                                <input type="submit" id="confirmDate" name="confirmDate" class="btn btn-outline-primary mr-2 AD38XL" value="Rechercher"><i class="fas fa-search-location"></i> Rechercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>