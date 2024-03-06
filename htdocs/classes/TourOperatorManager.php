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
        $preparedRequest->execute();
        $result = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
    
        $datalistOperator = [];
    
        foreach ($result as $dataOperatorSql) {
            $datalistOperator[] = new TourOperator($dataOperatorSql);
        }
    
        return $datalistOperator;
    }

    
}   