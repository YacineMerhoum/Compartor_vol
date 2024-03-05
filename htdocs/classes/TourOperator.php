<?php 
class TourOperator {
    private int $id;
    private string $name;
    private string $link;
    private int $gradeCount;
    private int $gradeTotal;
    private bool $isPremium;
    private string $logo;
    
    public function __construct($id, $name, $link, $gradeCount, $gradeTotal, $isPremium)
    {
    $this->id = $id;
    $this->name = $name;
    $this->link = $link;
    $this->gradeCount = $gradeCount;
    $this->gradeTotal = $gradeTotal;
    $this->isPremium = $isPremium;
    

    
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
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