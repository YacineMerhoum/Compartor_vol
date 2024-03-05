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