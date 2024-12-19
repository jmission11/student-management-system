<?php

include_once("connections/connections.php");
$con = connection();

if (isset($_POST['submit'])) {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];

    if (!empty($fname) && !empty($lname) && !empty($gender)) {
        $sql = "INSERT INTO `student_list`(`firstname`, `lastname`, `gender`) VALUES ('$fname', '$lname', '$gender')";
        $con->query($sql) or die($con->error);

        header("Location: indexADMIN.php");
        exit;
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
    <a href="index.php"><-Back< /a>
            <form action="" method="post" id="add">
                <h2>Add Names</h2>
                <label>First Name</label>
                <input type="text" name="firstname" id="firstname">
                <br>
                <label>Last Name</label>
                <input type="text" name="lastname" id="lastname">
                <br>
                <label>Gender</label>
                <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br>
                <label>Date of Birth</label>
                <input type="date" name="DOB" id="DOB">
                <br>
                <input type="submit" name="submit" value="Submit">
                <a href="register.php">Register</a>
            </form>
</body>

</html>