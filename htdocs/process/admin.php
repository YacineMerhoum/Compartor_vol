<?php
 session_start();
 
 require_once '../connexion/connexion.php';
//  require_once "../connexion/debug.php";
require_once '../connexion/autoloader.php';
require_once '../connexion/message.php';

$TourOperatorManagers = new TourOperatorManager($connexion);

// Appeler getData() pour obtenir les données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];


    // verifi si l'utilisateur existe
    $preparedRequest = $connexion->prepare("SELECT * FROM tour_operator WHERE name = ?");
    $preparedRequest->execute([$name]);
    $user = $preparedRequest->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        header('Location: ../connexion.php?success=Votre organisation existe déjà, selectionner le.');
        exit(); 
    } else {
        // Insert un nouveau utilisateur
        $preparedRequest = $connexion->prepare("INSERT INTO tour_operator (name) VALUES (?)");
        $preparedRequest->execute([$name]);


        header('Location: ../index.php?success=votre organisation est enregistré, félicitation !.');
        exit();
    }
}

