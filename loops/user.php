<?php

class User extends AbstractUser {

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
}