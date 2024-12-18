<?php

include_once("connections/connections.php");
$con = connection();


if(isset($_POST['submit'])){

    $user = $_POST['user'];
    $pass = $_POST['password'];
    $access = $_POST['access'];

    if(!empty($user) && !empty($pass) && !empty($access)){
        $sql = "SELECT * FROM `users` WHERE `username` = '$user'";
        $result = $con->query($sql);

        if($result->num_rows > 0){
            echo "Username already exists. Please choose another username.";
        } else {
            $sql = "INSERT INTO `users`(`username`, `password`, `access`) VALUES ('$user', '$pass', '$access')";
            $con->query($sql) or die($con->error);
            header("Location: indexADMIN.php");
            exit;
        }
    } else {
        echo "Please fill in all fields.";
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
    <a href='indexADMIN.php'><-Back</a>
    <a href='auth.php'>Admin Token</a>
    <form action="" method="post">
        <h2>Register</h2>
        <label>User Name</label>
        <input type="text" name="user" id = "user" >
        <br>
        <label>Password</label>
        <input type="text" name="password" id = "password" >
        <br>
        <label>Access Type</label>
        <select name="access" id="access">
            <option value="ADMIN">Male</option>
            <option value="USER">Female</option>
        </select>
        <br>
        <input type="submit" name = "submit" value="Submit">
    </form>
</body>
</html>