<?php

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    // ... existing code ...
} else {
    echo "No ID parameter provided.";
    exit;
}
session_start();
include_once("connections/connections.php");
$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

if (isset($_SESSION['Access']) && $_SESSION['Access'] == "ADMIN") {

    if (isset($_POST['submit'])) {

        $dateUpdate = date('Y-m-d');
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

        if (!empty($fname) && !empty($lname) && !empty($gender) && !empty($dob)) {
            if (!empty($image)) {
                $sql = "UPDATE `student_list` SET `firstname`='$fname', `lastname`='$lname', `gender`='$gender', `dob`='$dob', `address`='$address', `program`='$program', `yearlevel`='$yearlevel', `images`='$image', `updateBy`='$username', `dateUpdate`='$dateUpdate' WHERE `id`='$id'";
            } else {
                $sql = "UPDATE `student_list` SET `firstname`='$fname', `lastname`='$lname', `gender`='$gender', `dob`='$dob', `address`='$address', `program`='$program', `yearlevel`='$yearlevel', `updateBy`='$username', `dateUpdate`='$dateUpdate' WHERE `id`='$id'";
            }
            $con->query($sql) or die($con->error);

            if (!empty($image) && !move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                echo "Failed to upload image.";
            } else {
                header("Location: details.php?ID=$id");
                exit;
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
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</head>

<body>
    <div class="back-img">
        <a href="details.php?ID=<?php echo $row['id']; ?>">
            <img src="img/back.png" alt="Back" id="back-icon">
        </a>
    </div>
    <div class="form-container">
        <form action="" method="post" id="edit" enctype="multipart/form-data">
            <h1>Edit Names</h1>
            <br>
            <br>
            <div class="form-row">
                <div class="form-element">
                    <label>First Name</label>
                    <input placeholder="Enter First Name" type="text" name="firstname" id="firstname"
                        value="<?php echo $row['firstname']; ?>">
                </div>
                <br>
                <div class="form-element">
                    <label>Last Name</label>
                    <input placeholder="Enter Last Name" type="text" name="lastname" id="lastname"
                        value="<?php echo $row['lastname']; ?>">
                </div>
            </div>

            <br>
            <div class="form-row">
                <div class="form-element">
                    <label>Gender</label>
                    <select name="gender" id="gender">
                        <option value="">---select gender---
                        <option value="Male" <?php echo ($row['gender'] == "Male") ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($row['gender'] == "Female") ? 'selected' : ''; ?>>Female
                        </option>
                    </select>
                </div>
                <br>
                <div class="form-element">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="<?php echo $row['dob']; ?>">
                </div>
            </div>

            <br>

            <div class="form-row">
                <div class="form-element">
                    <label>Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $row['address'] ?>" required>
                </div>
            </div>

            <br>

            <div class="form-row">
                <div class="form-element">
                    <label>Program</label>
                    <select name="program" id="program" required>
                        <option value="">---select program---</option>
                        <option value="BSA" <?php echo ($row['program'] == "BSA") ? 'selected' : ''; ?>>BSA</option>
                        <option value="BSABE" <?php echo ($row['program'] == "BSABE") ? 'selected' : ''; ?>>BSABE</option>
                        <option value="BSF" <?php echo ($row['program'] == "BSF") ? 'selected' : ''; ?>>BSF</option>
                        <option value="BSES" <?php echo ($row['program'] == "BSES") ? 'selected' : ''; ?>>BSES</option>
                        <option value="BSCS" <?php echo ($row['program'] == "BSCS") ? 'selected' : ''; ?>>BSCS</option>
                    </select>
                </div>

                <br>
                <div class="form-element">
                    <label>Year Level</label>
                    <select name="yearlevel" id="yearlevel" required>
                        <option value="">---select year level---</option>
                        <option value="1st Year" <?php echo ($row['yearlevel'] == "1st Year") ? 'selected' : ''; ?>>1st
                            Year</option>
                        <option value="2nd Year" <?php echo ($row['yearlevel'] == "2nd Year") ? 'selected' : ''; ?>>2nd
                            Year</option>
                        <option value="3rd Year" <?php echo ($row['yearlevel'] == "3rd Year") ? 'selected' : ''; ?>>3rd
                            Year</option>
                        <option value="4th Year" <?php echo ($row['yearlevel'] == "4th Year") ? 'selected' : ''; ?>>4th
                            Year</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="upload">
                    <div class="form-element">
                        <label>Image</label>
                        <input type="file" name="image" id="image" onchange="previewImage(event)">
                    </div>
                    <br>
                    <div class="form-element">
                        <img id="image-preview" src="data_images/<?php echo $row['images']; ?>" alt="Student Image"
                            width="100">
                    </div>
                </div>
            </div>
            <br>

            <div class="form-row">
                <div class="form-element">
                    <input type="submit" name="submit" value="Update">
                </div>
            </div>
        </form>
    </div>
</body>

</html>