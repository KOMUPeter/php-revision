<?php
$uname = "Peter";
$pwd = 123456;

session_start();

if (isset($_SESSION['uname'])) {
    echo "<h3> Welcome ".$_SESSION['uname']."</h3>";
    echo "<a href='product.php'>See the list of products</a>";
    echo "<br><a href='logout.php'><input type='button' value='logout' name= 'logout'></a>";
} else {
    if ($_POST['uname'] == $uname  && $_POST['pwd'] == $pwd  ) {
        $_SESSION['uname'] = $uname;
        echo"<script>location.href='welcome.php'</script>";
    } else {
        echo "<script>alert('username or password incorrect!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
}