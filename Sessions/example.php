<?php 
session_start();
$_SESSION["username"] = "peter";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example page</title>
</head>
<body>
<?php 
foreach ($_SESSION as $key => $value) {
    echo "<li>$key: $value</li>";
}
?>
</body>
</html>