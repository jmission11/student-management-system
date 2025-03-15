<?php
if (!isset($_SESSION)) {
  session_start();
}
include_once("connections/connections.php");
$con = connection();

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $user = $con->query($sql) or die($con->error);
  $row = $user->fetch_assoc();
  $total = $user->num_rows;

  if ($total > 0) {
    $_SESSION['UserLogin'] = $row['username'];
    $_SESSION['Access'] = $row['access'];
    $_SESSION['Created'] = $row['created'];
    header("Location: accountChecker.php");

  } else {
    echo "<div class='message warning'>Invalid Username or Password!</div>";
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

<body id="login-body">
  <div class="back-img">
    <a href="index.php">
      <img src="img/back.png" alt="Back" id="back-icon">
    </a>
  </div>
  <div class="login-container">
    <h1>Login Page</h1>
    <br>
    <div class="login_logo">
      <img src="img/book.png" alt="" id="logo">
    </div>
    <form action="" method="post" id="login">
      <div class="login-element">
        <label>Username</label>
        <input type="text" name="username" id="username" placeholder="Enter Username" required>
      </div>

      <div class="login-element">
        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
      </div>

      <button type="submit" name="login" id="login">Login</button>

      <div class="login-link">
        <a href="register.php">Register</a>
      </div>
    </form>
  </div>
</body>

</html>