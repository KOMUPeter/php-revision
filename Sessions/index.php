<?php 
session_start();
$_SESSION["username"] = "krossing";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Sessions</title>
</head>
<body>
<h1>Active Sessions:</h1>
<ol>
<?php 
foreach ($_SESSION as $key => $value) {
    echo "<li>$key: $value</li>";
}
?>
</ol>
</body>
</html>
