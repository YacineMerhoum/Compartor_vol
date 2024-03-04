<?php

class Destination
{
    private int $id;
    private string $location;
    private string $photo;
    private string $texte;
    private int $price;
    private int $TourOperatorId;
    private string $logo;

    public function __construct($location, $photo, $texte, $price, $TourOperatorId, $logo)
    {
        
        $this->location = $location;
        $this->photo = $photo;
        $this->texte = $texte;
        $this->price = $price;
        $this->TourOperatorId = $TourOperatorId;
        $this->logo = $logo;

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
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
    public function getLogo()
    {
        return $this->logo;
    }
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

}