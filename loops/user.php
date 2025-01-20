<?php

class User extends AbstractUser implements interfaceUser {

    use MyTraitFunctions;
    private array $names = array();


    /**
     * Get the value of names
     */ 
    public function getNames()
    {
        return $this->names;
    }

    /**
     * Set the value of names
     *
     * @return  self
     */ 
    public function setNames($names)
    {
        $this->names = $names;

        return $this;
    }

    public function createUser(){}
}