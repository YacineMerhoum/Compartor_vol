<?php
 session_start();
 
 require_once '../connexion/connexion.php';
//  require_once "../connexion/debug.php";
require_once '../connexion/autoloader.php';
require_once '../connexion/message.php';

$TourOperatorManagers = new TourOperatorManager($connexion);

// Appeler getData() pour obtenir les données


if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    $TourOperators = $TourOperatorManagers->getOperatorname($name);

   
    if ($TourOperators) {
        $_SESSION['name'] = $TourOperators;
        header('Location: ../connexion.php?');
        exit(); 
    
    } else {
     
        header('Location: ../connexion.php?');

    }
}

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     $name = $_GET['name'];


//     // verifi si l'utilisateur existe
//     $preparedRequest = $connexion->prepare("SELECT * FROM tour_operator WHERE name = ?");
//     $preparedRequest->execute([$name]);
//     $user = $preparedRequest->fetch(PDO::FETCH_ASSOC);

//     if ($user) {

//         header('Location: ../connexion.php?');

//         exit(); 
//     } else {
//         // Insert un nouveau utilisateur
//         $preparedRequest = $connexion->prepare("INSERT INTO tour_operator (name) VALUES (?)");
//         $preparedRequest->execute([$name]);


//         header('Location: ../index.php?success=votre organisation est enregistré, félicitation !.');
//         exit();
//     }


