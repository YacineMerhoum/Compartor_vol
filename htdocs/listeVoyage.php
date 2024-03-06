<?php
include_once "./connexion/connexion.php";
include_once "./connexion/autoloader.php";

$id_destination = isset($_GET['id']) ? $_GET['id'] : '';

// Requête pour récupérer l'ID de l'opérateur associé à la destination
$query = "SELECT tour_operator_id FROM destination WHERE id = :id";
$statement = $connexion->prepare($query);
$statement->bindValue(':id', $id_destination);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);

// Si une ligne est retournée, récupérer l'ID de l'opérateur
$id_operator = $row ? $row['tour_operator_id'] : null;

// Afficher l'ID de l'opérateur
// echo "ID de l'opérateur associé à la destination : $id_operator";




$manager = new Manager($connexion);
$destinations = $manager->getAllDestination();
$destinationsObject = [];


foreach ($destinations as $destinationData) {
    $objectDestination = new Destination($destinationData);
  
    array_push($destinationsObject, $objectDestination);
}



$tourOperatorManager = new TourOperatorManager($connexion);
$operators = $tourOperatorManager->getOperator();




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
if ($id_operator) {
    // Requête pour récupérer les informations de l'opérateur
    $query = "SELECT * FROM tour_operator WHERE id_operator = :id";
    $statement = $connexion->prepare($query);
    $statement->bindValue(':id', $id_operator);
    $statement->execute();
    
    // Vérifiez si des résultats ont été trouvés
    if ($statement->rowCount() > 0) {
        // Récupérez les informations de l'opérateur
        $operator_info = $statement->fetch(PDO::FETCH_ASSOC);
        
        // // Affichez les informations de l'opérateur
        // echo "Nom de l'opérateur : " . $operator_info['name'];
        // echo "Description : " . $operator_info['logo'];
        // // et ainsi de suite pour d'autres champs
        
    } else {
        echo "Aucun opérateur trouvé avec cet ID.";
    }
} else {
    echo "ID de l'opérateur non valide.";
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="./loader/loader.css"> -->
    <link rel="stylesheet" href="./CSS/listeVoyage.css">
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
    <section class="headerTop">
        <div class="">
            <div class="titleHeader mt-3 me-5 d-flex justify-content-end font" style="color: white;"><?= $destinationLocation ?></div><br>
            <div class="fs-5 bs-success-text-emphasis me-5 d-flex justify-content-end" style="color: white;"><?= $destinationTexte ?></div><br>
            <div class="fs-5 bs-success-text-emphasis me-5 d-flex justify-content-end"><img src="<?= $operator_info['logo'];?>" alt=""></div>
        </div>
    </section><br>
    
    <div class="container text-center">  
    <div class="text-center fs-3">Choisissez votre tour Opérateur et partez pour <?= $destinationLocation ?></div><br>
    
    <form class="text-center" method="get" action="./listeVoyage.php">

    <select id="operator" name="operator" autocomplete="chooseoperator"
                class="mt-5 form-select text-center fs-4">
                <?php foreach ($operators as $operator) : ?>
        
                    <option value="<? $operator->getname(); ?>"> <?= $operator->getname(); ?></option>

                <?php endforeach; ?>
            </select>

    <button class="mt-3 btn btn-primary text-white text-center" type="submit">Allez au détail de votre voyage</button>
    </form>
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