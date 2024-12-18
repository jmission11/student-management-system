<?php

if (!isset($_SESSION)) {
    session_start();
}
include_once("connections/connections.php");
$con = connection();

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
    <h2>Admin Token = asd123</h2>
</body>
</html>