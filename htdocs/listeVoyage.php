<?php
include_once "./connexion/connexion.php";
include_once "./connexion/autoloader.php";

$manager = new Manager($connexion);
$destinations = $manager->getAllDestination();
$destinationsObject = [];


foreach ($destinations as $destinationData) {
    $objectDestination = new Destination($destinationData);

    
    array_push($destinationsObject, $objectDestination);
}


$tourOperatorManager = new TourOperatorManager($connexion);
$tourOperatordata = $tourOperatorManager->getOperator();

// Vérifier si des opérateurs ont été récupérés avec succès
if ($tourOperatordata) {
    // Si des opérateurs ont été récupérés, initialiser la variable $operators avec les données récupérées
    $operators = [$tourOperatordata];
} else {
    // Si aucun opérateur n'a été récupéré, initialiser la variable $operators avec un tableau vide
    $operators = [];
}

// Utiliser les opérateurs récupérés dans votre code
foreach ($operators as $operatorData) {
    // ...
}


$id = isset($_GET['id']) ? $_GET['id'] : '';



// Récupérer les informations de la destination correspondant à l'ID
$destinationLocation = "";

foreach ($destinationsObject as $destination) {
    if ($destination->getId() == $id) {
        $destinationLocation = $destination->getLocation(); // Supposons que la fonction pour récupérer le texte soit getLocation()
        break;
    }
}

$destinationTexte = "";

foreach ($destinationsObject as $destination) {
    if ($destination->getId() == $id) {
        $destinationTexte = $destination->getTexte(); // Supposons que la fonction pour récupérer le texte soit getLocation()
        break;
    }
}

$destinationOperatorlogo = "";

foreach ($destinationsObject as $destination) {
    if ($destination->getId() == $id) {
        $destinationOperatorlogo = $destination->getLogo(); // Supposons que la fonction pour récupérer le texte soit getLocation()
        break;
    }
}



// $TourOperatorName = "";

// foreach ($OperatorObject as $TourOperator) {
//     if ($TourOperator->getname() == $name) {
//         $TourOperatorName = $TourOperator->getname(); 
//         break;
//     }
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="./loader/loader.css"> -->
    <link rel="stylesheet" href="./CSS/accueil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
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
                            <a class="nav-link active text-warning m-5" aria-current="page" href="#"><strong>Promotion</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info m-5" href="#"><strong>Voyages</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info m-5" href="./liste_voyage.php"><strong>Opérateurs</strong></a>
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
        <div class="d-flex justify-content-end">
            <div class="titleHeader mt-3 me-5"><?= $destinationLocation ?></div><br>
            <div class="fs-5 bs-success-text-emphasis m-5"><?= $destinationTexte ?></div>
        </div>
        <div class="d-flex align-items-end flex-column">


            <button type="button" class="btn btn-primary text-warning mt-5 me-5"><strong>Découvrez nos offres Premium</strong></button>
        </div>
    </section>
        

    

    <!-- Recuperer a partir de l'id du Get tout les infos du voyage et de l'operateur -->
    <section class="mt-5">

    <ol class="list-group list-group-numbered">
  <li class="list-group-item">
        <div class="ms-2 me-auto">
        <div class="fw-bold"><?= $destinationLocation ?> - <?= $destinationTexte ?> <img class="" src="<?= $destinationOperatorlogo ?>" alt=""><span class="badge text-bg-primary rounded-pill">14</span></div>
  </li>

  <li class="list-group-item">
        <div class="ms-2 me-auto">
        <div class="fw-bold"><?= $destinationLocation ?> - <?= $destinationTexte ?> <img class="" src="<?= $destinationOperatorlogo ?>" alt=""><span class="badge text-bg-primary rounded-pill">14</span></div>
  </li>

  <li class="list-group-item">
        <div class="ms-2 me-auto">
        <div class="fw-bold"><?= $destinationLocation ?> - <?= $destinationTexte ?> <img class="" src="<?= $destinationOperatorlogo ?>" alt=""><span class="badge text-bg-primary rounded-pill">14</span></div>
  </li>
  
    </ol>



    </section>
    <!-- RECHERCHE DE VOYAGE A TRAVAILLER  -->
    <div class="search d-flex justify-content-center mb-5 mt-5">
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