<?php
//  session_start();
 
//   include "../config/debug.php";
  require_once './connexion/connexion.php';
require_once './connexion/autoloader.php';


class VoyageManager {
    private PDO $connexion; 

    public function __construct(PDO $connexion)
    {
        $this->connexion = $connexion;
    }

    

    public function addVoyage(Voyage $voyage){
        $preparedRequest = $this->connexion->prepare("INSERT INTO destination(location,photo,texte,price,tour_operator_id) VALUES (?,?,?,?,?)");
        $preparedRequest->execute([
            $voyage->getid(),
            $voyage->getlocation(),
            $voyage->getphoto(),
            $voyage->gettexte(),
            $voyage->getprice(),
            $voyage->getidtouroperator(),
        ]);
    }

    public function getVoyage(Voyage $voyage){
        $preparedRequest = $this->connexion->prepare("SELECT * destination");
        $preparedRequest->execute([
            $voyage->getid(),
            $voyage->getlocation(),
            $voyage->getphoto(),
            $voyage->gettexte(),
            $voyage->getprice(),
            $voyage->getidtouroperator(),
        ]);
    }

    public function getDestinationId($id){
        $preparedRequest = $this->connexion->prepare("SELECT * FROM destination WHERE id = ?");
        $preparedRequest->execute([
            $id
        ]);
        $DestinationIdArray = $preparedRequest->fetch(PDO::FETCH_ASSOC);

        return new Voyage($DestinationIdArray);
    }

    public function getDataVoyage() {
        $getVoyageList = "SELECT * FROM destination";
        $result = $this->connexion->query($getVoyageList);
        
        $datalistVoyage = [];
        
        while ($dataVoyageSql = $result->fetch(PDO::FETCH_ASSOC)) {
            $datalistVoyage[] = new Voyage($dataVoyageSql);
        }
    
    return $datalistVoyage;

    }

}
       

