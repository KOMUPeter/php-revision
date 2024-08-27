<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="welcome.php" method="post" align="center">
        <table>
            <tr>
                <th colspan="2"><h1 align="center">Login</h1></th>
            </tr>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="pwd"></td>
            </tr>
            <tr>
                <td align="right" colspan="2"><input type="submit" name="login" value="login"></td>
            </tr>
        </table>
    </form>
</body>
</html>
