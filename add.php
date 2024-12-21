<?php

include_once("connections/connections.php");
$con = connection();

if (isset($_POST['submit'])) {

  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];


  if (!empty($fname) && !empty($lname) && !empty($gender) && !empty($dob)) {
    $sql = "INSERT INTO `student_list`(`firstname`, `lastname`, `gender`, `dob`) VALUES ('$fname', '$lname', '$gender', '$dob')";
    $con->query($sql) or die($con->error);

    header("Location: index.php");
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
  <a href="index.php"><-Back</a>
      <div class="form-container">
        <form action="" method="post" id="add">
          <h1>Add Names</h1>
          <br>
          <br>

          <div class="form-element">
            <label>First Name</label>
            <input type="text" name="firstname" id="firstname" required>
          </div>

          <br>
          <div class="form-element">
            <label>Last Name</label>
            <input type="text" name="lastname" id="lastname" required>
          </div>

          <br>
          <div class="form-element">
            <label>Gender</label>
            <select name="gender" id="gender" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>

          <br>
          <div class="form-element">
            <label>Date of Birth</label>
            <input type="date" name="dob" id="dob" required>
          </div>

          <br>
          <div class="form-element">
            <button type="submit" name="submit">Submit</button>
          </div>
          <div class="form-link">
          <a href="register.php">Register</a>
          </div>
        </form>
      </div>
</body>

</html>