<?php

if (!isset($_SESSION)) {
    session_start();
}

// if(isset($_SESSION['Access']) && $_SESSION['Access'] === "ADMIN"){
//     echo"Welcome ".$_SESSION['UserLogin']."<br/>";
// }else{
//     echo header("Location: index.php");
// }


include_once("connections/connections.php");

$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
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
    <a href="index.php"><- Back</a>
            <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "ADMIN") { ?>
                <form action="delete.php" method="post" id="detailsPage">
                    <a href="edit.php?ID=<?php echo $row['id']; ?>">Edit</a>
                    <button type="submit" name="delete">Delete</button>
                    <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
                </form>
            <?php } ?>

            <br>
            <h2><?php echo $row['firstname'] . " " . $row['lastname'] ?></h2>
            <p>is a <?php echo $row['gender']; ?></p>
</body>

</html>