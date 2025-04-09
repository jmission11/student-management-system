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


if (isset($_POST['submit'])) {
    if (!empty($sort) && !empty($sorttype)) {
        $sort = $_POST['sort'];
        $sorttype = $_POST['sorttype'];
    } else {
        echo "Invalid Sorting";
        $sort = "id";
        $sorttype = "DESC";
    }
} else {
    $sort = "id";
    $sorttype = "DESC";
}


$con = connection();

// Get and sanitize the search input
$search = isset($_GET['search']) ? trim($_GET['search']) : "";

// Split the search term into multiple parts (e.g., "John Doe" -> ["John", "Doe"])
$searchParts = explode(" ", $search);


// Handle cases where only one or both parts are given
if (count($searchParts) == 2) {
    $firstPart = "%" . $searchParts[0] . "%"; // First part (could be first or last name)
    $secondPart = "%" . $searchParts[1] . "%"; // Second part (could be first or last name)
    $sql = "
        SELECT * 
        FROM student_list 
        WHERE 
            (firstname LIKE ? AND lastname LIKE ?) 
            OR (firstname LIKE ? AND lastname LIKE ?)
        ORDER BY $sort $sorttype
    ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $firstPart, $secondPart, $secondPart, $firstPart);
} else {
    $searchTerm = "%" . $search . "%"; // For single-word searches
    $sql = "
        SELECT * 
        FROM student_list 
        WHERE 
            firstname LIKE ? 
            OR lastname LIKE ?
        ORDER BY $sort $sorttype
    ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
}

// Execute the query
$stmt->execute();
$students = $stmt->get_result();
$row_count = $students->num_rows;

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
            <input type="hidden" name="sort" value="<?= $sort ?>">
            <input type="hidden" name="sorttype" value="<?= $sorttype ?>">
            <input type="hidden" name="search" value="<?= $search ?>">
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
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($row_count > 0) {
                    while ($row = $students->fetch_assoc()) { ?>
                        <tr>
                            <td width="30"><a class="view" href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>
                            <td><?php echo $row['ismisID']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="3">No results found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>

</html>