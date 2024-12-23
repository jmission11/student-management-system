<?php
session_start();
include_once("connections/connections.php");
$con = connection();


if (isset($_POST['submit'])) {

    $user = $_POST['user'];
    $pass = $_POST['password'];
    $access = $_POST['access'];
    $token = $_POST['token'];

    if (!empty($user) && !empty($pass) && !empty($access)) {
        $sql = "SELECT * FROM `users` WHERE `username` = '$user'";
        $result = $con->query($sql);
        if (isset($_POST['conpassword']) == $pass) {
            if ($result->num_rows > 0) {
                echo "Username already exists. Please choose another username.";
            } else {
                if (isset($_SESSION['current_token']) && $_SESSION['current_token'] == $token) {
                    $sql = "INSERT INTO `users`(`username`, `password`, `access`) VALUES ('$user', '$pass', '$access')";
                    $con->query($sql) or die($con->error);
                    header("Location: Login.php");
                    exit;
                } else {
                    echo "Access Token Authentication Invalid!";
                }

            }
        } else {
            echo "Password Doesn't match!";
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
    <div class="back-img">
        <a href="index.php">
            <img src="img/back.png" alt="Back" id="back-icon">
        </a>
    </div>
            <div class="form-container">
                <form action="" method="post" id="register">
                    <h1>Register</h1>
                    <div class="form-element">
                        <label>User Name</label>
                        <input type="text" name="user" id="user">
                    </div>
                    <br>

                    <div class="form-element">
                        <label>Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <br>

                    <div class="form-element">
                        <label>Confirm Password</label>
                        <input type="password" name="conpassword" id="conpassword">
                    </div>
                    <br>

                    <div class="form-element">
                        <label>Access Type</label>
                        <select name="access" id="access">
                            <option value="ADMIN">Admin</option>
                            <option value="USER">User</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-element">
                        <label>Access Token</label>
                        <input type="text" name="token" id="token">
                    </div>
                    <br>

                    <button type="submit" name="submit">Submit</button>


                    <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "ADMIN") { ?>
                        <div class="form-link">
                            <a href='auth.php'>Admin Token</a>
                        </div>
                    <?php } else { ?>
                        <div class="form-link">
                            <a href='login.php'>Login</a>
                        </div>
                    <?php } ?>
            </div>
            </form>
            </div>
</body>

</html>