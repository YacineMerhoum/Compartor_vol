<?php

session_start();
require './connexion/autoloader.php';
require './connexion/connexion.php';
require './connexion/message.php';

$TourOperatorconnexion = new TourOperatorManager($connexion);

// Appeler getData() pour obtenir les données
$listOperatorManager = $TourOperatorconnexion->getOperator();


if (!empty($_SESSION['name']) && is_string($_SESSION['name'])) {
    $userName = $_SESSION['name'];
} else {
    $userName = ''; // Si le nom n'est pas défini, initialisez-le à une chaîne vide
}


    $addDestination = new Manager($connexion);
    if (!empty($_POST["location"]) && !empty($_POST["price"])) {
        $addDestination->addDestination(
            $_POST["location"],
            $_POST["price"]
        );
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
    <title>Accueil</title>
</head>

<body>

    <header class="">
        <nav class=" navbar navbar-expand-lg bg-body-white" style="height: 180px;">
            <div class="container-fluid ">
                <a class="navbar-brand ms-5" href="index.php">
                    <img src="./medias/logo_sky_eagle.png" style="height: 90px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav fs-5 ">
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

    <section class="headerTop" style="background-image: url(./medias/header/DubaiHeader.jpg)">
        <div class=" d-flex justify-content-end"></div>
        <div class="d-flex align-items-end flex-column">
        </div>
    </section>
    
    <section class="sectionCards1" >
    <form action="./process/admin.php" method="get">
        <div class="container d-flex justify-content-center">
            
            <div class="col-6 text-center">
                            

                <label for="name" class="mt-3 fs-3 text-center font">Connectez votre société <p class="fs-6 font">(réservez aux operateurs)</p></label>

               
                <div class="grid text-center border-1">
                <select id="chooseoperator" name="name" autocomplete="chooseoperator" class="g-col-4 form-select mt-1 text-center">

                    <?php foreach ($listOperatorManager as $TourOperator) : ?>
                        <option value="<?= $TourOperator->getname(); ?>"><?= $TourOperator->getname(); ?></option>
                    <?php endforeach; ?>
                </select>


                <div class="d-flex justify-content-center g-col-4">
                    <button type="submit" class="mt-3 btn btn-warning">Connexion</button>
                </div>

            </div>
            </div>
        </div>
    </form>


    <div class="container mt-4">
        <div class="d-flex justify-content-center fs-4">
            <p class="font"> Bonjour,&nbsp</p>
            <?php
            if (!empty($_SESSION['name'])) {
            ?>
                <p class="fs-4"><?= $userName; ?></p>
            <?php
            } else {
            ?>
            <?php
            }
            ?>
        </div>

        <form action="./process/accueil.php" method="post">
            <div class="container d-flex justify-content-center  text-center">

                <div class="col-5">

                    <label for="name" class=" fs-4 text-center font">Veuillez entrez votre code premium reçu par mail</label>
                    <label for="name" class=" fs-6 fst-italic text-center font">Si vous ne l'avez pas reçu, veuillez contacter notre service client.</label>

                    <input type="text" name="code" id="code" autocomplete="code" class="mt-3 form-control" placeholder="12345">
                    <div class=""><button type="submit" id="butonCo" class="mt-2 btn btn-warning">Premium</button>
                    </div>

                </div>
            </div>
        </form>
        </section>


<h1 class="">Ajouter une destination</h1>
<form action="" method="post">
<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Location</span>
  <input type="text" class="form-control" id="location" name="location" placeholder="Location">
</div>
<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Price</span>
  <input type="text" class="form-control" id="price" name="price" placeholder="Price">
</div>
<button type="submit">Créer une destination</button>
</form>










        <footer class="d-flex align-items-end justify-content-center">



            <h5 class="text-white">Skyeagle.com Sylvain & Yacine CORP. © Copyright 2024</h5>
        </footer>

        <script src="./JavaScript/connexion.js"></script>
        <script src="./JavaScript/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>