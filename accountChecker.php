<?php

include_once("connections/connections.php");
$con = connection();
session_start();

if (isset($_SESSION['Access'])) {
  if ($_SESSION['Access'] == "ADMIN") {
    header("Location: index.php");
  } else {
    if (isset($_SESSION['UserLogin'])) {
      $sql = "SELECT created FROM users WHERE username = '".$_SESSION['UserLogin']."'";
      $result = $con->query($sql) or die($con->error);
      $row = $result->fetch_assoc();

      if ($row['created'] == "YES") {
        header("Location: index.php");
      } else {
        header("Location: add.php");
      }
    } else {
      echo "Username is not set in the session.";
    }

   
  }
}
 else {
  header("Location: stop.php");
}