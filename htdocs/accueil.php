<?php
session_start();

require_once './connexion/connexion.php';
require_once './connexion/autoloader.php';
require_once './connexion/message.php';



$manager = new Manager($connexion);
$destinations = $manager->getAllDestination();
$destinationsObject = [];

foreach ($destinations as $destinationData) {
    $objectDestination = new Destination($destinationData);



    array_push($destinationsObject, $objectDestination);
}

if (!empty($_SESSION['name']) && is_string($_SESSION['name'])) {
    $userName = $_SESSION['name'];
} else {
    $userName = ''; // Si le nom n'est pas défini, initialisez-le à une chaîne vide
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
    <title>Connexion admin</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-white" style="height: 180px;">
            <div class="container-fluid">
                <a class="navbar-brand ms-5" href="index.php">
                    <img src="./medias/logo_sky_eagle.png" style="height: 90px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav fs-5">
                        <li class="nav-item">
                            <a class="nav-link active text-warning m-5" aria-current="page" href="">Promotion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info m-5" href="./accueil.php">Voyages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info m-5" href="./operators.php">Opérateurs</a>
                        </li>
                        <li class="nav-item">
                            <div>
                                <?php
                                if (!empty($_SESSION['name'])) {
                                ?>
                                    <p class="nav-link text-warning m-5"><?= $userName; ?></p>
                                <?php
                                } else {
                                ?>
                                    <a class="nav-link text-warning m-5" href="./connexion.php">Connexion <h6 class="">(réservez opérateur)</h6></strong></a>
                                <?php
                                }
                                ?>
                            </div>
                        <li class="nav-item">
                            <?php if (!empty($_SESSION['name'])) { ?>


                                <a class="nav-link text-info m-5" href="./process/logout.php">Déconnexion</a>

                            <?php  } else { ?>


                            <?php } ?>
                        </li>
                        <div>

                            </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="headerTop">
        <div class=" d-flex justify-content-end">
            <div class="titleHeader mt-3 me-5">Le meilleur comparateur de la toile</div>
        </div>
        <div class="d-flex align-items-end flex-column">


            <button type="button" class="btn btn-primary text-warning mt-5 me-5" onclick="scrollToMiddle()"><strong>Découvrez nos offres</strong></button>
        </div>
    </section>
    <!-- 
    SECTIONS OFFRES BDD CARDS -->
    <section class="sectionCards1" id="cardAjax">
        <div class="container text-center mt-5">
            <div class="row">
                <?php foreach ($destinationsObject as $destination) { ?>

                    <div class="col-lg-4 col-md-6 col-sm-12">

                        <a href="./listeVoyage.php?location=<?= $destination->getLocation() ?>">

                            <div class="card shadow-lg mb-5" style="width: 25rem; height: 30rem;">
                                <img src="<?= $destination->getPhoto() ?>" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h5><?= $destination->getLocation() ?></h5>
                            <p class="card-text"><?= $destination->getTexte() ?></p>
                            <div class="d-flex justify-content-between">

                                <p class="text-info fs-3"><?= $destination->getPrice() ?>€</p>
                                <img src="<?= $destination->getLogo() ?>" style="height: 25px;">
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
        <form id="buttonMaj" name="buttonMaj" method="get" class="d-flex justify-content-center" style="width: 30%;" role="search">

            <button class="btn btn-primary text-warning" type="submit"><strong>Mettre à jour les destinations</strong></button>
        </form>
    </div>

    <footer class="d-flex align-items-end justify-content-center">



        <h5 class="text-white">Skyeagle.com Sylvain & Yacine CORP. © Copyright 2024</h5>
    </footer>









    <script src="./JavaScript/ajax.js"></script>
    <script src="./JavaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>