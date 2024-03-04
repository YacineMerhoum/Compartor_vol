<?php
include_once "./connexion/connexion.php";
include_once "./connexion/autoloader.php";

$manager = new Manager($connexion);
$destinations = $manager->getAllDestination();
$destinationsObject = [];

foreach ($destinations as $destination) {
    $objectDestination = new Destination(

        $destination["location"],
        $destination["photo"],
        $destination["texte"],
        $destination["price"],
        $destination["tour_operator_id"],
        $destination["logo"]
    );
    $objectDestination->setId($destination["id"]);
    array_push($destinationsObject, $objectDestination);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="./loader/loader.css"> -->
    <link rel="stylesheet" href="./CSS/accueil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <!-- <div id="loader">
<h1 class="textLoader">Chargement 
    ...
</h1>
</div> -->


    <header>
        <nav class="navbar navbar-expand-lg bg-body-white" style="height: 180px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="./medias/logo_sky_eagle.png" style="height: 90px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav fs-4 ">
                        <li class="nav-item">
                            <a class="nav-link active text-warning m-5 " aria-current="page" href="#"><strong>Promotion</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info m-5" href="#"><strong>Voyages</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info m-5" href="#"><strong>Opérateurs</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info m-5" href="#"><strong>Services</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="headerTop">
        <div class=" d-flex justify-content-end">
            <h1 class="titleHeader mt-2 me-1">Le meilleur comparateur de la toile</h1>
        </div>
        <div class="d-flex align-items-end flex-column">


            <button type="button" class="btn btn-primary text-warning mt-2"><strong>Découvrez nos offres Premium</strong></button>
        </div>
    </section>
    <!-- 
    SECTIONS OFFRES BDD CARDS -->
    <section class="sectionCards1">
        <div class="container text-center mt-5">
            <div class="row">
                <?php foreach ($destinationsObject as $key) { ?>

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card shadow-lg mb-5" style="width: 25rem; height: 30rem;">
                            <img src="<?= $key->getPhoto() ?>" class="card-img-top">
                            <div class="card-body">
                                <h5><?= $key->getLocation() ?></h5>
                                <p class="card-text"><?= $key->getTexte() ?></p>
                                <div class="d-flex justify-content-between">
                                    <p class="text-info fs-3"><?= $key->getPrice() ?>€</p>
                                    <a href=""><img src="<?= $key->getLogo() ?>" style="height: 25px;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- RECHERCHE DE VOYAGE A TRAVAILLER  -->
    <div class="search d-flex justify-content-center mb-5">
        <form class="d-flex justify-content-center" style="width: 30%;" role="search">
            <input name="search" class="form-control me-2" type="search" placeholder="Rechercher une destination" aria-label="Search">
            <button class="btn btn-primary text-warning" type="submit"><strong>Rechercher</strong></button>
        </form>
    </div>

    <footer class="d-flex align-items-end justify-content-center">



        <h4 class="text-white"><strong>Skyeagle.com Yacine Sylvain et fils © Copyright 2024</strong></h4>
    </footer>










    <script src="./JavaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>