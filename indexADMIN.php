<?php

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo"Welcome ".$_SESSION['UserLogin'];
}else{
    echo"Welcome Guest";
}


include_once("connections/connections.php");

$con = connection();
$sql = "SELECT * FROM student_list ORDER BY id DESC";
$students = $con->query($sql) or die($con->error);

$row = $students->fetch_assoc();

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
    <a href="indexADMIN.php" id = "title">Student Management</a>
    <br>
    <div id ="clickables">
    <?php if(isset($_SESSION['UserLogin'])){ ?>
    <a href="logout.php" id = "logout">Logout</a>
    <?php }else{ ?>
        <a href="login.php" id = "login">Login</a>
    <?php } ?>
    <a href="add.php">Add New Student</a>
    </div>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php do { ?>
            <tr>
                <td><a href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
            </tr>
            <?php } while($row = $students->fetch_assoc()) ?>
        </tbody>

    </table>
</body>
</html>