<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once("connections/connections.php");

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
        ORDER BY id DESC
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
        ORDER BY id DESC
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
<body>
    <a href="index.php" id="title">Student Management</a>
    <br><br>
    <form action="result.php" method="get" id="index">
        <input type="text" name="search" id="search" value="<?php echo htmlspecialchars($search); ?>"> <!-- Preserve search value -->
        <button type="submit">Search</button>
    </form>
    <?php if(isset($_SESSION['UserLogin'])){ ?>
    <a href="logout.php" id = "logout">Logout</a>
    <?php }else{ ?>
        <a href="login.php" id = "login">Login</a>
    <?php } 
    if (isset($_SESSION['Access']) && $_SESSION['Access'] == "ADMIN"){?>
    <a href="add.php">Add New Student</a>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <th>ID no.</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($row_count > 0) { 
                while ($row = $students->fetch_assoc()) { ?>
                    <tr>
                        <td><a href="details.php?ID=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
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