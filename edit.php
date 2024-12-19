<?php

include_once("connections/connections.php");
$con = connection();
$id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE id = '$id'";
    $students = $con->query($sql) or die($con->error);
    $row = $students->fetch_assoc();


if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];

    $sql = "UPDATE student_list SET firstname = '$fname', lastname = '$lname', gender = '$gender'
    WHERE id ='$id'";
    $con->query($sql) or die($con->error);

    echo header("Location: details.php?ID=".$id);

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
    <a href="details.php"><-Back</a>
    <form action="" method="post" id="edit">
        <h2>Edit Names</h2>
        <label>First Name</label>
        <input type="text" name="firstname" id = "firstname" value = "<?php echo $row['firstname'];?>" >
        <br>
        <label>Last Name</label>
        <input type="text" name="lastname" id = "lastname" value = "<?php echo $row['lastname'];?>" >
        <br>
        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : '';?> >Male</option>
            <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : '';?> >Female</option>
        </select>
        <br>
        <input type="submit" name = "submit" value="Update">
    </form>
</body>
</html>