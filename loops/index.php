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
</body>
</html>
