<?php

Class User extends CompanyUsers {
    private \DateTime $employedOn;
    private string $description;

    /**
     * Get the value of employedOn
     */ 
    public function getEmployedOn()
    {
        return $this->employedOn;
    }

    /**
     * Set the value of employedOn
     *
     * @return  self
     */ 
    public function setEmployedOn($employedOn)
    {
        $this->employedOn = $employedOn;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

}