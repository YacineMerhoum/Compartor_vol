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
        JOIN `tour_operator` ON `destination`.`tour_operator_id` = `tour_operator`.`id`
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
    public function getReviewByOperator()
    {
        $preparedRequest = $this->connexion->prepare("SELECT * FROM `review`");
        $preparedRequest->execute([

        ]);
        $reviewArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $reviewArray;
    }
    
    public function getAllDestinationId() {
        $getDestinationId = "SELECT * FROM destination WHERE id";

        $statement = $this->connexion->prepare($getDestinationId);
        $statement->execute();

        $datalistDestination = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $datalistDestination;
    }


}