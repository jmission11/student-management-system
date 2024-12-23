<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once("connections/connections.php");
$con = connection();

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    $sql = "DELETE FROM student_list WHERE id = '$id'";
    $con->query($sql) or die($con->error);

    header("Location: index.php");
    exit;
} else {
    echo "No ID parameter provided.";
    exit;
}
?>