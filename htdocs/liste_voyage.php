<?php
include_once "./connexion/connexion.php";
include_once "./connexion/autoloader.php";

$manager = new Manager($connexion);
$destinations = $manager->getAllDestination();
$destinationsObject = [];


$datalistDestination = $manager->();

var_dump($datalistDestination);

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
                            <a class="nav-link text-info m-5" href="./liste_voyage.php"><strong>Voyages</strong></a>
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


    <div class="grid gap-2 grid-cols-3 p-8">

<?php foreach ($datalistDestination as $destinations) : ?>
    <?php if (!empty($datalistDestination)) : ?>
        <div class="text-white border-2 border-slate-700 rounded-md">

            <!-- Affichage de l'image de l'animal -->
            <img class="size-20" src="../images/<?= $destinations['photo'] ?>" alt="">

        
        </div>
    <?php endif; ?>
<?php endforeach; ?>
</div>


<!-- 
    $updatedRequest = $this->connexion->prepare("SELECT * FROM phrase WHERE `id` = ROUND( RAND()");
$updatedRequest->execute();
$randomPhrase = $updatedRequest->fetch(PDO::FETCH_ASSOC);

echo $randomPhrase; -->

    <section>
        <div><img class="size-20" src="../images/<?= $destinations['photo'] ?>" alt=""></div>
        <div class="d-flex justify-content-end">
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
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <?php foreach ($destinationsObject as $key) { ?>

                        <div class="card shadow-lg" style="width: 25rem;">
                        <a href="./liste_voyage.php"><img src="<?= $key->getPhoto() ?>" class="card-img-top img-fluid" alt="..."></a>
                            <div class="card-body">
                                <h5><?= $key->getLocation() ?></h5>
                                <p class="card-text"><?= $key->getTexte() ?></p>
                                <div class="d-flex justify-content-between">
                                    <p class="text-info fs-3"><?= $key->getPrice() ?>€</p>
                                    <a href=""><img src="<?= $key->getLogo()?>" style="height: 25px;"></a>



                                </div>
                            </div>
                        </div>
                </div>
            <?php } ?>

            <!-- <div class="col-lg-4 col-sm-12 ">
                    <div class="card" style="width: 25rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="card" style="width: 25rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->




    </section>

















    <script src="./JavaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>