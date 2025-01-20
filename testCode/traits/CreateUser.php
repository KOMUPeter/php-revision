<?php
trait CreateUser
{
    public function createUser(string $name, int $age, string $isLuncked, \DateTime $employedOn, string $description): User
    {
        // Create a new User instance
        $user = new User($name, $age, $isLuncked);
        
        // Set User-specific properties
        $user->setEmployedOn($employedOn);
        $user->setDescription($description);

        // Return the created user
        return $user;
    }
}
