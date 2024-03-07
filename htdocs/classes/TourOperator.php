<?php 
class TourOperator {
    private int $id_operator;
    private string $name;
    private string $link;
    private int $gradeCount;
    private int $gradeTotal;
    private bool $isPremium;
    private string $logo;
   
    

    public function __construct(array $data) {
        $this->hydrate($data);  
        if($data['id_operator']){
            $this->setid($data['id_operator']);
        }      
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

    public function getid_operator(){
        return $this->id_operator;
    }
    
    public function getname(){
        return $this->name;
    }   

    
    public function getlink(){
        return $this->link;
    }   


    public function getgradeCount(){
        return $this->gradeCount;
    }   

    public function getgradeTotal(){
        return $this->gradeTotal;
    }   

    public function getisPremium(){
        return $this->isPremium;
    }   

    public function getlogo(){
        return $this->logo;
    }   
    
    // SETTER

     
    public function setid($id_operator){
        $this->id_operator = $id_operator;
    }
    
    
    public function setname($name){
        $this->name = $name;
    }

     
    public function setlink($link){
        $this->link = $link;
    }

     
    public function setgradeCount($gradeCount){
        $this->gradeCount = $gradeCount;
    }


    public function setgradeTotal($gradeTotal){
        $this->gradeTotal = $gradeTotal;
    }

    public function setisPremium($isPremium){
        $this->isPremium = $isPremium;
    }

    public function setlogo($logo){
        $this->logo = $logo;
    }

}



