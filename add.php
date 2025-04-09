<?php

include_once("connections/connections.php");
$con = connection();
session_start();


if (isset($_SESSION['Access'])) {
if (isset($_POST['submit'])) {

  $username = $_SESSION['UserLogin'];
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $program = $_POST['program'];
  $yearlevel = $_POST['yearlevel'];
  $image = $_FILES['image']['name'];
  $target = "data_images/" . basename($image);
  $created = "YES";

  $update_user_sql = "UPDATE `users` SET `created` = '$created' WHERE `username` = '$username'";
  $con->query($update_user_sql) or die($con->error);

    if (!empty($fname) && !empty($lname) && !empty($gender) && !empty($dob)) {

      if (empty($image)){
        $sql = "INSERT INTO `student_list`(`firstname`, `lastname`, `gender`, `dob`, `address`, `program`, `yearlevel`, `username`) VALUES ('$fname', '$lname', '$gender', '$dob', '$address', '$program', '$yearlevel', '$username')";
      }else{
        $sql = "INSERT INTO `student_list`(`firstname`, `lastname`, `gender`, `dob`, `address`, `program`, `yearlevel`, `images`, `username`) VALUES ('$fname', '$lname', '$gender', '$dob', '$address', '$program', '$yearlevel', '$image', '$username')";
      }
    
      $con->query($sql) or die($con->error);
      

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        
        header("Location: index.php");
        exit;
        
      } else {
        echo "Failed to upload image.";
      }
    } else {
      echo "Please fill in all fields.";
    }

}
} else {
  header("Location: stop.php");
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
  <div class="back-img">
    <a href="index.php">
      <img src="img/back.png" alt="Back" id="back-icon">
    </a>
  </div>
  <div class="form-container">
    <form action="" method="post" id="add" enctype="multipart/form-data">
      <h1>Enrollment Form</h1>
      <br>
      <br>

      <div class="form-row">
        <div class="form-element">
          <label>First Name</label>
          <input placeholder="Enter First Name" type="text" name="firstname" id="firstname" required>
        </div>

        <br>
        <div class="form-element">
          <label>Last Name</label>
          <input placeholder="Enter Last Name" type="text" name="lastname" id="lastname" required>
        </div>
      </div>

      <br>

      <div class="form-row">
        <div class="form-element">
          <label>Gender</label>
          <select name="gender" id="gender" required>
            <option value="">---select gender---
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <br>
        <div class="form-element">
          <label>Date of Birth</label>
          <input type="date" name="dob" id="dob" required>
        </div>
      </div>

      <br>

      <div class="form-row">
        <div class="form-element">
          <label>Address</label>
          <input type="text" name="address" id="address" placeholder="Enter Address" required>
        </div>
      </div>

      <br>

      <div class="form-row">
        <div class="form-element">
          <label>Program</label>
          <select name="program" id="program" required>
            <option value="">---select program---</option>
            <option value="BSA">BSA</option>
            <option value="BSABE">BSABE</option>
            <option value="BSF">BSF</option>
            <option value="BSES">BSES</option>
            <option value="BSCS">BSCS</option>
          </select>
        </div>

        <br>
        <div class="form-element">
          <label>Year Level</label>
          <select name="yearlevel" id="yearlevel" required>
            <option value="">---select year level---</option>
            <option value="1st Year">1st Year</option>
            <option value="2nd Year">2nd Year</option>
            <option value="3rd Year">3rd Year</option>
            <option value="4th Year">4th Year</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-row">
        <div class="form-element">
          <label>Image</label>
          <input type="file" name="image" id="image">
        </div>
      </div>

      <br>
      <br>
      <br>
      <div class="form-row">
        <div class="form-element">
          <button type="submit" name="submit">Submit</button>
          <div class="form-link">
            <a href="register.php">Register</a>
          </div>
        </div>
      </div>

    </form>
  </div>
</body>

</html>