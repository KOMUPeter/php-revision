<?php
require_once 'abstractUser.php';  // Include the abstract class first
require_once 'interfaceUser.php';  // Finally, include the class that uses the trait
require_once 'myTraitFunctions.php';  // Include the trait file
require_once 'user.php';  // Finally, include the class that uses the trait


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops in HTML and PHP</title>
</head>
<body>
    <h1>Fruits List</h1>
    <p>This is a list of common fruits.</p>
    <?php
    $fruits = [
        "bananas", "Apples", "Oranges"
    ];
    foreach($fruits as $key => $fruit){
        echo "<p>" . ($key + 1) . ". $fruit</p>";  
    }
    echo("<hr>");
    $count = 0;
    for ($i = 0; $i < 10; $i++) { 
        $count = $i + $count;  
        echo " $i: $count<br>";  
    }
    ?>
    <hr>
    <h2>Classes, Interface, and Trait</h2>
    <hr>
    <p><strong>Company Name:</strong> 
    <?php
    // Create an instance of the User class
    $user = new User();
    
    // Set the company name using the setter method
    $user->setCompany("Tech Innovations Inc.");

    // Display the company name using the getter method from AbstractUser
    echo $user->getCompany();
    ?>
    </p>

    <h3>Display List of Users</h3>
    <?php
    // Set names for the user object
    $user->setNames(["Alice M.", "Bob K.", "Charlie S."]);
    
    // Display the users using the method from the trait
    $user->displayUsers();
    ?>
</body>
</html>


