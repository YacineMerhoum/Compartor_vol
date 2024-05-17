<?php
session_start();

// require_once './connexion/connexion.php';
// include "../connexion/debug.php";
// require_once './connexion/autoloader.php';

require_once './classes/Manager.php';
require_once './classes/Destination.php';
require_once './classes/Review.php';
require_once './classes/TourOperator.php';
require_once './connexion/connexion.php';


$manager = new Manager($connexion);

if (
    !empty($_POST["author"]) && ($_POST["date"]) && ($_POST["message"])
    && ($_POST["note"]) && ($_POST["id_tour_operator"])
) {
    $manager->addReview(
        $_POST["author"],
        $_POST["date"],
        $_POST["message"],
        $_POST["note"],
        $_POST["id_tour_operator"],
    );
};

$id = $_POST['id'];
$location = $_POST['location'];

$tourOperator = $manager->getTourOperatorById($id);

// LES REVIEWS SONT A LIEES AUX ID 
$reviews = $manager->getReviewByOperatorId($id);
$reviewsObject = [];



foreach ($reviews as $singleReview) {
  
    $objectReview = new Review(
        $singleReview["id"],
        $singleReview["message"],
        $singleReview["author"],
        $singleReview["note"],
        $singleReview["date"],
        $singleReview["id_tour_operator"]
    );
    array_push($reviewsObject, $objectReview);
}

$destinationFinal = $manager->getDestinationByOperatorIdAndDestinationLocation($id, $location);

?>
<?php
// Timezone pour le formulaire 
date_default_timezone_set('Europe/Paris');
$date = new DateTime();
$locale = 'fr_FR';
$formatter = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::NONE);
$date_fr = $formatter->format($date);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="./loader/loader.css"> -->
    <link rel="stylesheet" href="./CSS/detailVoyage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <img id="logoImage" src="./medias/logo_sky_eagle.png" style="height: 90px;">
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

    <section class="headerTop" style="background-image: url(<?= $destinationFinal->getHeaderPhoto() ?>);">
        <div class=" d-flex justify-content-start">
            <h1 class="titleHeader mt-5 me-1"><?= $destinationFinal->getLocation() ?></h1>
        </div>

    </section>





    <div id="googlemap" class="d-flex justify-content-center p-5">
        <div id="">
            <iframe id="map" class="rounded-4 shadow-lg " src="<?= $destinationFinal->getGps() ?>" width="800" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row align-items-center">
            <div class="col-3">

            </div>
            <div class="col-6">
                <h2 class="font text-center"><?= $destinationFinal->getTexte() ?></h2>

            </div>
            <div class="col-3">
            </div>
        </div>
    </div>


    <div id="cardPrice" class="card mx-auto mt-3 cardPrice" style="width: 34rem;">
    <div class="d-flex justify-content-center mt-5">
        <h3 class="font ">Ce voyage est disponible au prix de :</h3>
    </div>
    <div class="d-flex justify-content-center mt-1">
        <h1 class="text-info"><?= $destinationFinal->getPrice()?><span class="text-warning"> €</span>
        <span class="text-black fw-bold detailSpan">/pers.</span>
    </h1>                               
    </div>
    <div class="d-flex justify-content-center ">
        <h3 class="font ">avec notre partenaire : </h3>
    </div>
    <div class="operators d-flex justify-content-center p-3">
        
        <a href="<?= $tourOperator->getLink() ?>" target="_blank"><img src="<?= $tourOperator->getLogo() ?>" alt="" style="height:80px;"></a>
    </div>
    
    <p class="text-center fw-bold mt-1">Ils ont aimé</p>
    <img  class="" src="./medias/avistripodviser.svg" style="height: 40px;">
    </div>                         

    <div class="d-flex flex-wrap justify-content-around my-5" id="cardsReview">
        <?php foreach ($reviewsObject as $review) { 
            
            ?>
            <div class="card shadow-lg border border-2 border-black rounded" style="width: 18rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fs-3 mt-3 font"><?= $review->getAuthor() ?></h5>
                        <img class="border border-5 rounded-circle" style="height: 70px;" src="./medias/logo_comparator_premium_seul.png">
                    </div>
                    <div class="text-center">
                        <h6 class="card-title fs-6"><?= $review->getDate() ?></h6>
                        <h5 class="card-subtitle mb-2 text-success fs-1  "><?= $review->getNote() ?>/10</h5>
                        <p class="card-text fst-italic fw-bold "><?= $review->getMessage() ?></p>

                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>

                </div>
            </div>
        <?php } ?>
    </div>
    <div class="container text-center my-5">
        <div class="row align-items-center">
            <h1 class="font my-5">Laissez-nous votre avis</h1>
            <div class="col-4"></div>
            <div class="col-4">
                <form method="post" id="createReview" action="">
                    <span class="input-group-text font">Nom</span>
                    <input type="text" class="form-control" placeholder="" id="author" name="author">


                    <span class="input-group-text font">Date</span>
                    <input type="text" class="form-control" value="<?php echo $date_fr; ?>" id="date" name="date" readonly>


                    <span class="input-group-text font">Votre message</span>
                    <input class="form-control" id="message" name="message"></input>

                    <span class="input-group-text font">Votre note</span>
                    <input type="text" class="form-control" placeholder="" id="note" name="note">

                    <span class="input-group-text font">Opérateur</span>
                    <select class="form-select mt-3 font" name="id_tour_operator" id="id_tour_operator">
                        <option value="1">Leclerc</option>
                        <option value="2">Fram</option>
                        <option value="3">Thomas Cook</option>


                    </select>

                    <button type="submit" id="buttonSend" class="mt-5 btn btn-secondary"><span class="font">Envoyer</span></button>
                </form>

            </div>

            <div class="col-4"></div>
        </div>
    </div>

    <footer class="d-flex align-items-end justify-content-center">
        <h4 class="text-white"><strong>Skyeagle.com Yacine Sylvain et fils © Copyright 2024</strong></h4>
    </footer>

    <script src="./JavaScript/ajax.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>