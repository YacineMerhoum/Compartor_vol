<?php

class Destination
{
    private int $id;
    private string $location;
    private string $photo;
    private string $texte;
    private int $price;
    private string $logo;
    private string $headerPhoto;
    private string $gps;
    private string $link;
    private int $tourOperatorId;

    public function __construct($data)
    {   




        $this->setId($data["id"]);
        $this->setLocation($data["location"]);
        $this->setPhoto($data["photo"]);
        $this->setTexte($data["texte"]);
        $this->setPrice($data["price"]);
        $this->setLogo($data["logo"]);
        $this->setGps($data["gps"]);
        $this->setLink($data["link"]);
        $this->setHeaderPhoto($data["headerPhoto"]);
        $this->settourOperatorId($data["tour_operator_id"]);
        
        
    
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
    public function getHeaderPhoto()
    {
        return $this->headerPhoto;
    }
    
    public function setHeaderPhoto($headerPhoto)
    {
        $this->headerPhoto = $headerPhoto;
    }
    public function getGps()
    {
        return $this->gps;
    }
    public function setGps($gps)
    {
        $this->gps = $gps;
    }

    public function gettourOperatorId()
    {
        return $this->tourOperatorId;
    }
    public function settourOperatorId($tourOperatorId)
    {
        $this->tourOperatorId = $tourOperatorId;
    }
        public function getLink()
    {
        return $this->link;
    }
    public function setLink($link)
    {
        $this->link = $link;
    }
}