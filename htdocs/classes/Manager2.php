<?php 
class Manager2
{
    private PDO $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion; 
    }
    

    public function getAllDestinationId() {
        $getDestinationId = "SELECT * FROM destination";

        $statement = $this->connexion->prepare($getDestinationId);
        $statement->execute();

        $datalistDestination = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $datalistDestination;
    }

}