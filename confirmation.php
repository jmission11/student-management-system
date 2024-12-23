<?php
session_start();

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
  <title>Delete Confirmation</title>
  <link rel="stylesheet" href="css/confirm.css">
</head>

<body>
  <div class="wrapper">
    <br>
      <h2>Are you sure you want to</h2> <h1>DELETE</h1><h2> this record?</h2>
      <div class="confirmation-container">
      <?php if (!empty($row['images'])) { ?>
        <div class="Confirmation-image">
          <img src="data_images/<?php echo $row['images']; ?>" alt="Student Image">
        </div>
      <?php } else { ?>
          <?php
          switch ($row['gender']) {
            case "Male":
              echo '<div class="Confirmation-image"><img src="img/male.png" alt="Student Image"></div>';
              break;
            case "Female":
              echo '<div class="Confirmation-image"><img src="img/female.png" alt="Student Image"></div>';
              break;
            default:
              echo 'NO IMAGE FOUND!';
              break;
          }
          ?>
          <br>
          <br>
        
      <?php } ?>
      <h3>Name: <?php echo $row['firstname'] . " " . $row['lastname']; ?></h3>
      <p>ID: <?php echo $row['id']; ?></p>
    </div>
    <br>
    <div class="confirmation-buttons">
      <a href="delete.php?ID=<?php echo $row['id']; ?>" class="button-link confirm-button">Confirm</a>
      <a href="details.php?ID=<?php echo $row['id']; ?>" class="button-link cancel-button">Cancel</a>
    </div>
  </div>
  </div>
</body>

</html>