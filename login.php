<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once("connections/connections.php");
$con = connection();

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0) {
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];
        echo header("Location: index.php");
    
    }else{
        echo "Invalid Username or Password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <form action="" method = "post">
    <h1>Login</h1>
    <br>
    <label>Username</label>
    <input type="text" name="username" id="username">
    <br>
    <label>Password</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit" name="login" id="login">Login</button>
    <a href="register.php">Register</a>
    </form>
</body>
</html>