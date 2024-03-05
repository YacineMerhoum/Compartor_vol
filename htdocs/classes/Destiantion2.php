<?php

class Destination2
{
    private int $id;
    private string $location;
    private string $photo;
    private string $texte;
    private int $price;
   
    

    public function __construct($data)
    {
        $this->setId($data["id"]);
        $this->setLocation($data["location"]);
        $this->setPhoto($data["photo"]);
        $this->setTexte($data["texte"]);
        $this->setPrice($data["price"]);


    }

    public function getId()
    {
        return $this->id;
    }
    public function setId(int $id)
    {
    
        $this->id = $id;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    public function getTexte()
    {
        return $this->texte;
    }
    public function setTexte($texte)
    {
        $this->texte = $texte;
    }
    public function getLocation()
    {
        return $this->location;
    }
    public function setLocation($location)
    {
        $this->location = $location;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
 

}