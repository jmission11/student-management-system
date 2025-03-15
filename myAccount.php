<?php

include_once("connections/connections.php");
$con = connection();
session_start();

$username = $_SESSION['UserLogin'];
if (isset($_SESSION['Access'])) {
  if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE id = '$id'";
    $students = $con->query($sql) or die($con->error);
    $row = $students->fetch_assoc();
  } else {
    echo "No ID parameter provided.";
    exit;
  }
  header("Location: details.php?ID=" . $id);
  exit;
}