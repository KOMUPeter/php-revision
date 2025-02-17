<?php
abstract Class  CompanyUsers implements Userinterface   {
    private string $name;
    private int $age;
    private string $isLuncked;

    public function __construct(string $name, int $age, string $isLuncked){
        $name = $this->name;
        $age = $this->age;
        $isLuncked = $this->isLuncked;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of isLuncked
     */ 
    public function getIsLuncked()
    {
        return $this->isLuncked;
    }

    /**
     * Set the value of isLuncked
     *
     * @return  self
     */ 
    public function setIsLuncked($isLuncked)
    {
        $this->isLuncked = $isLuncked;
        if ($isLuncked === "") {
            echo ("<p>You are a Junior stuff</p>");
        }
        return $this;
    }

    // function implemented in the interface
    function changeUserLunk(){
        
    }
}