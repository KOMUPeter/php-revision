<?php
abstract class AbstractUser {
    private string $company;

     // Constructor to initialize the company property
     public function __construct(string $company = "") {
        $this->company = $company;
    }

    /**
     * Get the value of company
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @return  self
     */ 
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }
} 