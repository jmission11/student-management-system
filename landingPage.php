<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin'])) {
    echo "<div class='message success'>Welcome " . $_SESSION['UserLogin'] . '</div>';
}


include_once("connections/connections.php");



if (isset($_POST['submit'])) {
    // Check if 'sort' and 'sorttype' are set in POST
    $sortvalue = isset($_POST['sort']) ? $_POST['sort'] : '';
    $sorttypevalue = isset($_POST['sorttype']) ? $_POST['sorttype'] : '';

    // Check if both 'sort' and 'sorttype' are not empty
    if (!empty($sortvalue) && !empty($sorttypevalue)) {
        // Sanitize and validate the inputs for sorting
        $sort = in_array($sortvalue, ['id', 'firstname', 'lastname']) ? $sortvalue : 'firstname';
        $sorttype = ($sorttypevalue == 'asc') ? 'ASC' : 'DESC';

        // Execute the query with sorting
        $con = connection();
        $sql = "SELECT * FROM student_list ORDER BY $sort $sorttype";
        $students = $con->query($sql) or die($con->error);
        $row = $students->fetch_assoc();
    } else {
        echo "Invalid Sorting"; // If sort or sorttype is empty, show an error message
        $con = connection();
        $sql = "SELECT * FROM student_list ORDER BY id DESC";
        $students = $con->query($sql) or die($con->error);
        $row = $students->fetch_assoc();
    }
} else {
    // Default query if the form is not submitted
    $con = connection();
    $sql = "SELECT * FROM student_list ORDER BY id DESC";
    $students = $con->query($sql) or die($con->error);
    $row = $students->fetch_assoc();
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

<body id="index-body">
    <div class="wrapper">
        <div class="index-title">
            <a href="index.php">Student Management</a>
        </div>
        <?php
        function selected($name, $value)
        {
            return (isset($_POST[$name]) && $_POST[$name] == $value) ? 'selected' : '';
        }
        ?>
        <form action="" method="post" id="sortform">
            <label>Sort by:</label>
            <select name="sort" id="sort">
                <option value="" disabled selected>--</option>
                <option value="id" <?= selected('sort', 'id') ?>>id</option>
                <option value="firstname" <?= selected('sort', 'firstname') ?>>firstname</option>
                <option value="lastname" <?= selected('sort', 'lastname') ?>>lastname</option>
            </select>
            <select name="sorttype" id="sorttype">
                <option value="" disabled selected>--</option>
                <option value="desc" <?= selected('sorttype', 'desc') ?>>desc</option>
                <option value="asc" <?= selected('sorttype', 'asc') ?>>asc</option>
            </select>
            <button type="submit" name="submit">Sort</button>
        </form>
        <form method="post" action="to_excel.php">
            <input type="text"  name="fileName" id ="fileName" placeholder="File Name" required>
            <input type="hidden" name="sort" value="id">
            <input type="hidden" name="sorttype" value="DESC">
            <input type="hidden" name="search" value=" ">
            <button type="submit" name="export">Export to Excel</button>
        </form>

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
                    <th>Name (LN, FN, MN)</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Home Address</th>
                    <th>Religion</th>
                    <th>B-type</th>
                    <th>Height</th>
                    <th>Beneficiary</th>
                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                    <tr>
                        <td width="30"><a class="view" href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>
                        <td><?php echo $row['ismisID']; ?></td>
                        <td><?php echo $row['lastname'].', '.$row['firstname'].' '.$row['midname']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['program']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['religion']; ?></td>
                        <td><?php echo $row['btype']; ?></td>
                        <td><?php echo $row['height']; ?></td>
                        <td><?php echo $row['beneficiary']; ?></td>

                    </tr>
                <?php } while ($row = $students->fetch_assoc()) ?>
            </tbody>
        </table>
    </div>
</body>

</html>