<?php
session_start();
include_once "./connexion/connexion.php";
include_once "./connexion/autoloader.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="./loader/loader.css"> -->
    <link rel="stylesheet" href="./CSS/operators.css">
    <link rel="stylesheet" href="./CSS/listeVoyage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opérateurs</title>
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
            <div class="titleHeader mt-3 me-5 d-flex justify-content-end font" style="color: white;">Partenaires</div><br>
            <div class="fs-5 bs-success-text-emphasis me-5 d-flex justify-content-end" style="color: white;"></div><br>
            <div class="fs-5 bs-success-text-emphasis me-5 d-flex justify-content-end"><img src="" alt=""></div>
        </div>
    </section>

    <div class="anim">
<h1 class="mt-3 font text-center">Voici nos partenaires opérateurs</h1>
<p class="text-center fst-italic fw-bold mb-1">Nos partenaires opérateurs nous font confiance, 
    ce qui témoigne de notre engagement et de notre fiabilité dans le domaine.</p></div>

<section class="container mb-4" style="height: 100%;">
<div class="marquee">
  <div class="slide">
    <svg viewBox="0 0 24 24" src="./medias/logoComparators/leclerc.png">
        <img src="./medias/logoComparators/leclerc.png" alt="">
      
    </svg>
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <img src="./medias/logoComparators/fram.png" alt="">                       
    </svg>
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <img src="./medias/logoComparators/Thomas_Cook_Logo.png" alt="">
    </svg>
  </div>
  <div class="slide">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <img src="./medias/logoComparators/leclerc.png" alt="">
    </svg>
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <img src="./medias/logoComparators/fram.png" alt="">
    </svg>
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <img src="./medias/logoComparators/Thomas_Cook_Logo.png" alt="">
    </svg>
  </div>
</div>
</section>










    <script src="./JavaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>