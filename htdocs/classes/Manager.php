<?php 
class Manager
{
    private PDO $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion; 
    }
    public function getAllDestination()
    {
        $preparedRequest = $this->connexion->prepare("SELECT * 
        FROM `destination` 
        JOIN `tour_operator` ON `destination`.`tour_operator_id` = `tour_operator`.`id_operator`
        LIMIT 6;
        ");
        $preparedRequest->execute([
            
        ]);
        $destinationArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $destinationArray;
    }
    public function getOperatorByDestination($id, $name, $link, $grade_count, $grade_total, $is_premium)
    {
        $preparedRequest = $this->connexion->prepare("SELECT * FROM `tour_operator`");
        $preparedRequest->execute([
            $id,
            $name,
            $grade_count,
            $grade_total,
            $is_premium,
        ]);
        $operatorArray  = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $operatorArray;
    }

    // NOTE AVIS REVIEWS ??
    public function getReviewByOperatorId($id)
  
    {
        $preparedRequest = $this->connexion->prepare("SELECT * FROM `review` WHERE `id_tour_operator` = ?");
        $preparedRequest->execute([
            $id
        ]);
        $reviewArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $reviewArray;
    }






    public function getDestinationById($id) {
        $preparedRequest = "SELECT * 
        FROM `destination` 
        JOIN `tour_operator` ON `destination`.`tour_operator_id` = `tour_operator`.`id_operator`
        WHERE `id` = ? ";

        $statement = $this->connexion->prepare($preparedRequest);
        $statement->execute([
            $id,
            
        ]);

        $datalistDestination = $statement->fetch(PDO::FETCH_ASSOC);
        $destination = new Destination($datalistDestination);
        return $destination;
    }

    public function getTourOperatorById($id) {
        $preparedRequest = "SELECT * 
        FROM `tour_operator` 
        WHERE `id_operator` = ? ";

        $statement = $this->connexion->prepare($preparedRequest);
        $statement->execute([
            $id,
            
        ]);

        $datalistOperator = $statement->fetch(PDO::FETCH_ASSOC);
        $TourOperator = new TourOperator($datalistOperator);
        return $TourOperator;
    }

    public function getDestinationByOperatorIdAndDestinationLocation( $id, $location) {

        try {
            $query = "SELECT * 
                      FROM `destination` 
                      WHERE `tour_operator_id` = ? 
                      AND  `location` = ?";
            
            $statement = $this->connexion->prepare($query);
            $statement->execute([$id, $location]);
            
            $datalist = $statement->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Gérer les erreurs de la manière appropriée
            // Par exemple, journaliser l'erreur ou la renvoyer
            throw new Exception("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }



        $destination = new destination($datalist);

 
        return $destination;
    }





    public function getReview(){
        $preparedRequest = $this->connexion->prepare("SELECT * FROM `review` WHERE `tour_operator_id`");
        $preparedRequest->execute([

        ]);
        $review = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $review;

    }

    public function addReview($author, $date, $message, $note, $id_tour_operator){
        $preparedRequest = $this->connexion->prepare("INSERT INTO `review` (`author`,`date`,`message`,`note`,`id_tour_operator`) VALUES (?,?,?,?,?)");
        $preparedRequest->execute([
            $author,
            $date,
            $message,
            $note,
            $id_tour_operator,
            
        ]);
    }
    

    public function getDestinationsByLocation(string $location) {
        $preparedRequest = "SELECT *
                            FROM `destination`

                            WHERE `location` = ?";
    
        $preparedRequest = $this->connexion->prepare($preparedRequest);
        $preparedRequest->execute([
            $location
        ]);
        
        $arrayOfDestinations = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        $arrayOfDestinationsObject= [];

        foreach ($arrayOfDestinations as $destinationData) {
            $destination = new Destination($destinationData);
            array_push($arrayOfDestinationsObject, $destination);
        }

        return $arrayOfDestinationsObject;
    }

    

    }

    
        
