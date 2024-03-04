<?php
include_once "../connexion/connexion.php";
include_once "../connexion/autoloader.php";
$manager = new Manager($connexion);
$reviews = $manager->getReviewByOperator();
$reviewsObject = [];

foreach ($reviews as $review) {
    $objectReviews = new Review(
        $review["id"],
        $review["message"],
        $review["author"],
        $review["note"],
        $review["date"],
        $review["tour_operator_id"]
    );
    array_push($reviewsObject, $objectReviews);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./review.css">
    <title>Document</title>
</head>

<body>


    <?php foreach ($reviewsObject as $key) { ?>
        <body class="bg-light">
   <div class="container py-4">
      <div class="ex1 row  ">

         <div class="col">
            <div class="card h-100 card-review">
               <div class="card-header pb-0 d-flex flex-row justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                     <img class="rounded-circle me-2"
                          src="../medias/logo_comparator_premium_seul.png" />
                     <div class="d-flex flex-column justify-content-center align-items-start fs-5 lh-sm">
                        <b class="text-primary"><?= $key->getAuthor()?></b>
                        <small class="text-muted"><?= $key->getDate()?></small>
                     </div>
                  </div>
                  <span class="fs-1 my-0 fw-bolder text-success"><?= $key->getNote()?></span>
               </div>
               <div class="card-body py-2">
                  <p class="card-text"><?= $key->getMessage()?></p>
               </div>
               <div class="card-footer pt-0 d-flex flex-row align-items-center text-muted">
                  
               </div>
               <a href="#" class="stretched-link"></a>
            </div>
         </div>

         

</body>


    <?php } ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>