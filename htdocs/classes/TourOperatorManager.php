<?php


class TourOperatorManager
{
    private PDO $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion; 
    }

    public function getOperator(){
        $preparedRequest = $this->connexion->prepare("SELECT * FROM tour_operator");
        $preparedRequest->execute([]);
        $OperatorIdArray = $preparedRequest->fetch(PDO::FETCH_ASSOC);
    
        if ($OperatorIdArray) {
            return new TourOperator($OperatorIdArray);
        } else {
            return null;
        }
    }



}   