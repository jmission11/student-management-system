<?php

include_once("connections/connections.php");
$con = connection();
session_start();

  $username = $_SESSION['UserLogin'];

$sql = "SELECT * FROM student_list WHERE username = '$username'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

if (isset($_SESSION['Access']) && $_SESSION['Access'] == "ADMIN") {
  header("Location: landingPage.php");
} else if(isset($_SESSION['Access']) && $_SESSION['Access'] == "USER"){
  header("Location: details.php?ID=". $row['id']);
} else {
  header("Location: login.php");
}
