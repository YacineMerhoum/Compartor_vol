<?php
session_start();
 
require_once './connexion/connexion.php';
// include "../connexion/debug.php";
require_once './connexion/autoloader.php';
require_once './connexion/message.php';



$id = $_GET["id"];

$manager = new Manager($connexion);
$destination = $manager->getDestinationById($id);



// LES REVIEWS SONT A LIEES AUX ID 
$manager = new Manager($connexion);
$reviews = $manager->getReviewByOperator();
$reviewsObject = [];

foreach ($reviews as $singleReview) {
    $objectReview = new Review(
        $singleReview["id"],
        $singleReview["message"],
        $singleReview["author"],
        $singleReview["note"],
        $singleReview["date"],
        $singleReview["tour_operator_id"]
    );
    array_push($reviewsObject, $objectReview);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="./loader/loader.css"> -->
    <link rel="stylesheet" href="./CSS/detailVoyage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Voyage</title>
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
                            <a class="nav-link text-info m-5" href="">Voyages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info m-5" href="">Opérateurs</a>
                        </li>
                        <li class="nav-item">
                            <div>
                                <?php
                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                    session_start();
                                }
                                if (isset($_SESSION['name'])) {
                                ?>
                                    <p class="nav-link text-warning m-5"><?php echo $_SESSION['name']; ?></p>
                                <?php
                                } else {
                                ?>
                                    <a class="nav-link text-warning m-5" href="./connexion.php">Connexion <h6 class="">(réservez opérateur)</h6></strong></a>
                                <?php
                                }
                                ?>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link text-info m-5" href="./process/logout.php">Déconnexion</a>
                            </li>
                            <div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="headerTop" style="background-image: url(<?= $destination->getHeaderPhoto() ?>);">
        <div class=" d-flex justify-content-start">
            <h1 class="titleHeader mt-5 me-1"><?= $destination->getLocation() ?></h1>
        </div>

    </section>


    


    <div class="d-flex justify-content-center p-5">
        <div class="">
        <iframe class="rounded-4 shadow-lg " src="<?=$destination->getGps()?>" width="800" height="350" style="border:0;" allowfullscreen=""
         loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row align-items-center">
            <div class="col-3">

            </div>
            <div class="col-6">
                <h2 class="font text-center"><?= $destination->getTexte() ?></h2>

            </div>
            <div class="col-3">

            </div>
        </div>

    </div>
    <div class="d-flex justify-content-center mt-5">
        <h3 class="font ">Ce voyage est disponible avec :</h3>
    </div>
    <div class="operators d-flex justify-content-center p-5">
        <a href=""><img src="<?= $destination->getLogo() ?>" alt="" style="height:80px;"></a>
    </div>

    <div class="d-flex flex-wrap justify-content-between my-5">
    <?php foreach ($reviewsObject as $key) { ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $key->getAuthor()?></h5>
                <h6 class="card-title"><?= $key->getDate()?></h6>
                <h5 class="card-subtitle mb-2 text-body-secondary"><?= $key->getNote()?></h5>
                <p class="card-text"><?= $key->getMessage()?></p>
                
                
            </div>
        </div>
        <?php } ?>
    </div>    






    <footer class="d-flex align-items-end justify-content-center">



        <h4 class="text-white"><strong>Skyeagle.com Yacine Sylvain et fils © Copyright 2024</strong></h4>
    </footer>










    <script src="./JavaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>