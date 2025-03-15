<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin'])) {
    echo "<div class='message success'>Welcome " . $_SESSION['UserLogin'] . '</div>';
} else {
    echo "<div class='message info'>Welcome Guest</div>";
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

<body id="index-body">
    <div class="wrapper">
        <div class="index-title">
            <a href="index.php">Student Management</a>
\        </div>
        <br>
        <br>
        <div class="index-seach-container">
            <form action="result.php" method="get" id="index">
                <input type="text" name="search" id="search" class="index-search-input">
                <button type="submit" name="submit" class="index-submit">Search</button>
            </form>
        </div>
        <br>
        <div class="clickables">
            <?php if (isset($_SESSION['UserLogin'])) { ?>
                <a href="logout.php" id="logout" class="login-out-link">Logout</a>
            <?php } else { ?>
                <a href="login.php" id="login" class="login-out-link">Login</a>
            <?php } ?>

            <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "ADMIN") { ?>
                <a href="auth.php" class="add-link">Token</a>
            <?php } ?>
        </div>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>ID no.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                    <tr>
                        <td width="30"><a class ="view" href="details.php?ID=<?php echo $row['id']; ?>" >view</a></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                    </tr>
                <?php } while ($row = $students->fetch_assoc()) ?>
            </tbody>
        </table>
    </div>
</body>

</html>