<?php

if (!isset($_SESSION)) {
  session_start();
}

include_once("connections/connections.php");
$con = connection();

if (isset($_GET['ID'])) {
  $id = $_GET['ID'];

  $sql = "SELECT * FROM student_list WHERE id = '$id'";
  $students = $con->query($sql) or die($con->error);
  $row = $students->fetch_assoc();
} else {
  echo "No ID parameter provided.";
  exit;
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
  <div class="header">
    <div class="details-back-img">
      <a href="index.php">
        <img src="img/back.png" alt="Back" id="back-icon">
      </a>
    </div>
    <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "ADMIN") { ?>
      <div class="details-button">
        <a href="edit.php?ID=<?php echo $row['id']; ?>" class="button-link edit-button">Edit</a>
        <a href="confirmation.php?ID=<?php echo $row['id']; ?>" class="button-link delete-button">Delete</a>
      </div>
    <?php } ?>
  </div>

  <div class="wrapper">
    <?php if (!empty($row['images'])) { ?>
      <div class="student-image">
        <a href="data_images/<?php echo $row['images']; ?>"><img src="data_images/<?php echo $row['images']; ?>" alt="Student Image"></a>
      </div>
    <?php } else { ?>
      <div class="student-image">
        <?php 
        switch ($row['gender']) {
          case "Male":
        echo '<img src="img/male.png" alt="Student Image">';
        break;
          case "Female":
        echo '<img src="img/female.png" alt="Student Image">';
        break;
          default:
        echo 'NO IMAGE FOUND!';
        break;
        }
        ?>
      </div>
    <?php } ?>
    <br>

    <div class="details-info">
      <h2><?php echo $row['firstname'] . " " . $row['lastname'] ?></h2>
      <h4><?php echo $row['id']; ?></h4>

      <?php
      $date = new DateTime($row['dob']);
      $formattedDate = $date->format('F j, Y');
      $date2 = new DateTime($row['registered']);
      $dateReg = $date2->format('F j, Y');
      ?>

      <ul>
        <li>
          <p>Gender: <?php echo $row['gender']; ?></p>
        </li>
        <li>
          <p>Date of Birth: <?php echo $formattedDate; ?></p>
        </li>
        <li>
          <p>Prgram: <?php echo $row['program']; ?></p>
        </li>
        <li>
          <p>Year level: <?php echo $row['yearlevel']; ?></p>
        </li>
        <li>
          <p>Address: <?php echo $row['address']; ?></p>
        </li>
        <li>
          <p>Date Registered: <?php echo $dateReg; ?></p>
        </li>
      </ul>

    </div>

</body>

</html>