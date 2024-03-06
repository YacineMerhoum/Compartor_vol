<?php

session_start();
require './connexion/autoloader.php';
require './connexion/connexion.php';
require './connexion/message.php';

$TourOperatorconnexion = new TourOperatorManager($connexion);

// Appeler getData() pour obtenir les données
$listOperatorManager = $TourOperatorconnexion->getOperator();

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

    <form action="./process/admin.php" method="get">
<div class="container">
      <div class="text-center">
                
              <label for="name" class="fs-3">Selectionner votre entreprise</label>
                
              <label for="name" class=""></label>
                                
              <select id="chooseoperator" name="operator" autocomplete="chooseoperator"
                class="text-center">
                
                <?php foreach ($listOperatorManager as $TourOperator) : ?>

                    <option value="<?= $TourOperator->getid_operator(); ?>"><?= $TourOperator->getname(); ?>
                    </option>
                <?php endforeach; ?>
                </select>


                  <div class="">
                       <button type="submit" class="btn btn-warning">Envoyé</button>
                  </div>

      </div>             
      </div>
  </form>
  

 
    <form action="./process/admin.php" method="post">
<div class="container">
      <div class="text-center">
                
              <label for="name" class="fs-3">Enregistrez-vous</label>
                
              <label for="name" class=""></label>
                  <div class="flex rounded-lg">
                      <input type="text" name="name" id="name" autocomplete="name" class="form-control mt-5" placeholder="Leclerc">
                  </div><br>

                
                  <div class="">
                       <button type="submit" class="btn btn-warning">Envoyé</button>
                  </div>

      </div>             
      </div>
  </form>
  


    <footer class="d-flex align-items-end justify-content-center">



        <h5 class="text-white">Skyeagle.com Sylvain & Yacine CORP. © Copyright 2024</h5>
    </footer>


    <script src="./JavaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>