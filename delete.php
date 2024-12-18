<?php
include_once("connections/connections.php");
$con = connection();

if (isset($_POST['delete'])){

    $id = $_POST['ID'];
    $sql = "DELETE FROM student_list WHERE id = '{$id}'";
    $con->query($sql) or die($con->error);
    
    header("Location: indexADMIN.php");
    exit;

}