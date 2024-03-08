<?php
session_start();



include_once "./connexion/connexion.php";
include_once "./connexion/autoloader.php";



$manager = new Manager($connexion);
$destinationsObtainedByLocation = $manager->getDestinationsByLocation($_GET['location']);
$arrayOfTourOperatorsObject = [];

foreach ($destinationsObtainedByLocation as $destination) {
    $tourOperator = $manager->getTourOperatorById($destination->gettourOperatorId());
    array_push($arrayOfTourOperatorsObject, $tourOperator);
}

$destination = $destinationsObtainedByLocation[0];

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
    <section class="headerTop" style="background-image: url('<?= $destination->getHeaderPhoto()?>');">
        <div class="">
            <div class="titleHeader mt-3 me-5 d-flex justify-content-end font" style="color: white;"><?= $destination->getLocation() ?></div><br>
            <div class="fs-5 bs-success-text-emphasis me-5 d-flex justify-content-end font" style="color: white;"><?= $destination->getTexte() ?></div><br>
        </div>
    </section><br>



    <div class="container text-center mt-3">
        <div class="text-center fs-3">
            <h1 class="fs-7 font mt-2">Choisissez votre tour Opérateur et partez pour <?= $destination->getLocation() ?></h1>

        </div>

        <form class="text-center" method="post" action="./detailVoyage.php">



            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-4"></div>


                    <div class="col-4">

                        <select id="operator" name="id" autocomplete="chooseoperator" class="mt-2 form-select text-center fs-4">
                            <?php foreach ($arrayOfTourOperatorsObject as $tourOperator) { ?>

                                <option value="<?= $tourOperator->getid_operator() ?>"> <?= $tourOperator->getName() ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-4">
                    </div>


                </div>
            </div>


            <input value="<?= $destination->getLocation() ?>" type="hidden" name="location">
            <button class="mt-3 btn btn-primary text-white text-center" type="submit">Allez au détail de votre voyage</button>
        </form>
    </div>
    </section>




    <footer class="d-flex align-items-end justify-content-center">



        <h4 class="text-white"><strong>Skyeagle.com Yacine Sylvain et fils © Copyright 2024</strong></h4>
    </footer>



    <script src="./JavaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>