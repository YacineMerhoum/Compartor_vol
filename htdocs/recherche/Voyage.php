<?php

 class Voyage {
   
    protected int $id;
    protected string $location;
    protected string $photo;
    protected string $texte;
    protected int $price;
    protected int $tour_operator_id;
    




    public function __construct(array $data) {
        $this->hydrate($data);        
     } 

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }

    }

   

    // GETTER

    
    public function getid(){
        return $this->id;
    }
    
    public function getlocation(){
        return $this->location;
    }   

    
    public function getphoto(){
        return $this->photo;
    }   


    public function gettexte(){
        return $this->texte;
    }   

    public function getprice(){
        return $this->price;
    }   

    public function getidtouroperator(){
        return $this->tour_operator_id;
    }   


    
    // SETTER

     
    public function setid($id){
        $this->id = $id;
    }
    
    
    public function setlocation($location){
        $this->location = $location;
    }

     
    public function setphoto($photo){
        $this->photo = $photo;
    }

     
    public function settexte($texte){
        $this->texte = $texte;
    }


    public function setprice($price){
        $this->price = $price;
    }

}

$TourOperatorName = "";

foreach ($OperatorObject as $TourOperator) {
   if ($TourOperator->getname() == $name) {
       $TourOperatorName = $TourOperator->getname(); 
       break;
   }
}

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



$TourOperatorName = "";

foreach ($OperatorObject as $TourOperator) {
   if ($TourOperator->getname() == $name) {
       $TourOperatorName = $TourOperator->getname(); 
       break;
   }
}

// $manager = new Manager($connexion);
// $destination = $manager->getDestinationById($id);



// $TourOperator = new TourOperatorManager($connexion);
// $operatortourObjet = $TourOperator->getOperator(); 
// $operatorsObject = [];


// foreach ($operatortourObjet as $operator) {
//     $operatorObject = new TourOperator(
//         $operator["id_operator"],
//         $operator["name"],
//         $operator["gradeCount"],
//         $operator["notegradeTotaldate"],
//         $operator["isPremium"],
//         $operator["logo"]
//     );

//     array_push($operatorsObject, $operatorObject);
// }


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


$destinationOperatorlogo = "";

foreach ($destinationsObject as $destination) {
        if ($destination->getId() == $id) {
         $destinationOperatorlogo = $destination->getLogo(); // Supposons que la fonction pour récupérer le texte soit getLocation()
         break;
     }
 } 



 $TourOperatorName = "";

foreach ($OperatorObject as $TourOperator) {
    if ($TourOperator->getname() == $name) {
        $TourOperatorName = $TourOperator->getname(); 
        break;
    }
}

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


$TourOperatorName = "";

foreach ($OperatorObject as $TourOperator) {
    if ($TourOperator->getname() == $name) {
        $TourOperatorName = $TourOperator->getname(); 
        break;
    }
}